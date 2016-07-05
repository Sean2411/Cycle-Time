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
     <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
     <link rel="stylesheet" href="css/header.css">
    <script type="text/javascript" src="js/jquery-ui-1.9.0.custom.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/jquery.ui.core.js"></script>
    <script type="text/javascript" src="lib/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="jquery-ui-form.js"></script>
    <script type="text/javascript" src="js/app.js"></script>

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
    <body>
<?php
 $var = $_POST['squence'];
 var_dump($var);
 $var1 = $_POST['SRC_CT'];
 echo "<br>";
 var_dump($var1);
  ?>


       </body>

</html>