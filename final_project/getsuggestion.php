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

if ($q !== "") {
    $have_result = false;
    $q = strtoupper($q);
    $len = strlen($q);
    if ( $result = mysqli_query($link, $all_product_sql) ) { //checking error
        while( $row = mysqli_fetch_assoc($result) ){ 
            if (stristr ($q, substr($row['product_name'],0,$len)))
            {
                echo "<div class='row'>";
                echo "<a href='product_detail.php?product_id=".$row['product_id']."'>";
                echo "<img src='image/".$row['product_img_path']."'>";
                echo "<h4>".$row['product_name']."</h4></a>";
                echo "<h5>$".$row['product_price']."/pc</h5>";
                echo "</div>";
                $have_result = true;
            }
        }
        if ($have_result == false){
            echo"<span style='color:#d87493; font-size:40px; text-align:center'>No product match!</span>";
        }    
        mysqli_free_result($result); // release memory spaces
    }    
}

?>
</body>
</html>