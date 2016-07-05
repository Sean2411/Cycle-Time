<?php
session_start();
include_once("Session_Config_nonlogin.php");
$SRC_ID = mysql_real_escape_string($_SESSION['src_id']);
$SRC_ID = (int)$SRC_ID;
 $campaign_type = array();
 $sub_type = array();
 $CustomerName = array();
 $CustomerCoutry = array();
 $CTName = array();
 $SEVENT = array();
 $EEVENT = array();
 $SProfile_ID = array();
 $EProfile_ID = array();
 $SCustomer = array();
$ECustomer = array();

//loading customer info
$CampaignType = $_SESSION['CampaignType'];
$SubType = $_SESSION['SubType'];
$type_combo = $_SESSION['typecombo'];
$customerId = $_SESSION['CustomerId'];
$clientName =  $_SESSION['clientName'];
$EVTStart = $_SESSION['EVTStart'];
$EVTEnd = $_SESSION['EVTEnd'];
$clientEmail = " ";
$clientPhone = " ";
 
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
  $JVA_ID_START = GetJVAEVTID($eventStart);
  $JVA_ID_END = GetJVAEVTID($eventEnd);
  $JVACTID = GetNewJVA_CT_ID();
  $ctName = $_POST['CT_Name'];
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT id_CTMapping FROM CT_Mapping_Tbl where SRC_CT_NAME = ?")){
    $stmt->bind_param("s", $ctName);
    $stmt->execute();
    $stmt->bind_result($id_CTMapping);
    $stmt->fetch();
    if($id_CTMapping > 0){
    }else{
    if(!empty($ctName)){
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
          include("DB_Config.php");
          if(!CheckDuplicate($SRC_ID, $JVA_ID_START, $JVA_ID_END)){
             if($stmt = $mysqli->prepare("INSERT INTO CT_Mapping_Tbl (id_CTMapping, SRC_ID, SRC_CT_Name, JVA_CT_ID, EVT_Start, EVT_End)values (Default, ?, ?, ?, ?, ?)")){
                $stmt->bind_param("issss", $SRC_ID, $ctName, $CTID, $JVA_ID_START, $JVA_ID_END);
                $stmt->execute();
               }
           }
       }
     }
else{
    include("DB_Config.php");
        if($stmt = $mysqli->prepare("INSERT INTO CT_Mapping_Tbl (id_CTMapping, SRC_ID, SRC_CT_Name, JVA_CT_ID, EVT_Start, EVT_End) values (Default, ?, ?, ?, ?, ?)")){
        $stmt->bind_param("issss", $SRC_ID, $ctName, $JVACTID, $JVA_ID_START, $JVA_ID_END);
        $stmt->execute();
      }
    }
  }
}
}
}
}
function GetJVAEVTID($EvtName){
   include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT DISTINCT b.JVA_EVT_ID from EVENT_Tbl a, EVENT_Mapping_Tbl b where a.EVT_ID = b.EVT_ID and a.EVT_NAME = ?")){
      $stmt->bind_param("s", $EvtName);
      $stmt->execute();
      $stmt->bind_result($JVAID);
      $stmt->fetch();
      return $JVAID;
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


function GetCustomerId($customer_name){
  include("DB_Config.php");
 if($stmt = $mysqli->prepare("SELECT Customer_Id from Customer where FullName = ?")){
  $stmt->bind_param("s", $customer_name);
  $stmt->execute();
  $stmt->bind_result($customer_id);
  $stmt->fetch();
 }
 return $customer_id;
}

function GetRandomNumber(){
  $EVT_ID = mt_rand(0,1000);
  return $EVT_ID;
}

function GetNewJVA_EVT_ID(){
  $JVA_EVT_ID = "JVA_DT_". mt_rand(0,100);
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

function GetTyes($clientID){
   global $campaign_type,$sub_type;
   include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT DISTINCT CampaignType, Subtype FROM EVENT_Tbl where SRC_ID = ?")){
    $stmt->bind_param("i", $clientID);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $stmt->bind_result($campaigntype, $subtype);
    while($stmt->fetch()){
      array_push($campaign_type, $campaigntype);
      array_push($sub_type, $subtype);
    }
  }
  return $num_of_rows;
}
function GetEventName($clientId){
  global $eventName;
    include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT DISTINCT EVT_NAME from EVENT_Tbl where SRC_ID = ?")){
      $stmt->bind_param("s", $clientId);
      $stmt->execute();
      $stmt->bind_result($EVTNAME);
      while($stmt->fetch()){
        array_push($eventName, $EVTNAME);
      }
    }
}

function GETProfileId($JVAID){
  $profileid = array();
  include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT DISTINCT SRC_PROFILE_ID from EVENT_Mapping_Tbl  where JVA_EVT_ID = ?")){
      $stmt->bind_param("s", $JVAID);
      $stmt->execute();
      $stmt->bind_result($profileId);
      while($stmt->fetch()){
        array_push($profileid, $profileId);
      }
  }
  return $profileid;
}

function GetCustomer($clientID){
  global $CustomerName;
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT Customer_Id, FullName FROM Customer where SRC_ID = ?")){
    $stmt->bind_param("i", $clientID);
    $stmt->execute();
    $stmt->store_result();
    $num_of_rows = $stmt->num_rows;
    $stmt->bind_result($customerid, $customerName);
    while($stmt->fetch()){
      GetCustomerCoutry($customerid);
      array_push($CustomerName, $customerName);
    }    
  }
    return $num_of_rows;
}

function GetCustomerCoutry($customerid){
  global $CustomerCoutry;
  include("DB_Config.php");
  if($stmt = $mysqli->prepare("SELECT Country FROM Customer_Address where CustomerId = ?")){
    $stmt->bind_param("i", $customerid);
    $stmt->execute();
    $stmt->bind_result($country);
    $stmt->fetch();
    array_push($CustomerCoutry, $country);
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

 function GetClientInfo($ID){
  global $clientPhone,$clientEmail;
  include("DB_Config.php");
    if($stmt = $mysqli->prepare("SELECT workphone, Email FROM Source where SRC_ID = ?")){
          $stmt->bind_param("i", $ID);
          $stmt->execute();
          $stmt->bind_result($phone,$email);
          $stmt->fetch();
          $clientPhone = $phone;
          $clientEmail = $email;
}
}




 GetEventName($SRC_ID);
 GetCycleTime($SRC_ID);
 GetClientInfo($SRC_ID);
 $numberoftype = GetTyes($SRC_ID);
 $numberofcustomer = GetCustomer($SRC_ID);
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title contenteditable="false">CycleTime</title>
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/pepper-grinder/jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/form.css" type="text/css">
    <link href="css/dialog.css" rel="stylesheet" type="text/css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript">
</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript">
</script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js">
</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript">
</script>
    <script type="text/javascript" src="lib/jquery.ui.core.js">
</script>
    <script type="text/javascript" src="lib/jquery.ui.widget.js">
</script>
    <script type="text/javascript" src="jquery-ui-form.js">
</script>
    <script type="text/javascript" src="js/app.js">
</script>
    <style type="text/css">
#submit{
    position: relative;
    }
    </style>
</head>

<body>
    <header>
        <a href="#" id="logo"></a>

        <h1 style="color: #fff"><a href="#" id="logo">Cycle Time Prediction System</a></h1>

        <h2><a href="#" id="logo">Client Tool</a></h2>

        <nav>
            <ul>
                <li><a href="description_client.php">Project description</a></li>

                <li><a href="CT.php">Create Cycle Time</a></li>

                <li><a href="cycletime.php" class="selected">Confirmation</a></li>

                <li><a href="processmap.php">Process</a></li>

                <li><a href="logout.php">logout</a></li>
            </ul>
        </nav>
    </header>

    <div id="wrapper">
        <section>
            <h3 style="text-align:center;">Check Client Information Below. Go to <a href="processmap.php" style="color:#599a68">Process-Map</a> Page</h3>
        </section>
    </div>

    <div class="container .showgrid">
        <div class="twelve columns resume">
            <h3 style="border-bottom: 1px solid grey;">CampainType and SubType</h3>

            <div class="row">
                <h3 class="seven columns alpha">Current Client has <font style="color: green;"><?php echo $numberoftype;?></font> kinds of combo of CampaignType and SubType</h3>
            </div>

            <table class="rwd-table">
                <tr>
                    <th>Campaign Type</th>

                    <th>Sub Type</th>
                </tr><?php for($i = 0; $i< sizeof($campaign_type); $i++){ ?>

                <tr>
                    <td data-th="Campaign Type"><?php echo $campaign_type[$i]?></td>

                    <td data-th="Sub Type"><?php echo $sub_type[$i]?></td>
                </tr><?php } ?>
            </table>

            <h3 style="border-bottom: 1px solid grey;">Customer Information</h3>

            <div class="row">
                <h3 class="seven columns alpha">Current Client has <font style="color: green;"><?php echo $numberofcustomer;?></font> Customers</h3>
            </div>

            <table class="rwd-table">
                <tr>
                    <th>Customer Name</th>

                    <th>Customer Country</th>
                </tr><?php for($i = 0; $i< sizeof($CustomerName); $i++){ ?>

                <tr>
                    <td data-th="Customer Name"><?php echo $CustomerName[$i]?></td>

                    <td data-th="Customer Country"><?php echo $CustomerCoutry[$i]?></td>
                </tr><?php } ?>
            </table>

            <h3 style="border-bottom: 1px solid grey;">CycleTime Information</h3>

            <div class="row">
                <h3 class="seven columns alpha">Process Map Component</h3>
            </div>

            <h3 class="seven columns alpha">---CycleTime---</h3>

            <table class="rwd-table">
                <tr>
                    <th>CycleTime Name</th>

                    <th>Start Event</th>

                    <th>End Event</th><?php for($i = 0; $i< sizeof($CTName); $i++){ ?>
                </tr>

                <tr>
                    <td data-th="CycleTime Name" name="CTName"><?php echo $CTName[$i]; ?></td>

                    <td data-th="Start Event" name="SEvent"><?php echo $SEVENT[$i]; ?></td>

                    <td data-th="End Event" name="EEvent"><?php echo $EEVENT[$i]; ?></td>
                </tr><?php } ?>
            </table>
        </div><?php include "footer.php";?>
    </div>
</body>
</html>
