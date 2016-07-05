<?php
	include('database_class.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		CheckSignin($username, $password);
	}else{
		echo "false";
	}
	function CheckSignin($username,$password){
		$newdb = new database();
		$newdb->setup('root','root','localhost','fontend');

		if(mysqli_num_rows($newdb->send_sql("Select * From Profile where Username = '$username' and Password = '$password'")) == 1){
			header("Location: about.html");
			exit;
		}
		else{
			echo "The profile did not existed!";
		}


	}
?>