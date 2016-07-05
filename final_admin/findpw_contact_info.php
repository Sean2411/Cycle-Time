<?php
session_start();
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title contenteditable="false">Login_usr</title>
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login_form.css" rel="stylesheet" type="text/css"><!--     <link href="css/dialog.css" rel="stylesheet" type="text/css"> -->
    <!-- Including CSS File Here-->
    <!-- Including CSS & jQuery Dialog UI Here-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript">
</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript">
</script>
    <!--
<script src="js/dialog.js" type="text/javascript">
</script>
-->
</head>

<body>
    <header>
	    <?php include 'admin.php'; ?>
    </header>

    
        <div id="login" align="center" style="width: 40%; height: 30%; margin: 200px auto; background:#384047; border-radius: 5px">
           <fieldset style="color: white; margin: auto">
                    <label>Please contact this number:</label><br>
                    <label>Tel:917-111-7777</label>
           </fieldset>
           
        </div>
     <?php include 'footer.php';?>

</body>
</html>
