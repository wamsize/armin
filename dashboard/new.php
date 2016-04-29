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
	</head>
	
	<body style="background-color: #eee; text-align: center; padding: 50px;">
		
		<h1>New Ad</h1>
				
		<?php
		
		if (isset($_POST['submit'])) {
			
			$name = $_POST['name'];
			$datestart = $_POST['date-start'];
			$dateend = $_POST['date-end'];
			$timestart1 = $_POST['time-start1'];
			$timeend1 = $_POST['time-end1'];
			$timestart2 = $_POST['time-start2'];
			$timeend2 = $_POST['time-end2'];
			$timestart3 = $_POST['time-start3'];
			$timeend3 = $_POST['time-end3'];
			$zip = $_POST['zip'];
			
			if (empty($datestart)) {$datestart = "NA";}
			if (empty($dateend)) {$dateend = "NA";}
			if (empty($timestart1)) {$timestart1 = "NA";}
			if (empty($timeend1)) {$timeend1 = "NA";}
			if (empty($timestart2)) {$timestart2 = "NA";}
			if (empty($timeend2)) {$timeend2 = "NA";}
			if (empty($timestart3)) {$timestart3 = "NA";}
			if (empty($timeend3)) {$timeend3 = "NA";}
			if (empty($zip)) {$zip = "NA";}
			
			if (empty($name) or empty($_FILES["fileToUpload"]["name"])) {
				echo 'Name and Image are required.';
			} else {
								
				$target_dir = "ads/";
				$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
				$target_file = str_replace(' ', '_', $target_file);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				
				// Check if file already exists
				if (file_exists($target_file)) {
					echo "Sorry, image filename already exists. Please rename it or try a different image.";
					$uploadOk = 0;
				}
				
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 10000000) {
					echo "Sorry, your image is too large. Please resize or crop it and try again.";
					$uploadOk = 0;
				}
				
				// Allow certain file formats
				if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" && $imageFileType != "tif" && $imageFileType != "tiff" ) {
					echo "Sorry, only JPG, JPEG, PNG, TIF, TIFF & GIF files are allowed.";
					$uploadOk = 0;
				}
				
				
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 1) {
					if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "Sorry, there was an error uploading your file.";
					} else {
						$sql = "INSERT INTO ads (name, date_start, date_end, time_start, time_end, time_start2, time_end2, time_start3, time_end3, gps, img) 
						VALUES ('$name', '$datestart', '$dateend', '$timestart1', '$timeend1', '$timestart2', '$timeend2', '$timestart3', '$timeend3', '$zip', '$target_file')";
						$res = mysql_query($sql) or die(mysql_error());
						echo '<script>window.location.href="index.php"</script>';
					}
				}
				
			}
		
		}
		
		
		?>
		
		<br><br>
			
		
		<div class="table">
			
			<form method="POST" action="" enctype="multipart/form-data">
				
				<table style="width: 100%;">
					
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Name of Ad*</strong>
						</td>
						<td>
							<input name="name" type="text" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Starting Date</strong>
						</td>
						<td>
							<input name="date-start" type="date" placeholder="YYYY-MM-DD" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Closing Date</strong>
						</td>
						<td>
							<input name="date-end" type="date" placeholder="YYYY-MM-DD" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Time Segment 1 Start</strong>
						</td>
						<td>
							<input name="time-start1" type="time" placeholder="USE 24 HRS - HH:MM PM/AM" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Time Segement 1 End</strong>
						</td>
						<td>
							<input name="time-end1" type="time" placeholder="USE 24 HRS - HH:MM PM/AM" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Time Segment 2 Start</strong>
						</td>
						<td>
							<input name="time-start2" type="time" placeholder="USE 24 HRS - HH:MM PM/AM" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Time Segment 2 End</strong>
						</td>
						<td>
							<input name="time-end2" type="time" placeholder="USE 24 HRS - HH:MM PM/AM" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Time Segment 3 Start</strong>
						</td>
						<td>
							<input name="time-start3" type="time" placeholder="USE 24 HRS - HH:MM PM/AM" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Time Segment 3 End</strong>
						</td>
						<td>
							<input name="time-end3" type="time" placeholder="USE 24 HRS - HH:MM PM/AM" style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>ZIP</strong>
						</td>
						<td>
							<input name="zip" type="text" placeholder="XXXXX, XXXXX, ..." style="width: 200px;" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<strong>Image*</strong>
						</td>
						<td>
							<input name="fileToUpload" id="fileToUpload" type="file" />
						</td>
					</tr>
					<tr>
						<td style="width: 50%; text-align: right;">
							<input id="cancel" type="button" name="cancel" value="Cancel Ad" />
						</td>
						<td>
							<input type="submit" name="submit" value="Create Ad" />
						</td>
					</tr>
				
				</table>
			</form>
			
		</div>
		
		<script>
			
			$(document).ready(function() {
				
				$('#cancel').click(function() {
									
					window.location.href="index.php";
					
				})
				
			});
			
		</script>
		
	</body>
	
</head>