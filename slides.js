$(document).ready(function() {
	
	var iteration = 0;
	
	setInterval(function() {
		
		iteration += 1;
		$('.ad').animate({left: "-100vw"}, 1000);
		$('.next').animate({left: "0"}, 1000, function() {
		
			if (iteration % 2 == 0) {
				$('#it1').toggleClass('ad').toggleClass('next');
				$('#it2').toggleClass('next').toggleClass('ad').css('left', '100vw');
			} else {
				$('#it2').toggleClass('ad').toggleClass('next');
				$('#it1').toggleClass('ad').toggleClass('next').css('left', '100vw');
			}
			
			function start() {
				
				map = new google.maps.Map(document.getElementById("map"));
				
			}
			
			$.ajax({
				url: "scripts/grabAd.php",
				type: "GET",
				dataType: "text",
				data: {
					"zip" : "85224"
				},
				success: function(info){
					$('.next').css('background-image', 'url(dashboard/' + info + ')');
				},
				error: function(xhr, status, error) {
					alert('ERROR: ' + error);
				}
			});
		});
		
	}, 5000);
	
});