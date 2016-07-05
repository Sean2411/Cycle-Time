<?php
session_start();
include_once("DB_Config.php");

$src_id = $_SESSION['src_id'];




$pw=$_POST['password'];
$confirm_pw=$_POST['confirm_password'];



if($pw==$confirm_pw){
	
	$pw_md5=md5($pw);
	$stmt = $mysqli->prepare("UPDATE System SET password=? WHERE LoginId = ?");
    $stmt->bind_param("si", $pw_md5, $src_id);
    $stmt->execute();
    $stmt->close();
    header("Location:findpw_jump_login.php");

}else{
	header("Location:findpw_reset_form_wrongpw.php");
}



?>