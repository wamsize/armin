<?php

session_start();
mysql_connect("localhost", "nomanssky", "wondering") or die(':((');
mysql_select_db("armin") or die(':(');

?>

<html>
	
	<head>
		<title>Dashboard</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, height=device-height" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<style>
			
			.delete:hover, .status:hover {
				cursor:pointer;
			}
			
		</style>
	</head>
	
	<body style="background-color: #eee; text-align: center; padding: 50px;">
		
		<h1>Dashboard</h1>
		
		<div class="new" style="text-align: center; width: 100%;">
			<a href="new.php">New Ad</a>
		</div>
		
		<br><br>
			
		
		<div class="table">
			
			<table style="width: 100%;">
				
				<tr>
					<td>
						<strong>Name of Ad</strong>
					</td>
					<td>
						<strong>Dates</strong>
					</td>
					<td>
						<strong>Time 1</strong>
					</td>
					<td>
						<strong>Time 2</strong>
					</td>
					<td>
						<strong>Time 3</strong>
					</td>
					<td>
						<strong>Location</strong>
					</td>
					<td>
						<strong>Image</strong>
					</td>
					<td>
						<strong>Status</strong>
					</td>
					<td>
						<strong>Actions</strong>
					</td>
				</tr>
				
				<?php
				
				$sql = "SELECT * FROM ads ORDER BY id DESC";
				$res = mysql_query($sql);
				
				while ($ad = mysql_fetch_array($res)) {
				
					echo '
					
					
					<tr id="item">
						<td>
							' . $ad['name'] . '
						</td>
						<td>
							' . $ad['date_start'] . ' to ' . $ad['date_end'] . '
						</td>
						<td>
							' . $ad['time_start'] . ' to ' . $ad['time_end'] . '
						</td>
						<td>
							' . $ad['time_start2'] . ' to ' . $ad['time_end2'] . '
						</td>
						<td>
							' . $ad['time_start3'] . ' to ' . $ad['time_end3'] . '
						</td>
						<td>
							' . $ad['gps'] . '
						</td>
						<td>
							<a href="' . $ad['img'] . '"><img src="' . $ad['img'] . '" style="height: 40px; width: auto;"/></a>
						</td>
						<td>
							';
							if ($ad['status'] == 0) {
								echo 'Disabled';
							} else {
								echo 'Enabled';
							}
						echo '					
						</td>
						<td>
							<div class="delete">Delete</div>
							<div class="status">';
							if ($ad['status'] == 0) {
								echo 'Enable';
							} else {
								echo 'Disable';
							}
							
							echo '</div>
							
						</td>
					</tr>
					
					
					
					';
				
				}
				
				
				
				
				?>
				
			
			</table>
			
		</div>
		
	</body>
	
</head>