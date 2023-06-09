<!--    shopping_cart.php   -->

<!-- Authors: ZHENG BOWEN Owen. 
     PHP Modified by: FONG IEK KIN -->
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
            foreach ($array as $name => $value)//get the content of product cookie array
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
    <?php
    if(isset($_GET["error_shopping_cart"])){
        echo'<script>alert("'.$_GET['error_shopping_cart'].'")</script>';
    }
    $now_plus_two_days = strtotime("+3 days");

    ?>
</head>

<body>
    
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
    <form onsubmit="aler()" method="post" action = "inert_transaction_into_database.php">
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
                    <td colspan="7" style="text-align:center;"><br>You have no products added in your Shopping Cart<br></td>
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
                        <input class = "quan" type="number" id="<?=$product['product_id']?>" name = "<?=$product['product_id']?>" value="<?=$shopping_cart_quantity[$product['product_id']]?>" min="0" max="<?=$product['quantity_in_stock']?>" placeholder="Quantity" onchange = "change_total()" required><!---->
                    </td>
                    
                    <td class="deliver">
                        <input type="date" id="deliver_date"  name="deliver_date_<?=$product['product_id']?>" min="<?php echo date("Y-m-d", $now_plus_two_days) ?>" value = <?php echo date("Y-m-d", $now_plus_two_days) ?> required><!---->
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
        <div class="backbuttons">
            <input type="button" onclick="window.location = 'product.php'" value="Product Page" name="BackToProduct">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" onclick="window.location = 'search_product.php'" value="Search Product" name="BackToSearch">
        </div>
        <div class="buttons">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>
<!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- The Close Button -->
            <span class="close">&times;</span>
            <div id="thank-content">
                <!-- Modal Text -->
                <div class="thank-text" id="thank">
                    We have taken your order, thank you for your patronage!<br>
                    Please pay and collect the cakes in the shop on your selected date.
                </div>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the submit button 
                var button = document.getElementById("button");

                function thank() {
                    modal.style.display = "block";
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }


                // to disable select date before tomorrow
                var tomorrow = new Date(); //create a variable to store the Date object
                tomorrow.setDate(tomorrow.getDate() + 2);
                var dd = tomorrow.getDate(); //create a variable to store the day
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
                // difine var dates by classname 
                let dates = document.getElementsByClassName("deliver_date");
                // Loop through the NodeList
                for (var i = 0; i < dates.length; i++) {
                    // Set date only after tomorrow allowed with each element
                    dates[i].setAttribute("min", tomorrow);
                }




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