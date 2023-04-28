<!--Author: FONG IEK KIN-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["login_session"]))
{
  $_SESSION["login_session"] = false;
}

if($_SESSION["login_session"])
{
    $error_msg = "";

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

    $P_id_OK = false;
    $P_quan_OK = false;


    $link = mysqli_connect("localhost","root",  
                            "A12345678","cakeshop")
    or die("Cannot open MySQL database connection!<br/>");


    foreach($_POST as $name => $value){
        if (strpos($name, "P") === 0){
            array_push($P_id_list, $name);
            array_push($quan_list, $value);
        }
        else if (strpos($value, "-") === 4)
        {
            array_push($date_list, $value);
        }
    }

    for($i = 0; $i < count($P_id_list);$i++){
        $P_id = $P_id_list[$i];
        $quan = $quan_list[$i];
        $date = $date_list[$i];

        $get_product_sql = "SELECT * FROM product WHERE product_id = '".$P_id."'";  
        $P_records = mysqli_query($link, $get_product_sql);

        $total_records = mysqli_num_rows($P_records);

        while($row = mysqli_fetch_assoc($P_records))
        {   
            if ( $total_records > 1 ) 
            {
                $P_id_OK = false;
            break;
            }
            else
            {
                $P_id_OK = true;
                $price = $row['product_price'];
                $quan_instock = $row['quantity_in_stock'];
                if($quan_instock < $quan)
                {
                    $P_quan_OK = false;
                    break;
                }
                else
                {
                    $P_quan_OK = true;
                }
            }
        }
    }

    if ( $P_id_OK == true &&  $P_quan_OK == true) {
        for($i = 0; $i < count($P_id_list);$i++)
        {
            $get_all_T_reocrd_sql = "";

            $P_id = $P_id_list[$i];
            $quan = $quan_list[$i];
            $date = $date_list[$i];

          $get_all_T_reocrd_sql = "SELECT * FROM transaction";
          $T_records = mysqli_query($link, $get_all_T_reocrd_sql);
          $total_records = mysqli_num_rows($T_records);
          $T_id = "T".$total_records;
           mysqli_free_result($T_records); // release memory spaces

           $get_product_sql = "SELECT * FROM product WHERE product_id = '".$P_id."'";  
            $P_records = mysqli_query($link, $get_product_sql);

            while($row = mysqli_fetch_assoc($P_records))
            {   
            $price = $row['product_price'];
                $quan_instock = $row['quantity_in_stock'];
           }

            // check if product ID matched with database and if there only one product ID
            $user_id = $_SESSION["user_id"];

            $payment_method = "unset";


            $payment = $price * $quan;

            $order_time = date("Y-m-d");

            $finish_time = NULL;

            $status = "unfihished";

            $new_quan = $quan_instock - $quan;

            $insert_T_sql = "INSERT INTO transaction (transaction_id, user_id, product_id, payment_method, quantity, total_payment_amount, order_time, expected_finish_time, finish_time, status) VALUES (UUID(),?,?,?,?,?,?,?,?,?)";

            $add_stmt = $link->prepare($insert_T_sql);

            $add_stmt->bind_param("sssisssss",$user_id,$P_id,$payment_method,$quan,$payment,$order_time,$date,$finish_time,$status);

            $add_stmt->execute();

            $add_stmt->close();

            $change_P_quan_sql = "UPDATE product SET quantity_in_stock = ? WHERE product_id = '".$P_id."'";

            $update_stmt = $link->prepare($change_P_quan_sql);

            $update_stmt->bind_param("i", $new_quan);

            $update_stmt->execute();

            $update_stmt->close();

            setcookie($P_id."[product_id]", 0, time()-86400*30, "/");
            setcookie($P_id."[quantity]", 0, time()-86400*30,"/");
        }
        $link->close();
        header("Location: purchase_successful.php");
    }
    else
    {
        if($P_id_OK == false){
            $error_msg = "Product Id is not match!";
            header("Location: purchase_unsuccessful.php");
        }
        else{
            if($P_quan_OK == true){
                $error_msg = "Product you selected is out of stock!";
                header("Location: purchase_unsuccessful.php");
            }
        }
        
    }
}
else
{
    $error_msg = "Before you login, you can't make purchase!";
    header("Location: shopping_cart.php?error_shopping_cart=".$error_msg);
}
?>
</body>
</html>