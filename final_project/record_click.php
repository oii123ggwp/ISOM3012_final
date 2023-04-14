<?php

function record_click(string $P_ID){
// set up MySQL database connection 
    $link = @mysqli_connect( 
    'localhost',  // MySQL host name 
    'root',       // user name 
    'A12345678',  // password
    'cakeshop')  // database name you want to connect 
    or die("Cannot open MySQL database connection!<br/>"); 
 // die() after error message, won’t run any code below
    
    $stmt = $link->prepare("UPDATE product SET being_click = being_click + 1 WHERE product_id = ?");
    $stmt -> bind_param("s", $P_ID);
    $stmt->execute();//run the SQL commond

    $stmt->close();
    $link->close();
}
?>