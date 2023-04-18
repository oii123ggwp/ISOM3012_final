<!-- author:fongiekkin
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

$All_product_stm = $pdo->query("SELECT * FROM product");
$result_rows = $All_product_stm->fetchAll(PDO::FETCH_ASSOC);

if ( isset($_POST["product_id"]) ) {

    $P_id = $_POST["product_id"]; // get session variables
    $quantity = $_POST["quantity"];
    $same_id = false;

    foreach($_COOKIE as $id => $value)
    {
        if ($id == $P_id)
        {
            $same_id = true;
        }
    }

    if($same_id == true)
    {
        $old_quantity = $_COOKIE[$P_id]["quantity"];
        foreach($result_rows as $record)
        {
            if($record["product_id"] == $P_id && $record["quantity_in_stock"] >= ($quantity + $old_quantity))
            {
                setcookie($P_id."[product_id]", $P_id, time()+86400*15, "/");
                setcookie($P_id."[quantity]", $quantity + $old_quantity, time()+86400*15,"/");
            }
            else if($record["product_id"] == $P_id && $record["quantity_in_stock"] < ($quantity + $old_quantity))
            {
                setcookie($P_id."[product_id]", $P_id, time()+86400*15, "/");
                setcookie($P_id."[quantity]", $record["quantity_in_stock"], time()+86400*15,"/");
            }
            else
            {
                echo "error";
            }
        }
    }
    else
    {
        // save selected product info into Cookie array
        setcookie($P_id."[product_id]", $P_id, time()+86400*30, "/");
        setcookie($P_id."[quantity]", $quantity, time()+86400*30,"/");
    }
}

header("Location: shopping_cart.php");  // forward to shopping_cart.php
?>