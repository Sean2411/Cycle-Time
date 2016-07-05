<?php 
include_once 'Session_Config.php';
include 'DB_Config.php';

// $checkname=1;
// $checkemail=1;
// $checkphone=1;
// $checkcn=1;
// $checkevent=1;
// if (empty($_POST["name"])) {
//     $_SESSION['nameEmpty']="The name can not be blank! Please input again!";
//     $checkname=0;
//     }
// else if (!preg_match("/^([A-Za-z]+\s?)*[A-Za-z]$/",$_POST["name"])) {
//     $_SESSION['nameErr']="Your input contain specific symbol! Please input again!";
//     $checkname=0;
//     }
// else{}
// if (empty($_POST["user_email"])) {
//     $_SESSION['emailEmpty']="The email can not be blank! Please input again!";
//     $checkemail=0;        
//     }
// else if (!preg_match("/^(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*[0-9a-zA-Z]+))@([a-zA-Z0-9-]+[.])+([a-zA-Z]{2}|net|NET|com|COM|gov|GOV|mil|MIL|org|ORG|edu|EDU|int|INT)$/",$_POST["user_email"])) {
//     $_SESSION['emailErr']="Your input contain specific symbol! Please input the correct format!";
//     $checkemail=0;          
//     }
// else{}
// if (empty($_POST["user_phone"])) {
//     $_SESSION['phoneEmpty']="The phone number can not be blank! Please input again!";
//     $checkphone=0;
//     }
// else if (!preg_match("/^\d{3}-\d{3}-\d{4}$/",$_POST["user_phone"])) {
//     $_SESSION['phoneErr']="Your input contain specific symbol! Please input again!";
//     $checkphone=0;        
//     }
// else{}
// if (empty($_POST["combo_number"])) {
//     $_SESSION['cnEmpty']="The number of combination can not be blank! Please input again!";
//     $checkcn=0;
//     }
// else if (!preg_match("/^(\d{1,2}|100)$/",$_POST["combo_number"])) {
//     $_SESSION['cnErr']="Your input have some problems! Please input again!";
//     $checkcn=0;    
//     }
// else{}
// if (empty($_POST["event"])) {
//     $_SESSION['eventEmpty']="The number of event can not be blank! Please input again!";
//     $checkevent=0;
//     }
// else if (!preg_match("/^[0-9]*[1-9][0-9]*$/",$_POST["event"])) {
//     $_SESSION['eventErr']="Your input contain specific symbol! Please input again!";
//     $checkevent=0;
       
//     }
// else{}
// if($checkname*$checkemail*$checkphone*$checkcn*$checkevent==0)
// {    echo "<a href=client.php></a>";
//      echo("<meta http-equiv=refresh content=0;url=client.php>"); 
// }
// else
// {
//loading client info into database
$message = array();
$errors = array();
$events = array();

function GetEVTName(){
  global $events;
 include 'DB_Config.php';
 if($stmt = $mysqli->prepare("SELECT DISTINCT EVT_NAME From EVENT_Tbl order by idEVT_Tbl")){
    $stmt->execute();
    $stmt->bind_result($EVTName);
    while($stmt->fetch()){
      array_push($events, $EVTName);
    }
  }
}
GetEVTName();
array_push($events, 'None');


if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_phone']) && isset($_POST['name']) && isset($_POST['Password']) && isset($_POST['combo_number']) && isset($_POST['event']) ){
  $user_name = mysql_real_escape_string($_POST['name']);
  $_SESSION['clientName'] = $user_name;
  $user_email = mysql_real_escape_string($_POST['user_email']);
  $_SESSION['clientEmail'] = $user_email;
  $user_phone = mysql_real_escape_string($_POST['user_phone']);
  $_SESSION['clientPhone'] = $user_phone;
  $UserName = mysql_real_escape_string($_POST['user_name']);
  $Password = md5(mysql_real_escape_string($_POST['Password']));

  $Num_Combo = $_POST['combo_number'];
  $Num_event = $_POST['event'];
//need to be fixed
 if($stmt = $mysqli->prepare("SELECT SRC_ID From Source where ClientName = ?")){
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->fetch();
    if($id > 0){
      $message[] = 'Current Client info has existed.';
    }
    else{
      if($stmt = $mysqli->prepare("INSERT INTO Source values (Default, ?, ?, ?, ?, ?)")){
        $stmt->bind_param("sssss", $UserName,$Password,$user_name,$user_email,$user_phone);
        $stmt->execute();
      if($stmt = $mysqli->prepare("select SRC_ID from Source where UserName = ?")){
          $stmt->bind_param("s", $UserName);
          $stmt->execute();
          $stmt->bind_result($srcId);
          $stmt->fetch();
          $_SESSION['srcId'] = $srcId;
         }
      }
    }     
 }
}
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
     <link rel="stylesheet" href="css/header.css">
     <link href="css/dialog.css" rel="stylesheet"> <!-- Including CSS File Here-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/jquery.ui.core.js"></script>
    <script type="text/javascript" src="lib/jquery.ui.widget.js"></script>
    <!-- // <script type="text/javascript" src="js/Procss_detail.js"></script> -->
    <link rel="stylesheet" href="css/form.css">
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
      <form action="customer.php" method="post">

        <fieldset>

          <legend><p class="number">1</p> Process Info</legend>
          <?php for($i = 0; $i < $Num_Combo; $i++){ ?>
          <label for="campaigntype">Campaign Type <p class="number"><?php echo $i ?></p>:</label>
          <input type="text" id="campaigntype" name="Campaign_type[]">
          <!-- <span>Notices: This filed is letter only and cannot be empty</span> -->

          <label for="subtype">Sub Type <p class="number"><?php echo $i ?></p>:</label>
          <input type="text" id="subtype" name="Sub_type[]">
          <!-- <span>Notices: This filed is letter only and cannot be empty </span> -->
          <?php } ?>
        </fieldset>

        <fieldset>

          <legend><p class="number">2</p>Event Info</legend>
          <?php for($j = 0; $j < $Num_event; $j++){ ?>
          <label for="eventName">Event Name <p class="number"><?php echo $j ?></p>:</label>
          <input type="text" id="eventName" name="eventName[]">
          <!-- <span>Notices: This field is alphanumeric only and cannot be empty </span> -->

          <label for="eventExisted">Select the simliar event or Select None</label>
          <select id="eventExisted" name="eventExisted[]">
            <?php for($i = 0; $i < sizeof($events); $i++){?>
              <option value="<?php echo $events[$i] ?>"><?php echo $events[$i];?></option>
        <?php }?>
          </select>
        <?php } ?>
        </fieldset>

        <input type="submit" id="submit" value="Customer Info->"/>

      </form>
    
   <?php include "footer.php";?>
  </div>
  </body>
</html>

