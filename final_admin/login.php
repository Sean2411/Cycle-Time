<?php 
	session_start();
	include 'include.php';
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
	if($stmt = $mysqli->prepare("SELECT LoginId From System where Username = ? and Password = ?")){
	    $stmt->bind_param("ss", $username, $password);
	    $stmt->execute();
	    $stmt->bind_result($src_id);
	    $stmt->fetch();
	    if($src_id != 0){
	    	$_SESSION['login']=1;
	    	header("Location: adminsystem.php");
	    }
	    else{
	    	echo "The User did not existed!";
	    }
	}
}else{
	echo "Username or Password did not set, Please check";
}
?>