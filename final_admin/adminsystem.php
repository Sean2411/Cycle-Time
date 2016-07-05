<?php
include_once("Session_Config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title contenteditable="false">CycleTime</title>
     <link rel="stylesheet" href="css/normalize.css">
     <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" href="css/main.css">
     <link rel="stylesheet" href="css/responsive.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="css/dialog.css" rel="stylesheet"> <!-- Including CSS File Here-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
     <link rel="stylesheet" href="css/header.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="js/dialog.js" type="text/javascript"></script>
  </head>
  <body>
    <header>
      <a href="admin.php" id ="logo">
        <h1 contenteditable="true">Cycle Time</h1>
        <h2>AdminSystem</h2>
      </a>  
      <nav>
        <ul>
          <li><a href="adminsystem.php" class="selected">admin</a></li>
          <li><a href="client.php">Create_dataset</a></li>
           <li><a href="update.php">Update_dataset</a></li>
           <li><a href="predict.php">Prediction</a></li>
          <li><a href="logout.php">logout</a></li>
        </ul>
      </nav>
    </header>
    <?php include 'dialog.php';?>
    <div id="wrapper">
    <section>
      <ul id='gallery'>
        <li>
          <a href="img/numbers-01.jpg">
            <img src="img/numbers-01.jpg" alt="">
            <p>Experimentation with color and texture.</p>
          </a>
        </li>
        <li>
          <a href="img/numbers-02.jpg">
            <img src="img/numbers-02.jpg" alt="">
            <p>Playing with blending modes in Photoshop.</p>
          </a>
        </li>
        <li>
          <a href="img/numbers-06.jpg">
            <img src="img/numbers-06.jpg" alt="">
            <p>Trying to create an 80's style of glows.</p>
          </a>
        </li>
        <li>
          <a href="img/numbers-09.jpg">
            <img src="img/numbers-09.jpg" alt="">
            <p>Drips created using Photoshop brushes.</p>
          </a>
        </li>
      </ul>
    </section>
    <footer>
      <a href="https://www.facebook.com/yi.wang.3572846"><img src="img/facebook-wrap.png" alt="Facebook Logo" class="social-icon"></a>
      <p>&copy; 2014 Yi Wang.</p>
    </footer>
  </div>
  </body>
</html>
