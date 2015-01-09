var chart;
var jsonData, tmpSensor, tmpMeasurement, mSensorKey;
var smojes, sensorData;
var sensorData = {};

var styles = [
	{
		"bullet": "round",
		"color": "#FF6600"
	},
	{
		"bullet": "square",
		"color": "#FCD202"
	},
	{
		"bullet": "triangleUp",
		"color": "#B0DE09"
	},
	{
		"bullet": "bubble",
		"color": "#FC02D2"
	},
	{
		"bullet": "triangleDown",
		"color": "#B009DE"
	}
];

getData(true);

var dataObj = {
    "type": "serial",
    "theme": "none",
	"language": "de",
	"graphs": [],
    "pathToImages": "http://www.amcharts.com/lib/3/images/",
    "legend": {
        "useGraphSettings": true,
		"valueWidth": 0
    },
    "valueAxes": [],
    "chartScrollbar": {},
    "chartCursor": {
        "cursorPosition": "mouse",
		"categoryBalloonDateFormat": "DD. MMMM YYYY JJ:NN:DD",
		"cursorColor": "#00bff3"
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
		"minPeriod": "mm",
        "axisColor": "#DADADA",
        "minorGridEnabled": true,
		"dateFormats": [
			{period:'fff',format:'JJ:NN:SS'},
			{period:'ss',format:'JJ:NN'},
			{period:'mm',format:'JJ:NN'},
			{period:'hh',format:'JJ:NN'},
			{period:'DD',format:'DD. MMM'},
			{period:'WW',format:'DD. MMM'},
			{period:'MM',format:'MMM YYYY'},
			{period:'YYYY',format:'YYYY'}
		]
    }
};

function setSensor (sensorKey) {

	mSensorKey = sensorKey;
	var sensor = sensorData[sensorKey];
	var myData = dataObj;
	myData.graphs = [];
	myData.valueAxes[0] = {
		"id":"v",
		"axisColor": "#333333",
		"axisThickness": 1,
		"gridAlpha": 0,
		"axisAlpha": 1,
		"position": "left",
		"unit": " " + sensor.unit
	};
	for (var i = 0; i < smojes.length; i++) {

		var graph = {
			"lineColor": styles[i].color,
			"bullet": styles[i].bullet,
			"valueAxis": "v",
			"bulletBorderThickness": 1,
			"hideBulletsCount": 30,
			"title": smojes[i].title,
			"valueField": sensor.name + "Value_" + smojes[i].smojeId,
			"fillAlphas": 0,
			"type": "smoothedLine",
		};
		graph.valueText = "[[value]] " + sensor.unit;
		graph.balloonText = "[[title]]:<b>[[value]] " + sensor.unit + "</b>";
		graph.valueField = sensor.name + "Value_" + smojes[i].smojeId;
		myData.graphs.push(graph);
	}
	
	chart = AmCharts.makeChart("chartdiv", myData);
	chart.valueAxes[0].unit = " " + sensor.unit;
	chart.dataProvider = sensorData[sensorKey].measurements;
	chart.validateData();
	zoomChart();
	chart.validateNow();
}

function getData(init) {
	
	smojes = [];
	sensorData = {};
	jQuery.getJSON( 
		"http://178.62.163.199/smoje/index.php/Stations/Sensors/Measurements/7", function( data ) {
	
		var sensorSelector = "";
		var i = 0;
		var j = 0;
		jQuery.each( data.station, function( stationKey, station ) {
		
			smojes.push({
				"smojeId": station.stationId,
				"title": station.name
			});
			jQuery.each( station.sensors, function( sensorKey, sensor ) {
		
				if (sensor.name.indexOf("camera") == -1 &&
					!sensorData[sensor.name] &&
					sensor.displayTypeId) {
			
					var innerClassName = "";
					if (j == 0) {
			
						innerClassName = "active";
						j++;
					}
					
					if (init) {
						
						sensorSelector += '<li role="presentation" class="' + innerClassName + '"><a href="#' + sensor.title + '" data-toggle="tab" onclick="setSensor(\'' + sensor.name + '\');">' + sensor.title + '</a></li>';
					}
				
					if (!sensorData[sensor.name]) {
						
						sensorData[sensor.name] = {
							"name": sensor.name,
							"title": sensor.title,
							"range": 10,
							"unit": " " + sensor.unit,
							"measurements": []
						};
					}
				}
				if (sensorData[sensor.name]) {
				
					jQuery.each( sensor.measurements, function( measurementKey, measurement ) {
		
						var obj = {};
						// var arr = measurement.timestamp.date.split(/[- :]/);
						obj["date"] = new Date(measurement.timestamp*1000);
						obj[sensor.name + "Value_" + station.stationId] = parseFloat(measurement.value);
						sensorData[sensor.name].measurements.unshift(obj);
						if (!sensorData[sensor.name].minValue || (parseFloat(measurement.value) < sensorData[sensor.name].minValue)) {
				
							sensorData[sensor.name].minValue = parseFloat(measurement.value);
						}
					});
				}
			});
			i++;
		});

		if (init) {
			
			jQuery("#smoje-sensors").html(sensorSelector);
			setSensor(data.station[0].sensors[0].name);
			window.setInterval(function() {
				
				getData();
			}, 60000);
		}
		else {
			
			chart.dataProvider = sensorData[mSensorKey].measurements;
			chart.validateData();
		}
	});
}

function zoomChart(){
	
	if (chart.dataProvider && chart.dataProvider.length >= 50) {
	
	    chart.zoomToIndexes(chart.dataProvider.length - 50, chart.dataProvider.length - 1);
	}
}
