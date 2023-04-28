<!-- 
   Author: 
        php part: FONG IEK KIN BC000076
        data: 
        
   Program description: this page is used to display the product
-->
<?php
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
session_start();
?>

<!DOCTYPE html>

<head>
    <script src="product_text_search.js"></script>
    <link href="cart_and_detail.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
    <link rel="stylesheet" type="text/css" href="cart_and_detail.css">

    <div class="icon">
        <a href="logout.php"><img src="image/icon9.png" title="logout"></a>
        <a href="contact_us.php"><img src="image/icon3.png" title="message"></a>
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
    <div class="search">
        <img src="image/search.png" width="20px" ; height="17px" ;></a>
        <span style="color:#b7b08a;font-size:23px;">Quick search:&nbsp;&nbsp;</span>
        <input type="text" id="search_product" name="search_product" onkeyup="showSuggestion(this.value)">
    </div>
    <div class='product' id="search_result">
        <?php
        if ($result = mysqli_query($link, $all_product_sql)) { //checking error
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='row'>";
                echo "<a href='javascript:void(0);'>";
                echo "<img src='image/" . $row['product_img_path'] . "' onclick='modal(" . $row['product_id'] . ");'>";
                echo "<h4>" . $row['product_name'] . "</h4>";
                echo "<h5>$" . $row['product_price'] . "/pc</h5></a>";
                echo "</div>";
            }
            mysqli_free_result($result); // release memory spaces
        }
        ?>
    </div>
    <div id="light" class="pop_win">
        <a href="product.php" onclick="closeWin();" style="float: right;" class="fancybox-button fancybox-button--close">
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