<?php 

//If already login, point to CT.php
if (isset($_SESSION['login']))
{
 header("Location:CT.php"); 
 
}
 ?>