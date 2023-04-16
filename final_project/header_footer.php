<?php
function template_header($title)
{
    echo <<<EOT
<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
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
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                </nav>
                <div class="icon">
                <a href=""><img src="image/icon3.png" title="message" ></a>
                <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
                <a href=""><img src="image/icon1.png" title="user"></a>
                <?php
                
                echo "<a href='logout.php'><img src='image/icon9.png' title='logout'></a>";
                ?>
                </div>
            </div>
        </header>
EOT;
}
// Template footer
function template_footer()
{

    echo <<<EOT
        </main>
        </body>
        <footer id="footer">
            <div class="word">
            <br>&nbsp;&nbsp;&nbsp;&nbsp;Acceptable Eletronic Payment Method: 
            </div>
            <div class="icons">
                <img src="image/icon5.png" >
                <img src="image/icon7.png" >
                <img src="image/icon6.png" >
                <img src="image/icon8.png" >
            </div>
            <div class="copy">
                <p>&copy; Copyright Home Bakery. All Rights Reserved. </p>
                <p>Since 2023</p>
            </div>
        </footer>
</html>
EOT;
}
