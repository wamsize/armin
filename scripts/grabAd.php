<?php
session_start();
mysql_connect("localhost", "nomanssky", "wondering");
mysql_select_db("armin");

$zip = $_GET['zip'];
$zip = "85224";

// do stuff

$orderarray = ['time_start', 'time_end', 'gps', 'time_start2', 'time_end2', 'time_start3', 'time_end3'];

$rand = rand(0, 6);

$order = $orderarray[$rand];

// (BETWEEN PAIR) OR (ALL NA)

$sql = "SELECT * FROM ads WHERE status = '1' AND (gps LIKE '%" . $zip . "%' OR gps = 'NA') AND ( (date_start < CURDATE() OR date_start = 'NA') AND (date_end > CURDATE() OR date_end = 'NA') ) AND ( ( ( (time_start < CURTIME() AND time_end > CURTIME() AND time_end != 'NA') OR (time_start < CURTIME() AND time_end = 'NA') OR (time_start = 'NA' AND time_end > CURTIME() AND time_end != 'NA') ) OR ( (time_start2 < CURTIME() AND time_end2 > CURTIME() AND time_end2 != 'NA') OR (time_start2 < CURTIME() AND time_end2 = 'NA') OR (time_start2 = 'NA' AND time_end2 > CURTIME() AND time_end2 != 'NA') ) OR ( (time_start3 < CURTIME() AND time_end3 > CURTIME() AND time_end3 != 'NA') OR (time_start3 < CURTIME() AND time_end3 = 'NA') OR (time_start3 = 'NA' AND time_end3 > CURTIME() AND time_end3 != 'NA') ) ) OR ( time_start = 'NA' AND time_end = 'NA' AND time_start2 = 'NA' AND time_end2 = 'NA' AND time_start3 = 'NA' AND time_end3 = 'NA' ) )

ORDER BY weight ASC, $order DESC LIMIT 1";
$res = mysql_query($sql);
$ad = mysql_fetch_array($res);

$id = $ad['id'];
$weight = $ad['weight'] + 1;

$sql = "UPDATE ads SET weight = $weight WHERE id = $id";
$res = mysql_query($sql);

$weight = $weight + 1;

$sql = "SELECT * FROM ads WHERE weight > $weight";
$res = mysql_query($sql);

if (mysql_num_rows($res) > 0) {
	
	$sql = "UPDATE ads SET weight = 0 WHERE id != $id";
	$res = mysql_query($sql);
	$sql = "UPDATE ads SET weight = 1 WHERE id = $id";
	$res = mysql_query($sql);
	
}




echo($ad['img']);


?>