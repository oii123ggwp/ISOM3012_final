<!--    
this page is used to display the product detail from search page

modified from search_product.php & product_detail.php 
        by ZHENG BO WEN Owen BC005351
-->

<!DOCTYPE html>
<title>Search Product Detail</title>
<?php
session_start();
if (!isset($_SESSION["login_session"])) {
   $_SESSION["login_session"] = false;
}
require "record_click.php";

// set up MySQL database connection 
$link = @mysqli_connect(
   'localhost',  // MySQL host name 
   'root',       // user name 
   'A12345678',  // password
   'cakeshop'
)  // database name you want to connect 
   or die("Cannot open MySQL database connection!<br/>");
// die() after error message, won’t run any code below

$all_product_sql = "SELECT * FROM product";

?>
<head>
<script src="product_text_search.js"></script>
    <link href="cart_and_detail.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="search_product.css">
    <script type="text/javascript">
        function popWin() {
            document.getElementById('light').style.display = 'block';
            document.getElementById('fade').style.display = 'block';
        }

        function closeWin() {
            document.getElementById('light').style.display = 'none';
            document.getElementById('fade').style.display = 'none';
        }
    </script>
</head>
<body onload="popWin();">


   <div class="icon">
      <?php
      if (!$_SESSION["login_session"]) {
         echo "<a href='login.php'><img src='image/icon4.png' title='login'></a>";
      } else {
         echo "<a href='logout.php'><img src='image/icon9.png' title='logout'></a>";
      }
      ?>
      <a href="contact_us.php"><img src="image/icon3.png" title="message"></a>
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

   <div>
      <!--
      if user click one of the submit button, the page will show the product related to the submit name
   -->
      <form method="post" action="search_product.php">
         <input class="cartoon" type="submit" name="cartoon" value="Cartoon">&nbsp;
         <input class="fruit" type="submit" name="fruit" value="Fruit">&nbsp;
         <input class="chocolate" type="submit" name="chocolate" value="Chocolate">&nbsp;
         <input class="traditional" type="submit" name="traditional" value="Traditional">&nbsp;
         <input class="wedding" type="submit" name="wedding" value="Wedding">
      </form>
   </div>
   <div class="product">
      <?php
      if ($_GET['product_type']=='cartoon') //if user click cartoon submit button
      {
         $selected_product_sql = $all_product_sql . " WHERE Type ='cartoon'"; //sql statement of selecting the record which type is cartoon
         if ($result = mysqli_query($link, $selected_product_sql)) { //checking error
            while ($row = mysqli_fetch_assoc($result)) { //show the result on the page
               echo "<div class='row0'>";
               echo "<a href='javascript:void(0);'>";
               echo "<img src='image/" . $row['product_img_path'] . "'>";
               echo "<h4>" . $row['product_name'] . "</h4>";
               echo "<h5>$" . $row['product_price'] . "/pc</h5></a>";
               echo "</div>";
            }
            mysqli_free_result($result); // release memory spaces
         }
      } else if ($_GET['product_type']=='fruit') //if user click fruit submit button
      {
         $selected_product_sql = $all_product_sql . " WHERE Type ='fruit'"; //sql statement of selecting the record which type is fruit
         if ($result = mysqli_query($link, $selected_product_sql)) { //checking error
            while ($row = mysqli_fetch_assoc($result)) { //show the result on the page
               echo "<div class='row0'>";
               echo "<a href='javascript:void(0);'>";
               echo "<img src='image/" . $row['product_img_path'] . "'>";
               echo "<h4>" . $row['product_name'] . "</h4>";
               echo "<h5>$" . $row['product_price'] . "/pc</h5>";
               echo "</div>";
            }
            mysqli_free_result($result); // release memory spaces
         }
      } else if ($_GET['product_type']=='chocolate') //if user click chocolate submit button
      {
         $selected_product_sql = $all_product_sql . " WHERE Type ='chocolate'"; //sql statement of selecting the record which type is chocolate
         if ($result = mysqli_query($link, $selected_product_sql)) { //checking error
            while ($row = mysqli_fetch_assoc($result)) { //show the result on the page
               echo "<div class='row0'>";
               echo "<a href='javascript:void(0);'>";
               echo "<img src='image/" . $row['product_img_path'] . "'>";
               echo "<h4>" . $row['product_name'] . "</h4>";
               echo "<h5>$" . $row['product_price'] . "/pc</h5>";
               echo "</div>";
            }
            mysqli_free_result($result); // release memory spaces
         }
      } else if ($_GET['product_type']=='traditional') //if user click traditional submit button
      {
         $selected_product_sql = $all_product_sql . " WHERE Type ='traditional'"; //sql statement of selecting the record which type is traditional
         if ($result = mysqli_query($link, $selected_product_sql)) { //checking error
            while ($row = mysqli_fetch_assoc($result)) { //show the result on the page
               echo "<div class='row0'>";
               echo "<a href='javascript:void(0);'>";
               echo "<img src='image/" . $row['product_img_path'] . "'>";
               echo "<h4>" . $row['product_name'] . "</h4>";
               echo "<h5>$" . $row['product_price'] . "/pc</h5>";
               echo "</div>";
            }
            mysqli_free_result($result); // release memory spaces
         }
      } else if ($_GET['product_type']=='wedding') //if user click wedding submit button
      {
         $selected_product_sql = $all_product_sql . " WHERE Type ='wedding'"; //sql statement of selecting the record which type is wedding
         if ($result = mysqli_query($link, $selected_product_sql)) { //checking error
            while ($row = mysqli_fetch_assoc($result)) { //show the result on the page
               echo "<div class='row0'>";
               echo "<a href='javascript:void(0);'>";
               echo "<img src='image/" . $row['product_img_path'] . "'>";
               echo "<h4>" . $row['product_name'] . "</h4>";
               echo "<h5>$" . $row['product_price'] . "/pc</h5>";
               echo "</div>";
            }
            mysqli_free_result($result); // release memory spaces
         }
      }
      ?>
   </div>
   <div id="light" class="pop_win">
        <a href="search_product.php" onclick="closeWin();" style="float: right;" class="fancybox-button fancybox-button--close">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"></path>
            </svg>
        </a>


        <!--      
        PDO & JS & modal  
        Author:     ZHENG BO WEN  Owen  BC005351
    
-->
        <?php
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = 'A12345678';
        $DATABASE_NAME = 'cakeshop';
        try {
            $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }


        // Check to make sure the id parameter is specified in the URL
        if (isset($_GET['product_id'])) {
            // Prepare statement and execute, prevents SQL injection
            $stmt = $pdo->prepare('SELECT * FROM product WHERE product_id = ?');
            $stmt->execute([$_GET['product_id']]);
            // Fetch the product from the database and return the result as an Array
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            // Check if the product exists (array is not empty)
            if (!$product) {
                // Simple error to display if the id for the product doesn't exists (array is empty)
                exit('Product does not exist!');
            }
        } else {
            // Simple error to display if the id wasn't specified
            exit('Product does not exist!');
        }
        ?>

        <main class="detail" style="background:url(image/back7.jpg);background-repeat:no-repeat; background-size:cover;">
            <div class="product content-wrapper">

                <img id="proImg" src="image/<?= $product['product_img_path2'] ?>" width="460" height="460" alt="<?= $product['product_name'] ?>">
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- The Close Button -->
                    <span class="close">&times;</span>
                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="img01">
                    <!-- Modal Caption (Image Text) -->
                    <div id="caption"></div>
                </div>
                <div id='infor'>
                    <h1 class="name"><?= $product['product_name'] ?></h1>
                    <span class="price">
                        &dollar;<?= $product['product_price'] ?>
                    </span>
                    <span class="stock"> 1.5lb(680g)/pc 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $product['quantity_in_stock'] ?> in stock
                        <br>(can only be ordered 2 days ahead)</span>
                    <form action="create_shopping_cookie.php" method="post">
                        <input type="number" name="quantity" value="1" min="1" max="<?= $product['quantity_in_stock'] ?>" placeholder="Quantity" required>
                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                        <input type="submit" value="Add To Cart">
                    </form>
                    <div class="description">
                        <?= $product['product_description'] ?>
                    </div>
                </div>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("proImg");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function() {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }
            </script>
        </main>
    </div>
    <div id="fade" class="black_overlay">
    </div>
</body>

</html>