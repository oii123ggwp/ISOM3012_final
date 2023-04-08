<?php 
session_start();

$_SESSION["login_session"] = false;//if false, mean user want to logout

header("Location: menu.php");
?>