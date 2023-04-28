<!-- Author: FONG IEK KIN BC000076 -->
<?php

if (isset($_GET['remove']))
{
    $reomve_P_id = $_GET['remove'];

    setcookie($reomve_P_id."[product_id]", "id", time()-86400*15, "/");
    setcookie($reomve_P_id."[quantity]", 0, time()-86400*15,"/");  
}
header("Location: shopping_cart.php");
?>