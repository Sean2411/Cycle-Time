<?php 
session_start();
$SRC_ID = 1;
$SRC_CT_Name = array();
$SRC_CT = array();
$detail = array();
$type = $_GET["selected"];

// function GetCycleTime($type){
// 	global $SRC_ID;
$type_combo = explode(":", $type);
$type = $type_combo[0][0].$type_combo[1][0];
$type = 'AG';
include("DB_Config.php");
if($stmt = $mysqli->prepare("SELECT SRC_CT_Name FROM CT_Mapping_Tbl where SRC_ID = ?")){
	$stmt->bind_param("i", $SRC_ID);
	$stmt->execute();
	$stmt->bind_result($SCN);
while($stmt->fetch()){
	array_push($SRC_CT_Name, $SCN);
	}
}
for($i = 0; $i < sizeof($SRC_CT_Name); $i++){
 	$CT_Name = explode('-', $SRC_CT_Name[$i]);
 	if($CT_Name[1] == $type){
 		array_push($SRC_CT, $SRC_CT_Name[$i]); 
 	}
 }
 for($j = 0; $j < sizeof($SRC_CT); $j++){
 	GetDetail($SRC_CT);
 }


// if($stmt = $mysqli->prepare("SELECT SRC_CT_Name FROM CT_Mapping_Tbl where SRC_ID = ? and SRC_CT_Name LIKE ?")){
// 	$stmt->bind_param("is", $SRC_ID, $type);
// 	$stmt->execute();
// 	$stmt->bind_result($SCN);

// while($stmt->fetch()){
// 	array_push($SRC_CT_Name, $SCN);
// 	}
// }
// }

function GetDetail($SRC__Name){
global $detail;
$mysqli = new mysqli("localhost", "root", "root", "CycleTime");
if($stmt = $mysqli->prepare("SELECT DISTINCT c.EVT_NAME from CT_Mapping_Tbl a, EVENT_Mapping_Tbl b, EVENT_Tbl c where a.SRC_CT_Name = ? and a.EVT_Start = b.JVA_EVT_ID and b.SRC_PROFILE_ID = c.SRC_PROFILE_ID")){
   $stmt->bind_param("s",$SRC__Name);
   $stmt->execute();
   $stmt->bind_result($SEVT_Name);
   $stmt->fetch();
}
$mysqli = new mysqli("localhost", "root", "root", "CycleTime");
if($stmt = $mysqli->prepare("SELECT DISTINCT c.EVT_NAME from CT_Mapping_Tbl a, EVENT_Mapping_Tbl b, EVENT_Tbl c where a.SRC_CT_Name = ? and a.EVT_End = b.JVA_EVT_ID and b.SRC_PROFILE_ID = c.SRC_PROFILE_ID")){
   $stmt->bind_param("s",$SRC__Name);
   $stmt->execute();
   $stmt->bind_result($EEVT_Name);
   $stmt->fetch();
}
array_push($detail, $SEVT_Name."---".$EEVT_Name);
}

// var_dump($detail);

?>