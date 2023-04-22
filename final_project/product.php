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
<head>
   <script src = "product_text_search.js"></script>
</head>
<body> 
<link rel="stylesheet" type="text/css" href="product.css">

<div class="icon">  
  <a href=""><img src="image/icon9.png" title="logout"></a>
  <a href="contact_us.php"><img src="image/icon3.png" title="message" ></a>
  <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
  <a href="user.php"><img src="image/icon1.png" title="user"></a>
  <a href="menu.php"><img src="image/icon10.png" title="menu"></a>
  </div>

<div style="text-align:center;"><br><br>
<span style="font-family:cursive;color:#A69B84;font-size:40px;">OUR PRODUCT<br></span>
</div>

<div class="pic">
<br>
<img src="image/cake3.jpg">
</div>
<div class = "search">
   <img src="image/search.png" width="20px"; height="17px";></a>
   <span style="color:#b7b08a;font-size:23px;">Quick search:&nbsp;&nbsp;</span>
   <input type = "text" id = "search_product"  name = "search_product" onkeyup ="showSuggestion(this.value)">
</div>
<div class='product' id = "search_result">
   <?php
       if ( $result = mysqli_query($link, $all_product_sql) ) { //checking error
         while( $row = mysqli_fetch_assoc($result) ){ 
                 echo "<div class='row'>";
                 echo "<a href='product_detail.php?product_id=".$row['product_id']."'>";
                 echo "<img src='image/".$row['product_img_path']."'>";
                 echo "<h4>".$row['product_name']."</h4></a>";
                 echo "<h5>$".$row['product_price']."/pc</h5>";
                 echo "</div>";
         }     
         mysqli_free_result($result); // release memory spaces
     }    
   ?>
</div>
</body>
</html>