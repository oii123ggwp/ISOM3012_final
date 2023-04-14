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

require 'record_click.php';

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
<div>
   <!--
      if user click one of the submit button, the page will show the product related to the submit name
   -->
   <form method = "post" action = "search_product.php">
   <input type = "submit" name = "cartoon" value = "cartoon">&nbsp;
   <input type = "submit" name = "fruit" value = "fruit">&nbsp;
   <input type = "submit" name = "chocolate" value = "chocolate">&nbsp;
   <input type = "submit" name = "traditional" value = "traditional">&nbsp;
   <input type = "submit" name = "wedding" value = "wedding">
   </form>
</div>
<div class="product">
   <?php
   if(isset($_POST['cartoon']))//if user click cartoon submit button
   {     
      $selected_product_sql = $all_product_sql." WHERE Type ='cartoon'"; //sql statement of selecting the record which type is cartoon
      if ( $result = mysqli_query($link, $selected_product_sql) ) { //checking error
         while( $row = mysqli_fetch_assoc($result) ){ //show the result on the page
            echo "<div class='row'>";
            echo "<img src='image/".$row['product_img_path']."'>";
            echo "<h4>".$row['product_name']."</h4>";
            echo "<h5>$".$row['product_price']."/pc</h5>";
            echo "</div>";
         }     
         mysqli_free_result($result); // release memory spaces
      } 
   }
   else if(isset($_POST['fruit'])) //if user click fruit submit button
   {     
      $selected_product_sql = $all_product_sql." WHERE Type ='fruit'"; //sql statement of selecting the record which type is fruit
      if ( $result = mysqli_query($link, $selected_product_sql) ) { //checking error
         while( $row = mysqli_fetch_assoc($result) ){ //show the result on the page
            echo "<div class='row'>";
            echo "<img src='image/".$row['product_img_path']."'>";
            echo "<h4>".$row['product_name']."</h4>";
            echo "<h5>$".$row['product_price']."/pc</h5>";
            echo "</div>";
         }     
         mysqli_free_result($result); // release memory spaces
      } 
   }
   else if(isset($_POST['chocolate'])) //if user click chocolate submit button
   {     
      $selected_product_sql = $all_product_sql." WHERE Type ='chocolate'"; //sql statement of selecting the record which type is chocolate
      if ( $result = mysqli_query($link, $selected_product_sql) ) { //checking error
         while( $row = mysqli_fetch_assoc($result) ){ //show the result on the page
            echo "<div class='row'>";
            echo "<img src='image/".$row['product_img_path']."'>";
            echo "<h4>".$row['product_name']."</h4>";
            echo "<h5>$".$row['product_price']."/pc</h5>";
            echo "</div>";
         }     
         mysqli_free_result($result); // release memory spaces
      } 
   }
   else if(isset($_POST['traditional'])) //if user click traditional submit button
   {     
      $selected_product_sql = $all_product_sql." WHERE Type ='traditional'"; //sql statement of selecting the record which type is traditional
      if ( $result = mysqli_query($link, $selected_product_sql) ) { //checking error
         while( $row = mysqli_fetch_assoc($result) ){ //show the result on the page
            echo "<div class='row'>";
            echo "<img src='image/".$row['product_img_path']."'>";
            echo "<h4>".$row['product_name']."</h4>";
            echo "<h5>$".$row['product_price']."/pc</h5>";
            echo "</div>";
         }     
         mysqli_free_result($result); // release memory spaces
      } 
   }
   else if(isset($_POST['wedding'])) //if user click wedding submit button
   {     
      $selected_product_sql = $all_product_sql." WHERE Type ='wedding'"; //sql statement of selecting the record which type is wedding
      if ( $result = mysqli_query($link, $selected_product_sql) ) { //checking error
         while( $row = mysqli_fetch_assoc($result) ){ //show the result on the page
            echo "<div class='row'>";
            echo "<img src='image/".$row['product_img_path']."'>";
            echo "<h4>".$row['product_name']."</h4>";
            echo "<h5>$".$row['product_price']."/pc</h5>";
            echo "</div>";
         }     
         mysqli_free_result($result); // release memory spaces
      } 
   }
   ?>
   
</body>
</html>