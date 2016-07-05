<?php
session_start();
include 'DB_Config.php';

$username =$_SESSION['username'];  
$stmt = $mysqli->prepare("SELECT Email,workphone FROM Source WHERE UserName=?"); 
$stmt->bind_param("s", $username);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($email,$workphone);
$stmt->fetch();

header("Content-Type: text/html");
echo "Email Address:&nbsp;".$email."<br>";
echo "Work-phone Number:&nbsp;".$workphone;
	






?>