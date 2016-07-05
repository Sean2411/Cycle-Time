<?php
	session_start();
	if(isset($_SESSION)){
		session_destroy();
	}
	
	header("Location: description_client.php");
?>