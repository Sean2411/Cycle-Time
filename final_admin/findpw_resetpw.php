<?php
session_start();
include_once("DB_Config.php");


$usr_pw = stripslashes(trim($_GET['usr']));
$id_em = stripslashes(trim($_GET['id']));

/*
$usr_pw = "1b0bcd4d0a00017cbe6fc0a89d5b1d69";
$id_em = "MytsdWNpdXMyNDExQGdtYWlsLmNvbQ==";
*/

$src_id=array();
$username=array();
$password=array();
$email=array();
// $flag =0;


$sql = "SELECT LoginId, UserName, Email, password From System";

if($stmt = $mysqli->prepare($sql)){
    $stmt->execute();
    $stmt->bind_result($id, $urs, $em , $pw);
    
    
    
    while($stmt->fetch()){
	    array_push($src_id, $id);
	    array_push($username, $urs);
	    array_push($email, $em); 
	    array_push($password, $pw);
	          
	}

	for($i=0; $i<count($src_id); $i++){
		$comb1[$i]=md5($username[$i].'+'.$password[$i]);
		$comb2[$i]=base64_encode($src_id[$i].'+'.$email[$i]);

		if($comb1[$i]==$usr_pw && $comb2[$i]==$id_em){
			
			$num = $i+1;
			$flag = 1;
		}
		
	}
}




$_SESSION['flag']=$flag;
// $_SESSION['flag']=1;
$_SESSION['src_id']=$num;

if($flag==1){
	header("Location: findpw_reset_form.php");
}else{
	header("Location: findpw_jump_url_invalid.php");
}

?>
