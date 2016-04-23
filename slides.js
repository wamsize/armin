$(document).ready(function() {
	
	var max = 3;
	var num = 0;
	var cols = ["red", "black", "yellow", "green"];
	
	setInterval(function() {
		
		if (num == max) {
			num = 0;
		} else {
			num++;
		}
		
		alert(cols[num]);
		
		$('.ad').css("background-color", cols[num]);
		
	}, 5000);
	
});