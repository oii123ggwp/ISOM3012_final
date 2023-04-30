<!-- author: FONG IEK KIN -->
<div class="product">
<html>
<body>
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

$q = $_GET["q"];

if ($q === "") {
    if ( $result = mysqli_query($link, $all_product_sql) ) { //checking error
        while( $row = mysqli_fetch_assoc($result) ){ //get every record in the query result
            {
                //echo the HTML statment to show the result
                echo "<div class='row'>";
                echo "<a href='product_detail.php?product_id=".$row['product_id']."'>";
                echo "<img src='image/".$row['product_img_path']."'>";
                echo "<h4>".$row['product_name']."</h4></a>";
                echo "<h5>$".$row['product_price']."/pc</h5>";
                echo "</div>";
            }
        }   
        mysqli_free_result($result); // release memory spaces
    }    
}
?>
</body>
</html>