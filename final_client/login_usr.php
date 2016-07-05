<?php
session_start();
include 'Session_Config_login.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title contenteditable="false">User Login</title>
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Changa+One|Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login_form.css" rel="stylesheet" type="text/css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript">
</script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript">
</script>
</head>

<body>
    <header>
	    <?php include 'header_login_usr.php'; ?>
    </header>

    
        <div id="login" align="center">
            <form name="login_usr" action="login_pw.php" method="post">
                <fieldset>
                    <label>Enter your ID</label><br>
                    <input id="name" name="username" type="text" style="width: 200px" 
                    		value="<?php echo htmlspecialchars($name);?>"><br>
                    	<span class="error"><?php echo $_SESSION['nameErr']; session_destroy();?></span><br>
                    <input id="submit" type="submit" value="Log In"><br>
                </fieldset>
            </form>
        </div>
     <?php include 'footer.php';?>

</body>
</html>
