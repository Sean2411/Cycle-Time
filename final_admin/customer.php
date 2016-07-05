<?php 
include_once("Session_Config.php");
include("DB_Config.php");
$SRC_ID = $_SESSION['srcId'];
$SRC_ID = (int)$SRC_ID;

$E_ID = array();

function GetNewJVA_EVT_ID(){
  $JVA_EVT_ID = "JVA_DT_". mt_rand(0,1000);
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT idEVTMAP_Tbl FROM EVENT_Mapping_Tbl where JVA_EVT_ID = ?")){
    $stmt->bind_param("s", $JVA_EVT_ID);
    $stmt->execute();
    $stmt->bind_result($idEVTMAP);
    $stmt->fetch();
    if($idEVTMAP > 0){
      GetNewJVA_EVT_ID();
    }else{
      return $JVA_EVT_ID;
    }
  }
}

function GetNewEVT_ID(){
  $EVT_ID = "EVT_". mt_rand(0,1000);
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT idEVTMAP_Tbl FROM EVENT_Mapping_Tbl where EVT_ID = ?")){
    $stmt->bind_param("s", $EVT_ID);
    $stmt->execute();
    $stmt->bind_result($idEVTMAP);
    $stmt->fetch();
    if($idEVTMAP > 0){
      GetNewEVT_ID();
    }else{
      return $EVT_ID;
    }
  }
}

function GetCurrentTime(){
   $dt = new DateTime();
   $currentTime =  $dt->format('Y-m-d H:i:s');
   return $currentTime;
}

function CheckDuplicate($Src_ID, $Profile_ID){
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT idEVTMAP_Tbl from EVENT_Mapping_Tbl where SRC_ID = ? and SRC_PROFILE_ID = ?")){
    $stmt->bind_param("ii", $Src_ID, $Profile_ID);
    $stmt->execute();
    $stmt->bind_result($idEVTMAP_Tbl);
    $stmt->fetch();
    if($idEVTMAP_Tbl > 0){
      return true;
    }else{
      return false;
    }
}
}

//Create a empty Campaign
if(isset($_POST['Campaign_type']) && isset($_POST['Sub_type']) && isset($_POST['eventName']) && isset($_POST['eventExisted'])){
  $Campaign_type = $_POST['Campaign_type'];
  $Sub_type = $_POST['Sub_type'];
  $eventName = $_POST['eventName'];
  $Dependency = $_POST['eventExisted'];


  $_SESSION['CampaignType'] = $_POST['Campaign_type'];
  $_SESSION['SubType'] = $_POST['Sub_type'];
  $_SESSION['EventName'] = $_POST['eventName'];
  $_SESSION['Dependency'] = $_POST['Dependency'];


  $defaultProfileId = 0;
  $defaultORG = 0;
  for($i = 0; $i < sizeof($Campaign_type); $i++){
  if($stmt = $mysqli->prepare("SELECT * from CAMPAIGN_Tbl where CampaignType = ? and SubType = ?")){
    $stmt->bind_param("ss", $Campaign_type[$i], $Sub_type[$i]);
    $stmt->execute();
    $stmt->bind_result($exist);
    $stmt->fetch();
    if($exist > 0){
      $message[] = 'Current Campaign info has existed.';
    }
    else{
       if($stmt = $mysqli->prepare("INSERT INTO CAMPAIGN_Tbl (CAMPAIGN_ID, PROFILE_ID, CampaignType, SubType, ORG_CPG_01_ID, ORG_CPG_02_ID) values (Default, ?, ?, ?, ?, ? )")){
        $stmt->bind_param("issii",$defaultProfileId,$Campaign_type[$i],$Sub_type[$i],$defaultORG,$defaultORG);
        $stmt->execute();
      }
   }
}
}

//Mapping EVT_Mapping_Tbl
for($j = 0; $j < sizeof($eventName); $j++){
  $EVT_ID = GetNewEVT_ID();
  $currentTime = GetCurrentTime();
  //EVENT_Mapping_Tbl
  if($Dependency[$j] == 'None'){
  $JVA_EVT_ID = GetNewJVA_EVT_ID();
  if(!CheckDuplicate($SRC_ID,$j)){
  include("DB_Config.php");
      if($stmt = $mysqli->prepare("INSERT INTO EVENT_Mapping_Tbl values (Default, ?, ?, ?, ?, ? )")){
      $stmt->bind_param("iisss",$SRC_ID, $j,$JVA_EVT_ID,$EVT_ID, $currentTime);
      $stmt->execute(); 
      }
    }
}else{
     if($stmt = $mysqli->prepare("SELECT b.JVA_EVT_ID from EVENT_Mapping_Tbl b, EVENT_Tbl a where a.EVT_ID = b.EVT_ID and a.EVT_Name = ? ")){
      $stmt->bind_param("s", $Dependency[$j]);
      $stmt->execute();
      $stmt->bind_result($JE_ID);
      $stmt->fetch();
    }
    if(!CheckDuplicate($SRC_ID,$j)){
   include("DB_Config.php");
      if($stmt = $mysqli->prepare("INSERT INTO EVENT_Mapping_Tbl values (Default, ?, ?, ?, ?, ? )")){
        $stmt->bind_param("iisss",$SRC_ID,$j,$JE_ID,$EVT_ID, $currentTime);
        $stmt->execute();
    }
}
}
}

//Get All Event of Current Client
include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT EVT_ID FROM EVENT_Mapping_Tbl where SRC_ID = ?")){
     $stmt->bind_param("i",$SRC_ID);
     $stmt->execute();
     $stmt->bind_result($EVT_ID);
     while($stmt->fetch()){
      array_push($E_ID, $EVT_ID);
     }
   }

  if(isset($_SESSION['EVT_ID'])){
  }else{
  $_SESSION['EVT_ID'] = $E_ID;
}
}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title contenteditable="false">CycleTime</title>
     <link rel="stylesheet" href="css/normalize.css">
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/pepper-grinder/jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
     <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/responsive.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/dialog.css" rel="stylesheet"> <!-- Including CSS File Here-->
    <!-- Including CSS & jQuery Dialog UI Here-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
     <link rel="stylesheet" href="css/header.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/jquery.ui.core.js"></script>
    <script type="text/javascript" src="lib/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="jquery-ui-form.js"></script>
    <script type="text/javascript" src="javascript/app.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <header>
      <a href="admin.php" id ="logo">
        <h1>Cycle Time</h1>
        <h2>AdminSystem</h2>
      </a>  
      <nav>
        <ul>
          <li><a href="adminsystem.php">admin</a></li>
          <li><a href="client.php" class="selected">Create_dataset</a></li>
          <li><a href="update.php">Update_dataset</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
      </nav>
    </header>
    <div id="wrapper">
   <?php include 'customerform.php';?>
   <?php include 'footer.php';?>
  </div>
  </body>
</html>
