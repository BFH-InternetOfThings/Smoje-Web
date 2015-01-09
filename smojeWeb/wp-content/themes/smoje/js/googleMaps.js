var contentStrings = {};
var holderType = "large";
var markers = {};
var smojes = [];
var image, map, infoWindow, mapOptions, isDetailOpen, detailContainer, mapHolder, headerContainer, detailMap, detailMapOptions;
var smojeCount = 0;

function initialize() {
	
	mapHolder = jQuery("#map-holder");
	if (mapHolder.hasClass("banner")) {
		
		holderType = "small";
	}
	headerContainer = jQuery("header");
	detailContainer = jQuery("#detail-container");
	image = {
		url: 'http://www.smoje.ch/theme/default/images/map-marker.png',
		// This marker is 20 pixels wide by 32 pixels tall.
		size: new google.maps.Size(45, 44),
		// The origin for this image is 0,0.
		origin: new google.maps.Point(0,0),
		// The anchor for this image is the base of the flagpole at 0,32.
		anchor: new google.maps.Point(16, 44)
	};

	jQuery.getJSON( 
		"http://178.62.159.123/smoje/index.php/Stations/Sensors/Measurements/", function( data ) {
	
		jsonData = data.station;
		
		jQuery.each( jsonData, function( smojeKey, smoje ) {
		
			addSmoje(smoje);
		});
	});
}

jQuery(window).resize(function() {
	
	resize();
});

function addSmoje(smoje) {
	
	jQuery.getJSON(smoje.urlTissan, function( data ) {
	
		var gps = data.lastPosition;
		var arr = data.timeUpdated.split(/[- :T.]/);
		var date = arr[2] + "." + arr[1] + "." + arr[0] + " " + arr[3] + ":" + arr[4] + ":" + arr[5];
		contentStrings[smoje.stationId] = 
			'<div id="mapContent" style="width: 340px; height: 240px;">'+
				'<h1 class="mapHeading">' + smoje.name + '</h1>'+
				'<div id="mapContent">'+
					'<table class="details">' +
						'<tr>' +
							'<th>' +
								'Position: <span class="measurementDate">(' + date + ')</span>' +
							'</th>' +
							'<td>' +
								'<table class="details">' +
									'<tr>' +
										'<th>' +
											'Breitengrad:' +
										'</th>' +
										'<td>' +
											gps.latitude + '°' +
										'</td>' +
									'<tr>' +
									'<tr>' +
										'<th>' +
											'Längengrad:' +
										'</th>' +
										'<td>' +
											gps.longitude + '°' +
										'</td>' +
									'<tr>' +
								'</table>' +
							'</td>' +
						'</tr>';

		for (var i = 0; i < smoje.sensors.length; i++) {
	
			var sensor = smoje.sensors[i];
			if (sensor.displayTypeId == 1 &&
				sensor.measurements[0].value != "failed") {
				
				var measurement = sensor.measurements[0];
				// var arr = measurement.timestamp.date.split(/[- :]/);
				// var date = arr[2] + "." + (arr[1]-1) + "." + arr[0] + " " + arr[3] + ":" + arr[4] + ":" + arr[5];
				var date = getDateStringFromTimestamp(measurement.timestamp);
				contentStrings[smoje.stationId] += 
							'<tr>' +
								'<th>' +
									sensor.title + ':' + ' <span class="measurementDate">(' + date + ')</span>' +
								'</th>' +
								'<td>' +
									measurement.value + ' ' + sensor.unit +
								'</td>' +
							'</tr>';
			}
		}
		contentStrings[smoje.stationId] +=
					'</table>' +
					'<a class="btn btn-default measurementDetailLink" href="#" onclick="openDetail(' + smoje.stationId + ')">Details</a>' +
				'</div>';

		mapOptions = {
			center: { lat: parseFloat(gps.latitude) ,lng: parseFloat(gps.longitude)},
			zoom: 12
		};
		if (smojeCount == 0) {
	
			map = new google.maps.Map(mapHolder.get(0), mapOptions);
		}
		markers[smoje.stationId] = new google.maps.Marker({
			position: new google.maps.LatLng(gps.latitude , gps.longitude),
			icon: image,
			map: map,
			title: smoje.name
		});
		if (smojeCount == 0) {
	
			infoWindow = new google.maps.InfoWindow();
			infoWindow.setContent(contentStrings[smoje.stationId]);
			infoWindow.close();
			// infoWindow.open(map,markers[smoje.smojeId]);
		}
		if (holderType == "large") {
			
			google.maps.event.addListener(markers[smoje.stationId], 'click', function() {
				infoWindow.setContent(contentStrings[smoje.stationId]);
				infoWindow.close();
				infoWindow.open(map,markers[smoje.stationId]);
			});
		}
		else {
			
			google.maps.event.addListener(markers[smoje.stationId], 'click', function() {
				openDetail(smoje.stationId);
			});
		}
		resize();
		
		smojeCount++;
	});
}

function resize() {
	
	map.setOptions(mapOptions);
	if (isDetailOpen) {
		
		detailContainer.css({
			
			top: headerContainer.height()+"px",
			width: jQuery(window).width()+"px"
		});
		if (detailMap) {
			
			detailMap.setOptions(detailMapOptions);
		}
	}
	else {
		
		detailContainer.css({
			
			top: jQuery(window).height()+"px",
			width: jQuery(window).width()+"px"
		});
	}
	mapHolder.parent().css({
		
		height: (jQuery(window).height()+20-mapHolder.offset().top)+"px",
		marginTop: "0"
	})
}

function openDetail(id) {
	
	detailContainer.css({
		"top": mapHolder.height()+"px"
	});
	jQuery.ajax({
		
		url: "/smojeWeb/wp-content/themes/smoje/detail.php",
		type: "get",
		dataType: "html",
		data: {"id" : id},
		success: function(returnData){
			
			detailContainer.html(returnData);
			// jQuery("#detail-container").slideUp(1000);
			detailContainer.css({
				
				width: mapHolder.width()+"px"
			});
			detailContainer.show();
			isDetailOpen = true;
			var detailMapContainer = jQuery("#map-holder-detail");
			var params = detailMapContainer.attr("data-param").split("|");
			detailMapOptions = {
				center: { lat: parseFloat(params[0]) ,lng: parseFloat(params[1])},
				zoom: 12
			};
			detailMap = new google.maps.Map(detailMapContainer.get(0), detailMapOptions);
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(params[0], params[1]),
				icon: image,
				map: detailMap,
				title: name
			});
			detailContainer.css({
				top: (mapHolder.offset().top-detailContainer.height()-300)+"px"
			});
			detailContainer.animate({

				top: (headerContainer.height())+"px"
			}, 1000, function() {
				
				jQuery("#btn-close-detail").click(function() {
					
					detailContainer.animate({

						top: (headerContainer.height()-detailContainer.height())+"px"
					}, 1000, function() {
						
						detailContainer.hide();
					});
					isDetailOpen = false;
				});
			});
		},
		error: function(e){
			
			alert(e);
		}
	});
}

google.maps.event.addDomListener(window, 'load', initialize);
