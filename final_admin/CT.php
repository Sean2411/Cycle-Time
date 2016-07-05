<?php
include_once("Session_Config.php");
// $checkEventD=1;
// $checkSD=1;
// $checkED=1;
// if (!preg_match("/^\S[A-Za-z\s]+$/",$_POST["user_dec"])) {
//     $_SESSION['decErr']="Notice: Your input did not meet requirement! Please input again!";
//     $checkEventD=0;
//     }
// else{}
// if (empty($_POST["user_start"])) {
//     $_SESSION['sdEmpty']="Notice: The start date can not be blank! Please input again!";
//     $checkSD=0;        
//     }
// else if (!preg_match("/((^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(10|12|0?[13578])([-\/\._])(3[01]|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(11|0?[469])([-\/\._])(30|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(0?2)([-\/\._])(2[0-8]|1[0-9]|0?[1-9])$)|(^([2468][048]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([3579][26]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][13579][26])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][13579][26])([-\/\._])(0?2)([-\/\._])(29)$))/",$_POST["user_start"])) {
//     $_SESSION['sdErr']="Notice: Your input did not meet requirement! Please input again!";
//     $checkeSD=0;          
//     }
// else{}
// if (empty($_POST["user_end"])) {
//     $_SESSION['edEmpty']="Notice: The end date can not be blank! Please input again!";
//     $checkED=0;
//     }
// else if (!preg_match("/((^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(10|12|0?[13578])([-\/\._])(3[01]|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(11|0?[469])([-\/\._])(30|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(0?2)([-\/\._])(2[0-8]|1[0-9]|0?[1-9])$)|(^([2468][048]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([3579][26]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][13579][26])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][13579][26])([-\/\._])(0?2)([-\/\._])(29)$))/",$_POST["user_end"])) {
//     $_SESSION['edErr']="Notice: Your input did not meet requirement! Please input again!";
//     $checkED=0;        
//     }
// else{}
// if($checkEventD*$checkeSD*$checkED==0)
// {    echo "<a href=event.php></a>";
//      echo("<meta http-equiv=refresh content=0;url=event.php>"); 
// }
// else
// {
$SRC_ID = mysql_real_escape_string($_SESSION['srcId']);
$SRC_ID = (int)$SRC_ID;
$eventLevel = array();
$JVA_ID_START = array();
$JVA_ID_END = array();
$Profile_ID_Start = array();
$Profile_ID_End = array();
$CTName = array();

//loading customer info
$type_combo = $_SESSION['typecombo'];
$customerId = $_SESSION['CustomerId'];
$eventName = $_SESSION['EventName'];


if(isset($_POST['event']) && isset($_POST['user_dec']) && isset($_POST['user_start']) && isset($_POST['user_end'])){
  $user_event = mysql_real_escape_string($_POST['event']);
  $user_dec = mysql_real_escape_string($_POST['user_dec']);
  $user_start = mysql_real_escape_string($_POST['user_start']);
  $user_end = mysql_real_escape_string($_POST['user_end']);
  $event_data = explode(':', $user_event);  
  $Profile_Id = GetAProfileId($event_data[0]);
  $Level = 0;
  $type = explode(":", $type_combo);
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT idEVT_Tbl from EVENT_Tbl where CustomerId = ? and EVT_NAME = ?")){
  $stmt->bind_param("is", $customerId, $event_data[1]);
  $stmt->execute();
  $stmt->bind_result($idEVT_Tbl);
  $stmt->fetch();
  if($idEVT_Tbl > 0){
  }else{
    if($stmt = $mysqli->prepare("INSERT INTO  EVENT_Tbl values (Default, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")){
      $stmt->bind_param("iiisssissss", $SRC_ID, $customerId, $Profile_Id, $type[0], $type[1], $event_data[0], $Level, $event_data[1], $user_start, $user_end, $user_dec);
      $stmt->execute();
      }
    }
  }
}

function GetRandomNumber(){
  $EVT_ID = mt_rand(0,1000);
  return $EVT_ID;
}

function GetNewJVA_CT_ID(){
  $JVA_CT_ID = "JVA_CT_". mt_rand(0,100);
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT id_CTMapping FROM CT_Mapping_Tbl where JVA_CT_ID = ?")){
    $stmt->bind_param("s", $JVA_CT_ID);
    $stmt->execute();
    $stmt->bind_result($idCTMapping);
    $stmt->fetch();
    if($idCTMapping > 0){
      GetNewJVA_CT_ID();
    }else{
      return $JVA_CT_ID;
    }
  }
}
function GetCurrentTime(){
   $dt = new DateTime();
   $currentTime =  $dt->format('Y-m-d H:i:s');
   return $currentTime;
}

function GetJVAID($EvtName){
  include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT DISTINCT b.JVA_EVT_ID from EVENT_Tbl a, EVENT_Mapping_Tbl b where a.EVT_ID = b.EVT_ID and a.EVT_NAME = ?")){
      $stmt->bind_param("s", $EvtName);
      $stmt->execute();
      $stmt->bind_result($JVAID);
      $stmt->fetch();
      return $JVAID;
    }
}

function GetAProfileId($EVT_ID){
   include("DB_Config.php");
 if($stmt = $mysqli->prepare("SELECT SRC_PROFILE_ID from EVENT_Mapping_Tbl where EVT_ID = ?")){
  $stmt->bind_param("s", $EVT_ID);
  $stmt->execute();
  $stmt->bind_result($profile_id);
  $stmt->fetch();
  return $profile_id;
}
}

 function GetCycleTime($SRC_ID){
   global $CTName;
  include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT DISTINCT SRC_CT_NAME FROM CT_Mapping_Tbl Where SRC_ID = ?")){
      $stmt->bind_param("i", $SRC_ID);
      $stmt->execute();
      $stmt->bind_result($SCN);
      while($stmt->fetch()){
        array_push($CTName, $SCN);
      }
  }  
}


function CheckDuplicate($SRC_ID, $EVT_Start, $EVT_End){
    include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT id_CTMapping FROM CT_Mapping_Tbl where SRC_ID = ? and EVT_Start = ? and EVT_End = ?")){
      $stmt->bind_param("iss", $SRC_ID, $EVT_Start, $EVT_End);
      $stmt->execute();
      $stmt->store_result();
      $rows = $stmt->num_rows;
      if($rows > 0){
        return True;
      }else{
        return False;
      }
    }
}



if(isset($_POST['CT_Name']) && isset($_POST['start']) && isset($_POST['end'])){
  $eventStart = $_POST['start'];
  if(isset($_SESSION['EVTStart'])){
    array_push($_SESSION['EVTStart'], $eventStart);
  }else{
  $_SESSION['EVTStart'] = array();
  array_push($_SESSION['EVTStart'], $eventStart);
}
  $eventEnd = $_POST['end'];
  if(isset($_SESSION['EVTEnd'])){
    array_push($_SESSION['EVTEnd'], $eventEnd);
  }else{
  $_SESSION['EVTEnd'] = array();
   array_push($_SESSION['EVTEnd'], $eventEnd);
}
  $JVA_ID_START = GetJVAID($eventStart);
  $JVA_ID_END = GetJVAID($eventEnd);
  $JVACTID = GetNewJVA_CT_ID();
  $ctName = $_POST['CT_Name'];
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT id_CTMapping FROM CT_Mapping_Tbl where SRC_CT_NAME = ?")){
    $stmt->bind_param("s", $ctName);
    $stmt->execute();
    $stmt->bind_result($id_CTMapping);
    $stmt->fetch();
    if($id_CTMapping > 0){
      $flag = 1;
    }else{
    if(!empty($ctName)){
      if($JVA_ID_START != $JVA_ID_END){
    include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT id_CTMapping FROM CT_Mapping_Tbl where EVT_Start = ? and EVT_End = ?")){
      $stmt->bind_param("ss", $JVA_ID_START, $JVA_ID_END);
      $stmt->execute();
      $stmt->store_result();
      $rows = $stmt->num_rows;
      $stmt->bind_result($idCTMapping);
      $stmt->fetch();
      if($idCTMapping > 0){
        if($stmt = $mysqli->prepare("SELECT JVA_CT_ID FROM CT_Mapping_Tbl where id_CTMapping = ?")){
          $stmt->bind_param("i", $idCTMapping);
          $stmt->execute();
          $stmt->bind_result($CTID);
          $stmt->fetch();
          if(!CheckDuplicate($SRC_ID, $JVA_ID_START, $JVA_ID_END)){
            include("DB_Config.php");
             if($stmt = $mysqli->prepare("INSERT INTO CT_Mapping_Tbl (id_CTMapping, SRC_ID, SRC_CT_Name, JVA_CT_ID, EVT_Start, EVT_End)values (Default, ?, ?, ?, ?, ?)")){
                $stmt->bind_param("issss", $SRC_ID, $ctName, $CTID, $JVA_ID_START, $JVA_ID_END);
                $stmt->execute();
               }
           }
       }
     }
else{
    include("DB_Config.php");
        if($stmt = $mysqli->prepare("INSERT INTO CT_Mapping_Tbl values (Default, ?, ?, ?, ?, ?)")){
        $stmt->bind_param("issss", $SRC_ID, $ctName, $JVACTID, $JVA_ID_START, $JVA_ID_END);
        $stmt->execute();
      }
    }
  }
    }
  }
  }
  }
  }

GetCycleTime($SRC_ID);
// }
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
     <link href="css/dialog.css" rel="stylesheet"> <!-- Including CSS File Here-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/form.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/jquery.ui.core.js"></script>
    <script type="text/javascript" src="lib/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="jquery-ui-form.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
  </head>
  <body>
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
   <form name="form" action="CT.php" enctype="multipart/form-data" method="post">
        <h1>CycleTime</h1>
        
        <fieldset>

          <legend><p class="number">1</p>Create New CycleTime</legend>

          <label for="CTname">CT Name:</label>
          <input type="text" id="CTname" name="CT_Name">
          <?php if($flag == 1){ ?>
          <span>Notice:Current CTName already existed, Please Choose another one</span>
          <?php } ?>
          <label for="start">Start_Event:</label>
          <select id="startevent" name="start">
            <?php for($i = 0; $i < sizeof($eventName); $i++){?>
              <option value="<?php echo $eventName[$i]; ?>"><?php echo $eventName[$i];?></option>
        <?php }?>
          </select>

          <label for="end">End_Event:</label>
          <select id="endevent" name="end">
            <?php for($i = 0; $i < sizeof($eventName); $i++){?>
              <option value="<?php echo $eventName[$i]; ?>"><?php echo $eventName[$i];?></option>
        <?php }?>
          </select>

        </fieldset>
         <input type="submit" name="Submit" id="submit" value="New CycleTime" style="float:left; width:50%"
                    onClick="document.form.action='CT.php';document.form.submit();" />
          <input type="submit" name="Submit" id="submit1" value="Create Last one and Next" style="width:50%"
                    onClick="document.form.action='cycletime.php';document.form.submit();" />
        </form>
   <?php include "footer.php";?>
  </div> 
 
  <div style="align:center;">
    <h1 style="font-weight: normal;letter-spacing: -1px; color: #34495E;">Created CycleTime</h1>
      <table class="rwd-table" style=" margin-left: auto; margin-right: auto;width: 70%;">
        <tr>
       <th>CycleTime Name</th>
       <th>Start Event</th>
       <th>End Event</th>
   <?php for($i = 0; $i< sizeof($CTName); $i++){ ?>
     <tr>
        <td data-th="CycleTime Name"><?php echo $CTName[$i]; ?></td>
        <td data-th="Start Event"><?php echo $_SESSION['EVTStart'][$i]; ?></td>
        <td data-th="End Event"><?php echo $_SESSION['EVTEnd'][$i]; ?></td>
     </tr>
   <?php } ?> 

      </table>
  </div>
<script type="text/javascript" src="js/CTform.js"></script>
  </body>
</html>
