<!-- 
   Author: 
        php part: FONG IEK KIN BC000076
        
    Program description: this page is used to allow user to logout
-->
<?php 
session_start();

$_SESSION["login_session"] = false;//if false, mean user want to logout

header("Location: menu.php");
?>