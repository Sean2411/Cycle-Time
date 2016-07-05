<?php 
include_once 'Session_Config.php';
// $checkEventD=1;
// $checkSD=1;
// $checkED=1;
// $checkcusname=1;
// $checkcusemail=1;
// $checkcusphone=1;
// $checkcusfax=1;
// $checkcusCId=1;
// $checkcusadd=1;
// $checkcuscity=1;
// $checkcusstate=1;
// $checkcuszip=1;
// $checkcuscountry=1;
// if (empty($_POST["user_start"])) {
//     $_SESSION['sdEmpty']="The start date can not be blank! Please input again!";
//     $checkSD=0;        
//     }
// else if (!preg_match("/((^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(10|12|0?[13578])([-\/\._])(3[01]|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(11|0?[469])([-\/\._])(30|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(0?2)([-\/\._])(2[0-8]|1[0-9]|0?[1-9])$)|(^([2468][048]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([3579][26]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][13579][26])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][13579][26])([-\/\._])(0?2)([-\/\._])(29)$))/",$_POST["user_start"])) {
//     $_SESSION['sdErr']="Your input did not meet requirement! Please input again!";
//     $checkSD=0;          
//     }
// else{}
// if (empty($_POST["user_end"])) {
//     $_SESSION['edEmpty']="The end date can not be blank! Please input again!";
//     $checkED=0;
//     }
// else if (!preg_match("/((^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(10|12|0?[13578])([-\/\._])(3[01]|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(11|0?[469])([-\/\._])(30|[12][0-9]|0?[1-9])$)|(^((1[8-9]\d{2})|([2-9]\d{3}))([-\/\._])(0?2)([-\/\._])(2[0-8]|1[0-9]|0?[1-9])$)|(^([2468][048]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([3579][26]00)([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][0][48])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][2468][048])([-\/\._])(0?2)([-\/\._])(29)$)|(^([1][89][13579][26])([-\/\._])(0?2)([-\/\._])(29)$)|(^([2-9][0-9][13579][26])([-\/\._])(0?2)([-\/\._])(29)$))/",$_POST["user_end"])) {
//     $_SESSION['edErr']="Your input did not meet requirement! Please input again!";
//     $checkED=0;        
//     }
// else{}
// if($checkEventD*$checkeSD*$checkED==0)
// {    echo "<a href=event.php></a>";
//      echo("<meta http-equiv=refresh content=0;url=event.php>"); 
// }
// else{}




// if (empty($_POST["customer_name"])) {
//     $_SESSION['cusnameEmpty']="The name can not be blank! Please input again!";
//     $checkcusname=0;
//     }
// else if (!preg_match("/^[A-Za-z]+$/",$_POST["customer_name"])) {
//     $_SESSION['cusnameErr']="Your input contain specific symbol! Please input again!";
//     $checkcusname=0;
//     }
// else{}
// if (empty($_POST["customer_email"])) {
//     $_SESSION['cusemailEmpty']="The email can not be blank! Please input again!";
//     $checkcusemail=0;        
//     }
// else if (!preg_match("/^(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*[0-9a-zA-Z]+))@([a-zA-Z0-9-]+[.])+([a-zA-Z]{2}|net|NET|com|COM|gov|GOV|mil|MIL|org|ORG|edu|EDU|int|INT)$/",$_POST["customer_email"])) {
//     $_SESSION['cusemailErr']="Your input contain specific symbol! Please input the correct format!";
//     $checkcusemail=0;          
//     }
// else{}
// if (empty($_POST["customer_phone"])) {
//     $_SESSION['cusphoneEmpty']="The phone number can not be blank! Please input again!";
//     $checkcusphone=0;
//     }
// else if (!preg_match("/^\d{3}-\d{3}-\d{4}$/",$_POST["customer_phone"])) {
//     $_SESSION['cusphoneErr']="Your input contain other elements! Please input again!";
//     $checkcusphone=0;        
//     }
// else{}
// if (empty($_POST["customer_fax"])) {
//     $_SESSION['cusfaxEmpty']="The fax number can not be blank! Please input again!";
//     $checkcusfax=0;
//     }
// else if (!preg_match("/^\d{3}-\d{3}-\d{4}$/",$_POST["customer_fax"])) {
//     $_SESSION['cusfaxErr']="Your input contain other elements! Please input again!";
//     $checkcusfax=0;        
//     }
// else{}
// if (empty($_POST["customer_company"])) {
//     $_SESSION['cusCIdEmpty']="The number of company can not be blank! Please input again!";
//     $checkcusCId=0;
//     }
// else if (!preg_match("/^[0-9]*[1-9][0-9]*$/",$_POST["customer_company"])) {
//     $_SESSION['cusCIdErr']="Your input have some problems! Please input again!";
//     $checkcusCId=0;    
//     }
// else{}



// if (empty($_POST["user_address"])) {
//     $_SESSION['cusaddEmpty']="The name of address can not be blank! Please input again!";
//     $checkcusadd=0;
//     }
// else if (!preg_match("/^([A-Za-z]+\s?)*[A-Za-z]$/",$_POST["user_address"])) {
//     $_SESSION['cusaddErr']="Your input contain specific symbol! Please input again!";
//     $checkcusadd=0;
       
//     }
// else{}
// if (empty($_POST["user_city"])) {
//     $_SESSION['cuscityEmpty']="The name of city can not be blank! Please input again!";
//     $checkcuscity=0;
//     }
// else if (!preg_match("/^[A-Za-z]+$/",$_POST["user_city"])) {
//     $_SESSION['cuscityErr']="Your input contain specific symbol! Please input again!";
//     $checkcuscity=0;
       
//     }
// else{}
// if (empty($_POST["user_state"])) {
//     $_SESSION['cusstateEmpty']="The name of state can not be blank! Please input again!";
//     $checkcusstate=0;
//     }
// else if (!preg_match("/^([A-Za-z]+\s?)*[A-Za-z]$/",$_POST["user_state"])) {
//     $_SESSION['cusstateErr']="Your input contain specific symbol! Please input again!";
//     $checkcusstate=0;
       
//     }
// else{}
// if (empty($_POST["user_zip"])) {
//     $_SESSION['cuszipEmpty']="The zip code can not be blank! Please input again!";
//     $checkcuszip=0;
//     }
// else if (!preg_match("/^[1-9]\d{4}(?!\d)$/",$_POST["user_zip"])) {
//     $_SESSION['cuszipErr']="Your input contain specific symbol! Please input again!";
//     $checkcuszip=0;
       
//     }
// else{}
// if (empty($_POST["user_country"])) {
//     $_SESSION['cuscountryEmpty']="The name of country can not be blank! Please input again!";
//     $checkcuscountry=0;
//     }
// else if (!preg_match("/^[A-Za-z]+$/",$_POST["user_country"])) {
//     $_SESSION['cuscountryErr']="Your input contain specific symbol! Please input again!";
//     $checkcuscountry=0;
       
//     }
// else{}
// if(($checkcusname*$checkcusemail*$checkcusphone*$checkcusfax*$checkcusCId*$checkcusadd*$checkcuscity*$checkcusstate*$checkcuszip*$checkcuscountry)==0)
// {    echo "<a href=customerform.php></a>";
//      echo("<meta http-equiv=refresh content=0;url=customerform.php>"); 
// }
// else{}

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
   <?php include 'eventform.php';?>
   <?php include "footer.php";?>
  </div>
  </body>
</html>
