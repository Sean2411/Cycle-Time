<?php
session_start();
include 'include.php';
global $flag;
$flag = 1;
	$action = array();
	$action['result'] = null;
	$text = array();
  if ($_SESSION["code"] == $_POST["captcha"]) {
}
else{
  $flag = 0;
}
  if(empty($_POST['username'])){
		$action['result'] = 'error';
		array_push($text, 'You forgot your username');
	}
	elseif(empty($_POST['Email'])){
		$action['result'] = 'error';
		array_push($text, 'You forgot your email');
	}
if($action['result'] != 'error' && isset($_POST['password']) && isset($_POST['security-question']) && isset($_POST['security-question-answer']) && $flag == 1 ){
		 $username = trim($_POST['username']);
		 $password = md5(trim($_POST['password']));
		 $email = trim($_POST['Email']);
     $question  = trim($_POST['security-question']);
     $answer = trim($_POST['security-question-answer']);
		 $action['text'] = $text;
     $defaultActive = 0;

 if($stmt = $mysqli->prepare("SELECT * From System where Username = ?")){
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($everything);
    $stmt->fetch();
    if(isset($everything)){
    }
    else{
      if($stmt = $mysqli->prepare("INSERT INTO System (LoginId, Username, Password, Email, Active,question, answer) values (Default, ?, ?, ? ,?, ?, ?)")){
        $stmt->bind_param("sssiss", $username,$password, $email,$defaultActive, $question, $answer);
        $stmt->execute();
        $stmt->close();
      }
    }     
 }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title contenteditable="false">Nick Pettit | Designer</title>
     <link rel="stylesheet" href="css/normalize.css">
     <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/responsive.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/dialog.css" rel="stylesheet">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="js/dialog.js" type="text/javascript"></script>
  </head>
  <body>
<?php include 'header.php';?>
<?php include 'dialog.php';?>
<div id="wrapper">
	<?php 
  if($flag == 1){
		echo "<h2 style='background:green;font-size:1.0em'>congratulations, You already Create an account! Then you can login anytime</h2>";
  	}
  elseif($flag == 0){
    echo "<div style='background:green;font-size:1.0em;'><p style='text-align:center;'>Sorry, your captcha does not match!</p>";
    echo "<button style='width:100%; heigh:30%;'><a href='signup.html'>Back to signup</a></button></div>";
  }
  ?>
  <?php include 'footer.php';?>
  <?php
  $stmt->close();
  $mysqli->close();
  ?>
  </div>
  </body>
</html>