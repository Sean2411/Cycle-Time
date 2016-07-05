<?php 
session_start(); 
include 'Session_Config_nonlogin.php';
$SRC_ID = mysql_real_escape_string($_SESSION['src_id']);
$SRC_ID = (int)$SRC_ID;
$Customer_Id = array();
$Aggregator = array();
$Dependency = array();
$CycleTime = array();
$Timestorage = array();
$CampaignName = array();
$CampainCountry = array();
$CampaignPhone = array();
$CampaignEmail = array();
$TimeCost = array();


if(isset($_POST['ProcessName']) && isset($_POST['combo'])){
  $ProcessName = $_POST['ProcessName'];
  $combo = $_POST['combo'];
  $Type = explode(":", $combo);
  $CampaignType = $Type[0];
  $SubType = $Type[1];
  GetCustomer($SRC_ID, $CampaignType, $SubType);
  ProcessMap($Customer_Id, $SRC_ID, $ProcessName);
  $FirstCID = GetBestCustomer($Timestorage);
  if(($key = array_search($FirstCID, $Customer_Id)) !== false) {
     unset($Customer_Id[$key]);
}
  array_push($CampaignName, GetCampaignName($FirstCID));
  array_push($CampainCountry, GetCampaignCountry($FirstCID));
  array_push($CampaignPhone, GetCampaignPhone($FirstCID));
  array_push($CampaignEmail, GetCampaignEmail($FirstCID));

  $SecondCID = GetSecondCustomer($Timestorage);
  if(($key = array_search($SecondCID, $Customer_Id)) !== false) {
     unset($Customer_Id[$key]);
}
  array_push($CampaignName, GetCampaignName($SecondCID));
  array_push($CampainCountry, GetCampaignCountry($SecondCID));
  array_push($CampaignPhone, GetCampaignPhone($SecondCID));
  array_push($CampaignEmail, GetCampaignEmail($SecondCID));

  $ThirdCID = GetThirdCustomer($Timestorage);
  if(($key = array_search($ThirdCID, $Customer_Id)) !== false) {
     unset($Customer_Id[$key]);
}
  array_push($CampaignName, GetCampaignName($ThirdCID));
  array_push($CampainCountry, GetCampaignCountry($ThirdCID));
  array_push($CampaignPhone, GetCampaignPhone($ThirdCID));
  array_push($CampaignEmail, GetCampaignEmail($ThirdCID));


}

function GetCampaignName($CID){
   include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT FullName from Customer where Customer_Id = ?")){  
    $stmt->bind_param("i", $CID);
    $stmt->execute();
    $stmt->bind_result($FullName);
    $stmt->fetch();
    return $FullName;
}
}
function GetCampaignPhone($CID){
   include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT PhoneNo from Customer where Customer_Id = ?")){  
    $stmt->bind_param("i", $CID);
    $stmt->execute();
    $stmt->bind_result($PhoneNo);
    $stmt->fetch();
    return $PhoneNo;
}
}
function GetCampaignEmail($CID){
   include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT Email from Customer where Customer_Id = ?")){  
    $stmt->bind_param("i", $CID);
    $stmt->execute();
    $stmt->bind_result($Email);
    $stmt->fetch();
    return $Email;
}
}
function GetCampaignCountry($CID){
   include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT Country from Customer_Address where CustomerId = ?")){  
    $stmt->bind_param("i", $CID);
    $stmt->execute();
    $stmt->bind_result($Country);
    $stmt->fetch();
    return $Country;
}
}


function GetBestCustomer($Timestorage){
  global $Customer_Id, $TimeCost;
  $flag = 0;
  $Minimum = $Timestorage[0];
  for($i = 0; $i < sizeof($Timestorage); $i++){
      if($Timestorage[$i] < $Minimum){
        $Minimum = $Timestorage[$i];
        $flag = $i;
      }else{
      }
  }
  array_push($TimeCost, $Timestorage[$flag]);
  return $Customer_Id[$flag];
}


function GetSecondCustomer($Timestorage){
  global $Customer_Id,$TimeCost;
  $flag = 0;
  $Minimum = $Timestorage[0];
  for($i = 0; $i < sizeof($Timestorage); $i++){
      if($Timestorage[$i] < $Minimum){
        $Minimum = $Timestorage[$i];
        $flag = $i;
      }else{
      }
  }
  array_push($TimeCost, $Timestorage[$flag]);
  return $Customer_Id[$flag];
}

function GetThirdCustomer($Timestorage){
  global $Customer_Id,$TimeCost;
  $flag = 0;
  $Minimum = $Timestorage[0];
  for($i = 0; $i < sizeof($Timestorage); $i++){
      if($Timestorage[$i] < $Minimum){
        $Minimum = $Timestorage[$i];
        $flag = $i;
      }else{
      }
  }
  array_push($TimeCost, $Timestorage[$flag]);
  return $Customer_Id[$flag];
}

function GetCustomer($SRC_ID,$CType, $SType){
    global $Customer_Id;
  include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT DISTINCT CustomerId from EVENT_Tbl where SRC_ID = ? and CampaignType = ? and Subtype = ?")){
    $stmt->bind_param("iss",$SRC_ID, $CType, $SType);
    $stmt->execute();
    $stmt->bind_result($CId);
    while($stmt->fetch()){
      array_push($Customer_Id, $CId);
    }
  }
}

function ProcessMap($Customer_Id,$SRC_ID,$ProcessName){
  global $Timestorage; 
  $totalTime = 0;
  foreach($Customer_Id as $SignalCustomer){
    // for each Customer, Get the Time of Process
    include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT CycleTime_Id, Order_Id from Process_CT_Tbl where SRC_ID = ? and Process_Name = ? ")){
    $stmt->bind_param("is", $SRC_ID, $ProcessName);
    $stmt->execute();
    $stmt->bind_result($CycleTime_Id, $Order_Id);
    while($stmt->fetch()){
        $totalTime = $totalTime + GetTime($SignalCustomer, $CycleTime_Id);
    }
  }
   include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT Set_Name from Process_SET_Tbl where SRC_ID = ? and Process_Name = ? ")){
    $stmt->bind_param("is", $SRC_ID, $ProcessName);
    $stmt->execute();
    $stmt->bind_result($Set_Name);
    while($stmt->fetch()){
      $totalTime = $totalTime + FetchSet($SignalCustomer, $Set_Name);   
    }
}
  array_push($Timestorage, strval($totalTime));
  $totalTime = 0;
  }
  return 0;
}



// From a set, I wannna get the result of option and Dependency
function FetchSet($SignalCustomer, $Set_Name){
  global $Aggregator, $Dependency, $CycleTime;
  include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT a.Aggreator, b.Dependency, b.CycleTime_Id from Process_SET_Detail_Tbl a, Process_Set_Option_Tbl b where a.Option_Id = b.Option_Id and a.Set_Name = b.Set_Name and a.Set_Name = ? ")){
    $stmt->bind_param("s", $Set_Name);
    $stmt->execute();
    $stmt->bind_result($Agg, $Dep, $Cycle);
    while($stmt->fetch()){
      array_push($Aggregator, $Agg);
      array_push($Dependency, $Dep);
      array_push($CycleTime, $Cycle);
    }
    //Retrun Time;
    return CompareSet($SignalCustomer, $Aggregator, $Dependency,$CycleTime);
  }
 }


function CompareSet($SignalCustomer, $Aggregator, $Dependency, $CycleTime){
  switch ($Aggregator[0]) {
    case 'Maximum':
     for($j = 0; $j < sizeof($CycleTime); $j++){
        if (strpos($CycleTime[$j],':') !== false) {
        $newoption = explode(":", $CycleTime[$j]);
        $option1[$j] = 0;
        for($i = 0; $i < sizeof($NewCT); $i++){
          $option1[$j] = $option1[$j] + GetTime($SignalCustomer,$NewCT[$i]);
        } 
        }else{
          $option1[$j] =  GetTime($SignalCustomer,$CycleTime[$j]);
        }
}
 if($option1[0] > $option1[1]){
  return $option1[0] + GetTime($SignalCustomer, $Dependency[0]);
 }else{
  return $option1[1] + GetTime($SignalCustomer, $Dependency[1]);
 }
      break;
    case 'Minimum':
     for($t = 0; $t < sizeof($CycleTime); $t++){
        if (strpos($CycleTime[$t],':') !== false) {
        $NewCT = explode(":", $CycleTime[$t]);
        $option[$j] = 0;
        for($i = 0; $i < sizeof($NewCT); $i++){
          $option[$t] = $option[$t] + GetTime($SignalCustomer,$NewCT[$i]);
        } 
        }else{
          $option[$t] =  GetTime($SignalCustomer,$CycleTime[$t]);
        }
}
 if($option[0] > $option[1]){
  return $option[1] + GetTime($SignalCustomer, $Dependency[1]);
 }else{
  return $option[0] + GetTime($SignalCustomer, $Dependency[0]);
 }
      break;
  };
}



function GetTime($Customer_Id, $Cycle){
   $EStart = array();
    $EEnd = array();
    $JEI = array();
    $days = array();
  include 'DB_Config.php';
  if($stmt = $mysqli->prepare("SELECT JVA_CT_ID From CT_Mapping_Tbl where SRC_CT_Name = ?")){
    $stmt->bind_param("s", $Cycle);
    $stmt->execute();
    $stmt->bind_result($JVA_CT_ID);
    $stmt->fetch();
     include 'DB_Config.php';
     if($stmt = $mysqli->prepare("SELECT SRC_ID, EVT_Start, EVT_End From CT_Mapping_Tbl where JVA_CT_ID = ?")){
        $stmt->bind_param("s", $JVA_CT_ID);
        $stmt->execute();
        $stmt->bind_result($SI, $EVTS, $EVTE);
        while($stmt->fetch()){
          array_push($days, GetCTTime($SI, $Customer_Id, $EVTS, $EVTE));
        }
        $media = calculate_median($days);
        return $media;
  }
}
}
function GetCTTime($SI, $Customer_Id, $EVTS, $EVTE){
    include 'DB_Config.php';
   if($stmt = $mysqli->prepare("SELECT a.EVT_StartDate From EVENT_Tbl a, EVENT_Mapping_Tbl b where a.EVT_ID = b.EVT_ID  and b.JVA_EVT_ID = ? and a.SRC_ID = ? and a.CustomerId = ?")){
        $stmt->bind_param("sii", $EVTS, $SI, $Customer_Id);
        $stmt->execute();
        $stmt->bind_result($SDate);
        $stmt->fetch();
      }
    include 'DB_Config.php';
   if($stmt = $mysqli->prepare("SELECT a.EVT_StartDate From EVENT_Tbl a, EVENT_Mapping_Tbl b where a.EVT_ID = b.EVT_ID  and b.JVA_EVT_ID = ? and a.SRC_ID = ? and a.CustomerId = ?")){
        $stmt->bind_param("sii", $EVTE, $SI, $Customer_Id);
        $stmt->execute();
        $stmt->bind_result($EDate);
        $stmt->fetch();
      }
    $diff = abs(strtotime($EDate) - strtotime($SDate));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    return  $years*12*30 + $months*30 + $days;
 }


function calculate_median($arr) {
    sort($arr);
    $count = count($arr); //total numbers in array
    $middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
    if($count % 2) { // odd number, middle is the median
        $median = $arr[$middleval];
    } else { // even number, calculate avg of 2 medians
        $low = $arr[$middleval];
        $high = $arr[$middleval+1];
        $median = (($low+$high)/2);
    }
    return $median;
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/normalize.css">
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/pepper-grinder/jquery-ui.css" media="screen" rel="stylesheet" type="text/css">
     <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
     <link rel="stylesheet" href="css/header.css">
      <link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" href="css/form.css">
      <link rel="stylesheet" href="css/show.css">
    <script type="text/javascript" src="js/jquery-ui-1.9.0.custom.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/jquery.ui.core.js"></script>
    <script type="text/javascript" src="lib/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="jquery-ui-form.js"></script>
    <script type="text/javascript" src="js/app.js"></script>

    <header>
        <a href="#" id="logo"></a>

        <h1 style="color: #fff"><a href="#" id="logo">Cycle Time Prediction System</a></h1>

        <h2><a href="#" id="logo">Client Tool</a></h2>

        <nav>
            <ul>
                <li><a href="description_client.php">Project description</a></li>

                <li><a href="CT.php">Create Cycle Time</a></li>

                <li><a href="cycletime.php">Confirmation</a></li>

                <li><a href="processmap.php">Process</a></li>

                <li><a href="logout.php">logout</a></li>
            </ul>
        </nav>
    </header>
    <body>
      <?php for($i = 0; $i < 3; $i++){ ?>
  <div class="span4" style="float:left;">
  <div class="todo mrm">
    <div class="todo-header">
      <h3 class="demo-panel-title">Rank <?php echo $i + 1; ?></h3>
    </div>
      <ul>
        <li class="todo-wrap five">
          <div class="todo-content">
            <h4 class="todo-name">
              Campaign Type: <?php echo $CampaignType."<br>"; ?>Sub Type: <?php echo $SubType; ?> 
            </h4>
          </div>
        </li>

         <li class="todo-wrap six">
          <div class="todo-content">
            <h4 class="todo-name">
              Time Cost: <?php echo $TimeCost[$i]; ?>
            </h4>
          </div>
        </li>

        <li class="todo-wrap one">
          <div class="todo-content">
            <h4 class="todo-name">
              Campaign Country: <?php echo $CampainCountry[$i]; ?>
            </h4>
          </div>
        </li>

        <li class="todo-wrap two">
          <div class="todo-content">
            <h4 class="todo-name">
              Campaign Name: <?php echo $CampaignName[$i]; ?>
            </h4>
          </div>
        </li>

        <li class="todo-wrap three">
          <div class="todo-content">
            <h4 class="todo-name">
              Campaign Phone: <?php echo $CampaignPhone[$i]; ?>
            </h4>
          </div>
        </li>
        
        <li class="todo-wrap four">
          <div class="todo-content">
            <h4 class="todo-name">
              Campaign Email: <?php echo $CampaignEmail[$i]; ?>
            </h4>
          </div>
        </li>
      </ul>
  </div>
</div>
<?php } ?>


    </body>
</html>





