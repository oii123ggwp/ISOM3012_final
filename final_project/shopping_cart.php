<!--    shopping_cart.php   -->

<!-- Author: ZHENG BOWEN Owen -->
<?php
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

$All_product_stm = $pdo->query("SELECT * FROM product");//query the result
$result_rows = $All_product_stm->fetchAll(PDO::FETCH_ASSOC);//convert the result into associative array

$shopping_cart_products = array();//a array which store the record of product which is in the shopping cart
$shopping_cart_quantity = array();//a array which store the quantity of product which is in the shopping cart
$_SESSION['total'] = 0.00;

foreach($result_rows as $record)//get one record from the result
{
    $product_exist = false;//a varible store the condition of if product exist
    $count = 0;//count how many times run, reset if new record arrive
    foreach ($_COOKIE as $id => $array)//get every cookie
    {
        if($id == $record['product_id'])//check if the cookie name related to product id
        {
            foreach ($array  as $name => $value)//get the content of product cookie array
            {
                if($value == $record['product_id'])//check if there is product id exist
                {
                    array_push($shopping_cart_products, $record);//add the exist record which related the seleceted product id
                    $product_exist = true;//product exist
                }
                if($name == "quantity" && $product_exist && $count < 1)//only the product exist , 
                                                                       //first time run this if statment 
                                                                       //and cookie data is about quantity of product                                                                                                                                              
                {
                    $shopping_cart_quantity[$record['product_id']] = $value;//add the quantity into array which is associative array
                    $count++;//count increase one
                }
            }
        }
    }
}



?>

<?php include 'header_footer.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>shopping_cart</title>
    <link href="cart_and_detail.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
    <!--
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
                /*if (isset($_SESSION['user_id'])) {
                    echo "<a href='login.php'><img src='image/icon4.png' title='login'></a>";
                }else
                {
                  echo "<a href='logout.php'><img src='image/icon9.png' title='logout'></a>";
                }
                */    
                ?>
            </div>
        </div>
    </header>
            -->
<main class="shoppingcart">

<div class="icon1">  
<a href=""><img src="image/icon9.png" title="logout"></a>
  <a href="contact_us.php"><img src="image/icon3.png" title="message" ></a>
  <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
  <a href="user.php"><img src="image/icon1.png" title="user"></a>
  <a href="menu.php"><img src="image/icon10.png" title="menu"></a>
  </div>

<div class="cart content-wrapper">
    <br>
    <h1>Shopping Cart</h1>
    <form onsubmit="aler()" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Date</td>
                    <td>Special Requirment</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($shopping_cart_products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($shopping_cart_products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="product_detail.php?product_id=<?=$product['product_id']?>">
                            <img src="image/<?=$product['product_img_path']?>" width="75" height="75" alt="<?=$product['product_name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="product_detail.php?product_id=<?=$product['product_id']?>" class="to_product"><?=$product['product_name']?></a>
                        <br>
                        <a href="remove_shopping_cart_cookie.php?remove=<?=$product['product_id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$product['product_price']?></td>
                    <td class="quantity">
                        <input class = "quan" type="number" id="<?=$product['product_id']?>" value="<?=$shopping_cart_quantity[$product['product_id']]?>" min="1" max="<?=$product['quantity_in_stock']?>" placeholder="Quantity" onchange = "change_total()" required>
                    </td>
                    
                    <td class="deliver">
                        <input type="date" id="deliver_date" name="deliver_date" min="2020-01-01" required>
                    </td>
                    <td class="requirement">
                        <input class="req" type="text">
                    </td>
                    <td class="subtotal" id="price-<?=$product['product_id']?>">&dollar;<?=$product['product_price'] * $shopping_cart_quantity[$product['product_id']]?></td>
                </tr>
                <?php
                    $_SESSION['total'] += $product['product_price'] * $shopping_cart_quantity[$product['product_id']];            
                    endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Total</span>
            <span class="total" id = "total">&dollar;<?=$_SESSION['total']?></span>
       <!--  </div>
        
            
           
            <input type="time" id="deliver_time" name="deliver_time" min="10:00" max="20:00" required/>
            <span class="validity"></span>
            <span class="text"> (10:00-20:00)</span>
               
        </div> -->
        <div class="buttons">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>
<script>

    function aler(){
        alert("We have taken your order, thank you for your patronage! Please pay and collect the cakes at the shop on your selected dates.");      
    }
    /*
    // to disable select date before tomorrow
    var tomorrow = new Date();//create a variable to store the Date object
    var dd = tomorrow.getDate() + 1; //create a variable to store the day
    var mm = tomorrow.getMonth() + 1; //create a variable to store the month
    var yyyy = tomorrow.getFullYear(); //create a variable to store the year
    if (dd < 10) { 
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    //set the date format
    tomorrow = yyyy + '-' + mm + '-' + dd;
    // here shows that date before tomorrow not allowed
    document.getElementById("deliver_date").setAttribute("min", tomorrow);
    */




    // Function Author: fong iek kin
    function change_total()//to change subtotal and total in shopping cart if the quantity is changed
    {
        iprice = document.getElementsByClassName("price");
        iquantity = document.getElementsByClassName("quan");
        isubtotal = document.getElementsByClassName("subtotal");
        itotal = document.getElementById("total");

        total_result = 0;//reset the value

        for(i=0;i<iprice.length;i++)
        {
            price = iprice[i].innerText
            quantity = iquantity[i].value
            price = price.substring(1);

            result = +price * +quantity
            total_result += result

            isubtotal[i].innerText = "$"+result;
        }
        itotal.innerText = "$"+total_result
    }
</script>
</main>
</body>
</html>