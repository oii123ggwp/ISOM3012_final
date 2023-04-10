<!-- 
   Author: 
        php part: FONG IEK KIN BC000076
        data: 
        
   Program description: this page is used to display the product
-->

<!DOCTYPE html>
<?php 
// set up MySQL database connection 
$link = @mysqli_connect( 
   'localhost',  // MySQL host name 
   'root',       // user name 
   'A12345678',  // password
   'cakeshop')  // database name you want to connect 
   or die("Cannot open MySQL database connection!<br/>"); 
// die() after error message, won’t run any code below

$all_product_sql = "SELECT * FROM product";

?>
<body> 
<link rel="stylesheet" type="text/css" href="product.css">

<div style="text-align:center;">
<span style="font-family:cursive; font-size:40px; color:#4C6071">OUR PRODUCT<br></span>
</div>

<div class="pic">
<br>
<img src="image/cake3.jpg">
</div>

<div class="product">
   <?php

   if ( $result = mysqli_query($link, $all_product_sql) ) { //checking error
      while( $row = mysqli_fetch_assoc($result) ){ 
         echo "<div class='row'>";
         echo "<img src='image/".$row['product_img_path']."'>";
         echo "<h4>".$row['product_name']."</h4>";
         echo "<h5>$".$row['product_price']."/pc</h5>";
         echo "</div>";
      }     
      mysqli_free_result($result); // release memory spaces
   }    
   ?>
   
</body>
</html>