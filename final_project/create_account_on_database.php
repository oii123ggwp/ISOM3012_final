<!--
    Author: FONG IEK KIN BC000076
    Program description: This program is used to create user account based on the input data in database
-->
<?php
//Start the session

// set up MySQL database connection 
$link = @mysqli_connect( 
    'localhost',  // MySQL host name 
    'root',       // user name 
    'A12345678',  // password
    'cakeshop')  // database name you want to connect 
    or die("Cannot open MySQL database connection!<br/>"); 
// die() after error message, won’t run any code below


//create a string about a sql statement which is used to insert a user record
    $insert_sql = "INSERT INTO user ";
    $insert_sql.= "(user_id, password, person_name, birthday, gender, country, address, email, phone_number)";
    $insert_sql.= "VALUES ('";
    $insert_sql.=$_POST["user"]."','".$_POST["pass"]."','";
    $insert_sql.=$_POST["name"]."','".$_POST["birthday"]."','";
    $insert_sql.=$_POST["gender"]."','".$_POST["country"]."','";
    $insert_sql.=$_POST["address"]."','".$_POST["email"]."','";
    $insert_sql.=$_POST["phone_number"]."')";
    echo $insert_sql;

if ( mysqli_query($link, $insert_sql) ) {// run SQL statement
    echo "done";
    mysqli_close($link);  
    //header("Location:");
}
 else{
    die("fail to add user record into database!");
 }

?>