<?php
session_start();
include 'Session_Config_login.php';



if(isset($_SESSION['username']) && isset($_POST['password'])){
	$username = $_SESSION['username'];
	$password = md5($_POST['password']);

	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$mysqli = new mysqli("localhost", "root", "root", "CycleTime");
	include 'DB_Config.php';
	if($stmt = $mysqli->prepare("SELECT SRC_ID From Source where UserName = ? and password = ?")){
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->bind_result($src_id);
		$stmt->fetch();

		if($src_id != 0){
			$_SESSION['src_id']=$src_id;
			$_SESSION['login']=1;
			header("Location: CT.php");
		}
		else{
			header("Location: jumpto_login_usr_nonexist.php");
		}
	}
}else{
	header("Location: jumpto_login_usr_nonexist.php");
}


?>