jQuery(document).ready(function() {
	fadeContainer();
});

/* ****************************************
	Fade Toggle container when opening menu
**************************************** */
function fadeContainer($) {
	jQuery('.navbar-toggle').click(function() {
		jQuery('.container').toggleClass('faded');
		jQuery('.map-holder-big, .map-holder-small').toggleClass('faded');
	});
}

function getDateStringFromTimestamp(timestamp) {
	
	var date = new Date(timestamp*1000);
	return padNumbers(date.getDate(), 2) + "." + 
		padNumbers((date.getMonth()+1), 2) + "." + 
		date.getFullYear() + " " + 
		padNumbers(date.getHours(), 2) + ":" + 
		padNumbers(date.getMinutes(), 2) + ":" + 
		padNumbers(date.getSeconds(), 2);
}

function padNumbers(number, length) {
	
	var num = number + "";
	while (num.length < length) {
		
		num = "0" + num;
	}
	return num;
}

