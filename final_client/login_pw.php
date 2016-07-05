<?php
session_start();
//If already login, point to CT.php
include 'Session_Config_login.php';
include 'csrf.class.php';
 
$csrf = new csrf();
 
 
// Generate Token Id and Valid
$token_id = $csrf->get_token_id();
$token_value = $csrf->get_token($token_id);
 
// Generate Random Form Names
$form_names = $csrf->form_names(array('username', 'password'), false);
 
 
if(isset($_POST[$form_names['username']], $_POST[$form_names['password']])) {
        // Check if token id and token value are valid.
        if($csrf->check_valid('post')) {
                // Get the Form Variables.
                $user = $_POST[$form_names['username']];
                $password = $_POST[$form_names['password']];
 
                // Form Function Goes Here
        }
        // Regenerate a new random value for the form.
        $form_names = $csrf->form_names(array('username', 'password'), true);
}

$nameErr="";
if (empty($_POST["username"])) {
    $_SESSION['nameErr']="User ID can not be empty!";
        echo "<a href=login_usr.php></a>";
        echo("<meta http-equiv=refresh content=0;url=login_usr.php>");
        
    }
    else {
        $name = $_POST["username"];
    }
    
$_SESSION['username'] = $_POST['username'];



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title contenteditable="false">User Login PW Form</title>
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
    <script src="js/dialog.js" type="text/javascript">
</script>
</head>

<body>
   
    <header><?php include 'header_login_pw.php'; ?></header>
    

    <h2 id="welcome" align="center">Welcome! <?php echo $_POST['username']; ?></h2>

    <div align="center"><img src="img/wrangler.jpg" style="width:20%; height:20%"></div>

    <div align="center" id="login_pw_form">
        <form action="check_pw.php" method="post">
	        <fieldset>
            <label><font size="4">Enter your PASSWORD</font></label><br>
            <input id="pw" name="password" type="password" style="width:200px"><br>
            <input id="submit" type="submit" value="Sign in"><br>
            <font size="2">Forgot Password?</font>
            <a href="findpw_contact_info_client.php"><font size="2" color="#A9A9A9">Click here to find password!</font></a>

	        </fieldset>
        </form>
    </div>
    <?php include 'footer.php';?>
    
</body>
</html>
