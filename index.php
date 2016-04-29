<?php

session_start();
mysql_connect("localhost", "nomanssky", "wondering") or die(':(');
mysql_select_db("armin") or die(':(');

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Armin</title>
		<?php include('scripts/meta.php'); ?>
		<link rel="stylesheet" href="style.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBLZeS5OzGTtIjR5StKV47NCuOHTwR9oKo?callback=start"></script>
	</head>
	<body style="overflow: scroll; margin: 0;">
		<div id="map" style="position: absolute; top: 0; left: 0; z-index: 10;"></div>
		<div id="it1" class="ad"></div>
		<div id="it2" class="next"></div>
		<script type="text/javascript" src="slides.js"></script>
	</body>
</html>