<?php
session_start();

//check validation
if ($_SESSION['flag']!=1){
header("Location:admin.php"); 
}
$src_id = $_SESSION['src_id'];
$_SESSION['src_id']= $src_id;


?>


<!DOCTYPE html>
<html>
<head>
	<title>Password Reset Form</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<form action="findpw_upload_pw.php" method="post">
		<p>
			<p style="font-size: x-large" align="center">Please reset your PASSWORD</p>

		</p>
		<p>
			<label for="password">Password</label>
			<input id="password" name="password" type="password" placeholder="Password *">
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password" placeholder="Confirm password *">
			<span>Please confirm your password</span>
		</p>
		<p>
			<input type="submit" value="SUBMIT" id="submit">
		</p>
	</form>
	</body>
</html>