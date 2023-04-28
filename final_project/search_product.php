<!-- 
   Author: 
        php part: FONG IEK KIN BC000076
        data: 
        
   Program description: this page is used to display the product
-->

<!DOCTYPE html>
<title>Search Product</title>
<?php 
session_start();
if(!isset($_SESSION["login_session"]))
{
  $_SESSION["login_session"] = false;
}
require "record_click.php";

// set up MySQL database connection 
$link = @mysqli_connect( 
   'localhost',  // MySQL host name 
   'root',       // user name 
   'A12345678',  // password
   'cakeshop')  // database name you want to connect 
   or die("Cannot open MySQL database connection!<br/>"); 
// die() after error message, won’t run any code below

$all_product_sql = "SELECT * FROM product";

if(isset($_GET['product_id'])){
   record_click($_GET['product_id']);
   header("Location: product_detail.php?product_id=".$_GET['product_id']);
}

?>
<body> 

<link rel="stylesheet" type="text/css" href="search_product.css">

<div class="icon">  
<?php     
if(!$_SESSION["login_session"])
  {
    echo "<a href='login.php'><img src='image/icon4.png' title='login'></a>";
  }
  else
  {
    echo "<a href='logout.php'><img src='image/icon9.png' title='logout'></a>";
  }
  ?>
  <a href="contact_us.php"><img src="image/icon3.png" title="message" ></a>
  <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
  <a href="user.php"><img src="image/icon1.png" title="user"></a>
  <a href="menu.php"><img src="image/icon10.png" title="menu"></a>
  </div>
<br><br>
<div style="text-align:center;">
<span style="font-family:cursive; font-size:40px; color:#75776b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Product Searching</span><br><br>
</div>
    <div class="box1">
        <div class="box">
            <img src="image/cake_banner2.jpg" alt="">
            <img src="image/cake_banner5.jpg" alt="">
            <img src="image/cake_banner1.jpg" alt="">
            <img src="image/cake_banner4.jpg" alt="">
            <img src="image/cake_banner3.jpg" alt="">
        </div>
    </div>

</body>
<div>
   <!--
      if user click one of the submit button, the page will show the product related to the submit name
   -->
   <form method = "post" action = "search_product.php">
   <input class="cartoon" type="submit" name="cartoon" value="Cartoon">&nbsp;
   <input class="fruit" type = "submit" name = "fruit" value = "Fruit">&nbsp;
   <input class="chocolate" type = "submit" name = "chocolate" value = "Chocolate">&nbsp;
   <input class="traditional" type = "submit" name = "traditional" value = "Traditional">&nbsp;
   <input class="wedding" type = "submit" name = "wedding" value = "Wedding">
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
            echo "<a href='search_product.php?product_id=".$row['product_id']."'>";
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
            echo "<a href='search_product.php?product_id=".$row['product_id']."'>";
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
            echo "<a href='search_product.php?product_id=".$row['product_id']."'>";
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
            echo "<a href='search_product.php?product_id=".$row['product_id']."'>";
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
            echo "<a href='search_product.php?product_id=".$row['product_id']."'>";
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