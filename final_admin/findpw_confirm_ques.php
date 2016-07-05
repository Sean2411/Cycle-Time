<?php
session_start();


include('DB_Config.php');


	global $flag;
	$Answer=$_POST["Answer"];
	$email=$_SESSION['email'];
   
	if($stmt = $mysqli->prepare("SELECT LoginId, UserName, password, answer From System where Email = ?")){
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($src_id, $username, $password, $Answer_corr);
    $stmt->fetch();
    
       if(isset($Answer_corr)){
	    $_SESSION['Answer_corr']=$Answer_corr;
	    $_SESSION['password'] = $password;
	    $_SESSION['src_id'] = $src_id;
	    $flag = 1;
    }else{
	    $flag = 0;
    }
    }


	$usr_pw = md5($username.'+'.$password);
	
	$id_em = base64_encode($src_id.'+'.$email);
	$to = $email;
	$subject = "JVA Find your password back!";
	$body = "http://localhost/546/final/findpw_resetpw.php?usr=".$usr_pw."&id=".$id_em;
	$from ="lucius2411@gmail.com";
	$headers = "From: $from";
    
    if($flag == 1 && $Answer == $Answer_corr ){
	   mail($to,$subject,$body,$headers);
	   header("Location: findpw_jump_login1.php");
	   }elseif($flag == 1 || $Answer == $Answer_corr ){
		   header("Location: find_pw_form2_wrong_ans.php");
	   }else{
		   header("Location: findpw_jump_contact.php");
	   }

		
		
?>
 
