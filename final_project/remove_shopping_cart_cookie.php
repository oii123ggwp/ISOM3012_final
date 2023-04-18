<?php

if (isset($_GET['remove']))
{
    $reomve_P_id = $_GET['remove'];

    setcookie($reomve_P_id."[product_id]", $P_id, time()+86400*15, "/");
    setcookie($reomve_P_id."[quantity]", $quantity + $old_quantity, time()+86400*15,"/");  
}
header("Location: shopping_cart.php");
?>