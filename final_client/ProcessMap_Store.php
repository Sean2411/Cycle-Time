<?php 
session_start();
include_once 'Session_Config_nonlogin.php';
$SRC_ID = mysql_real_escape_string($_SESSION['src_id']);
$SRC_ID = (int)$SRC_ID;
//Session Part

$Product = $_SESSION["products"];
$Set = $_SESSION["options"];

function GetCurrentTime(){
   $dt = new DateTime();
   $currentTime =  $dt->format('Y-m-d H:i:s');
   return $currentTime;
}
function GetJVAID($startevent, $endevent){
	include 'DB_Config.php';
	if($stmt = $mysqli->prepare("SELECT b.JVA_EVT_ID from EVENT_Tbl a, EVENT_Mapping_Tbl b where a.EVT_ID = b.EVT_ID and a.EVT_Name = ?")){
		$stmt->bind_param("s", $startevent);
		$stmt->execute();
	  	$stmt->bind_result($S_JEI);
	  	$stmt->fetch();
	  }
	include 'DB_Config.php';
	 if($stmt = $mysqli->prepare("SELECT b.JVA_EVT_ID from EVENT_Tbl a, EVENT_Mapping_Tbl b where a.EVT_ID = b.EVT_ID and a.EVT_Name = ?")){
		$stmt->bind_param("s", $endevent);
		$stmt->execute();
	  	$stmt->bind_result($E_JEI);
	  	$stmt->fetch();
	  } 
    include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT SRC_CT_Name from CT_Mapping_Tbl  where EVT_Start = ? and EVT_End = ? ")){
  	$stmt->bind_param("ss", $S_JEI, $E_JEI);
  	$stmt->execute();
  	$stmt->bind_result($SRC_CT_Name);
  	$stmt->fetch();
  	return $SRC_CT_Name;
  }
}

function GetSetDetail($SetName){
	global $Set;
	foreach($Set as $ele){
		if($ele["name"] == $SetName){
			$currentSet[] = array('name'=>$ele["name"], 'aggregator'=>$ele["aggregator"],  'option1'=>$ele["option1"], 'dependency1'=>$ele["dependency1"],'option2'=>$ele["option2"], 'dependency2'=>$ele["dependency2"]); 
		}
	}
	return $currentSet;
}

if(isset($_SESSION['SRC_Process_ID'])){
	$_SESSION['SRC_Process_ID']++;
}else{
	$_SESSION['SRC_Process_ID'] = 0;
}

//Create Process Map
if(isset($_POST['ProcessName'])){
	$ProcessName = $_POST['ProcessName'];
	$currentTime = GetCurrentTime();
	include 'DB_Config.php';
  if($stmt = $mysqli->prepare("INSERT INTO Process_Tbl values (Default, ?, ?, ?, ? )")){
  	 $stmt->bind_param("iiss", $SRC_ID, $_SESSION['SRC_Process_ID'], $ProcessName, $currentTime);
	 $stmt->execute();
	}

  for($i = 0; $i < sizeof($Product); $i++){
  	if(strpos($Product[$i]['name'], "Set") !== false){
  		//Store Set
  	include 'DB_Config.php';
  	if($stmt = $mysqli->prepare("INSERT INTO Process_SET_Tbl values (Default, ?, ?, ?, ? )")){
	  	 $stmt->bind_param("issi", $SRC_ID, $ProcessName, $Product[$i]["name"], $i);
		 $stmt->execute();
		}

	 $NewSet = GetSetDetail($Product[$i]["name"]);
	 for($j = 1; $j < (sizeof($NewSet[0]) - 2)/2 + 1; $j++){
	  include 'DB_Config.php';
   	  if($stmt = $mysqli->prepare("INSERT INTO Process_SET_Detail_Tbl values (Default, ?, ?, ? )")){
	  	 $stmt->bind_param("ssi", $Product[$i]["name"], $NewSet[0]["aggregator"], $j);
		 $stmt->execute();
		}		
	  if(sizeof($NewSet[0]["option".$j]) > 1){
	 	for($t = 0; $t < sizeof($NewSet[0]["option".$j]); $t++){
		if(isset($CycleTime)){
		$CycleTime =  $CycleTime.":".$NewSet[0]["option".$j][$t];
	}else{
		$CycleTime = $NewSet[0]["option".$j][$t];
	}
	}
	include 'DB_Config.php';
	if($stmt = $mysqli->prepare("INSERT INTO Process_Set_Option_Tbl values (?,?, ?,?,Default)")){
	  	 $stmt->bind_param("isss",$j,$Product[$i]["name"], $NewSet[0]["dependency".$j],$CycleTime);
		 $stmt->execute();
		 $CycleTime = "";
		}
	}else{
	include 'DB_Config.php';
	if($stmt = $mysqli->prepare("INSERT INTO Process_Set_Option_Tbl values(?,?, ?, ?,Default)")){
	  	 $stmt->bind_param("isss",$j,$Product[$i]["name"], $NewSet[0]["dependency".$j],$NewSet[0]["option".$j][0]);
		 $stmt->execute();
		}
		}
	}
}
  	else{
  		$CT_Name = GetJVAID($Product[$i]["startevent"], $Product[$i]["endevent"]);
  		//Store CycleTime
  		include 'DB_Config.php';
  	if($stmt = $mysqli->prepare("INSERT INTO Process_CT_Tbl values (Default, ?, ?, ?, ? )")){
	  	 $stmt->bind_param("issi", $SRC_ID, $ProcessName, $CT_Name, $i);
		 $stmt->execute();
		}
}
}
header('Location:'.'processmap.php');
// header("Location: processmap.php");
}


 ?>