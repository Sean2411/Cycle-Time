<?php
session_start();
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
?>




<div id="dialog" title="Sign in">
<form action="login.php" method="post">
<input type="hidden" name="<?= $token_id; ?>" value="<?= $token_value; ?>" />
<label>UserName:</label>
<input id="name" name="username" type="text">
<label>Password:</label>
<input id="password" name="password" type="password">
<input id="submit" type="submit" value="Signin">
<br/>
<p>Not Registered? <a href="signup.html" >Sign up for an account</a></p>
<p>Forgot Password? <a href="find_pw_form1.php" >Follow steps to reset your password</a></p>
</form>
</div>