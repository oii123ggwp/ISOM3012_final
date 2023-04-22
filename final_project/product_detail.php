<?php
// Path: final_project\product_detail.php
// author: ZHENG BO WEN  Owen  BC005351

session_start();
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

include 'header_footer.php';

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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>product_detail</title>
    <link href="cart_and_detail.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <header>
        <div class="content-wrapper">
            <div class="logo">
                <img src="image/logo.png" width=100px height=100px>
            </div>
            <h1>Home Bakery</h1>
            <nav>
                <a href="menu.php">Home</a>
                <a href="product.php">Products</a>
            </nav>
            <div class="icon">
                <a href=""><img src="image/icon3.png" title="message"></a>
                <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
                <a href=""><img src="image/icon1.png" title="user"></a>
                <?php
                if (!$_SESSION["login_session"]) {
                    echo "<a href='login.php'><img src='image/icon4.png' title='login'></a>";
                } else {
                    echo "<a href='logout.php'><img src='image/icon9.png' title='logout'></a>";
                }
                ?>
            </div>

        </div>
    </header>
    <main class="detail" style="background:url(image/back4.png);background-repeat:no-repeat; background-size:cover;">
        <div class="product content-wrapper">
    
            <img id="proImg" src="image/<?= $product['product_img_path2'] ?>" width="500" height="500" alt="<?= $product['product_name'] ?>">
            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- The Close Button -->
                <span class="close">&times;</span>
                <!-- Modal Content (The Image) -->
                <img class="modal-content" id="img01">
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
            <div>
                <h1 class="name"><?= $product['product_name'] ?></h1>
                <span class="price">
                    &dollar;<?= $product['product_price'] ?>
                </span>
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
        <?= template_footer() ?>