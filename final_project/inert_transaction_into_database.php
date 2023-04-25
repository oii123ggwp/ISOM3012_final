<!--Author: FONG IEK KIN-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<?php
session_start();
$P_id = "";
$quan = "";
$date = "";
$T_id = "";
$user_id = "";
$price = "";
$payment = "";

$P_id_list = array();
$quan_list = array();
$date_list = array();


$link = mysqli_connect("localhost","root",
                            "A12345678","cakeshop")
    or die("Cannot open MySQL database connection!<br/>");


foreach($_POST as $name => $value)
{

    if (strpos($name, "P") === 0)
    {
        array_push($P_id_list, $name);
        array_push($quan_list, $value);
    }
    else if (strpos($value, "-") === 4)
    {
        array_push($date_list, $value);
    }

}


for($i = 0; $i < count($P_id_list);$i++){

$get_all_T_reocrd_sql = "";

$P_id = $P_id_list[$i];
$quan = $quan_list[$i];
$date = $date_list[$i];

$get_all_T_reocrd_sql = "SELECT * FROM transaction";
$T_records = mysqli_query($link, $get_all_T_reocrd_sql);
$total_records = mysqli_num_rows($T_records);
$T_id = "T".$total_records;
mysqli_free_result($T_records); // release memory spaces

$user_id = $_SESSION["user_id"];

$payment_method = "unset";

$get_product_sql = "SELECT * FROM product WHERE product_id = '".$P_id."'";

$P_records = mysqli_query($link, $get_product_sql);
while( $row = mysqli_fetch_assoc($P_records) )
{
    $price = $row['product_price'];
}

$payment = $price * $quan;

$order_time = date("Y-m-d");

$status = "NULL";

$insert_T_sql = "INSERT INTO transaction (transaction_id, user_id, product_id, payment_method, quantity, total_payment_amount, order_time, finish_time, status) VALUES (?,?,?,?,?,?,?,?,?)";

      $add_stmt = $link->prepare($insert_T_sql);

      $add_stmt->bind_param("ssssissss",$T_id,$user_id,$P_id,$payment_method,$quan,$payment,$order_time,$date,$status);

      $add_stmt->execute();

      $add_stmt->close();
}

$link->close();


?>
</body>
</html>