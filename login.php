<?php

session_start();
mysql_connect("localhost", "nomanssky", "wondering") or die(':((');
mysql_select_db("armin") or die(':(');

?>

<html>
	
	<head>
		<title>Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, height=device-height" />
	</head>
	
	<body style="background-color: #ccc; text-align: center; padding: 50px;">
		
		<h1>Login</h1>
		
		<?php
		
		if (isset($_POST['submit'])) {
			
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			
			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$res = mysql_query($sql);
			$found = mysql_num_rows($res);
			
			if ($found != 1) {
				echo '<p style="color: red; text-align: center;">Sorry but that username and password do not exist!</p>';
			} else {
				$_SESSION['login'] = $username;
				echo '<script>window.location.href="/armin/dashboard/"</script>';
			}
			
		}
		
		?>
		
		<form style="width: 50%; margin-left: 25%; margin-right: 25%; text-align: center;" action="" method="POST">
			
			<table style="width: 100%;">
				<tr>
					<td style="text-align: right; width: 50%;">
						Username:
					</td>
					<td>
						<input name="username" type="text" />
					</td>
				</tr>
				<tr>
					<td style="text-align: right;">
						Password:
					</td>
					<td>
						<input name="password" type="password" />
					</td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center;">
						<input name="submit" type="submit" value="Submit" style="width: 100px;" />
					</td>
				</tr>	
					
			</table>		
		
		<form>
		
	</body>
	
</head>