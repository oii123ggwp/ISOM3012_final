<!-- 
   Author: 
        php part: FONG IEK KIN BC000076
        
    Program description: this page is used to allow user to logout
-->
<?php 
session_start();
session_unset();

$_SESSION["login_session"] = false;//if false, mean user want to logout


foreach ($_COOKIE as $id => $array)//get every cookie
{
    setcookie($id."[product_id]", 0, time()-86400*15, "/");
    setcookie($id."[quantity]", 0, time()-86400*15,"/");  
}

header("Location: menu.php");
?>