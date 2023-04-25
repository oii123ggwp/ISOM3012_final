<!--
    Author: FONG IEK KIN BC000076
    Program description: This program is used to create user account based on the input data in database and create user cookie
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

$password = $_POST["pass"];
$hash = password_hash($password, PASSWORD_DEFAULT);

//create a string about a sql statement which is used to insert a user record
    $insert_sql = "INSERT INTO user (user_id, password, person_name, birthday, gender, email, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $add_stmt = $link->prepare($insert_sql);
    $add_stmt->bind_param("sssssss",$_POST["user"],$hash,$_POST["name"],$_POST["birthday"],$_POST["gender"],$_POST["email"],$_POST["phone_number"]);

    $add_stmt->execute();

    $add_stmt->close();
    $link->close();

    

    header("Location: menu.php")
?>