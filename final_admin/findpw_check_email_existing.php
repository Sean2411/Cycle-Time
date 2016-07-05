<?php
	session_start();
	global $flag;
	$email=$_POST["Email"];
	$_SESSION['email']=$email;
	include('DB_Config.php');
    if($stmt = $mysqli->prepare("SELECT question From System where Email = ?")){
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($question);
    $stmt->fetch();
    if(isset($question)){
	    $_SESSION['question']=$question;
	    
	    $flag = 1;
    }else{
	    $flag = 0;
    }
    }
    


if($flag==1){
	header("Location: find_pw_form2.php");
}else{
	header("Location: findpw_jump.php");
}


	
?>	