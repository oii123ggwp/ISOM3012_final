<!-- 
   Author: 
        php part: FONG IEK KIN BC000076
        UI:
   Program description: this page is used to allow user to log in their account
-->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>login.php</title>
</head>
<body>
<?php
session_start();
$user_id = "";  $password = "";
$error_msg = "";
// obtain form data
if ( isset($_POST["user_id"]) )
   $user_id = $_POST["user_id"];

if ( isset($_POST["Password"]) )
   $password = $_POST["Password"];
// check if user filled in username and password
if ($user_id != "" && $password != "") {
   // connect to database
   $link = mysqli_connect("localhost","root",
                          "A12345678","cakeshop")
        or die("Cannot open MySQL database connection!<br/>");

   mysqli_query($link, 'SET NAMES utf8'); 
   // define sql string
   $sql = "SELECT * FROM user WHERE ";
   $sql.= "user_id='".$user_id."'";
   // execute SQL command
   $result = mysqli_query($link, $sql);
   $total_records = mysqli_num_rows($result);
   // check if login data matched with database
   if ( $total_records > 0 ) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])){
      // if matched, specify session variable login_session as true
        $_SESSION["login_session"] = true;
        $_SESSION["user_id"] = $user_id;
        header("Location: menu.php");
      }
      else
      {
        $error_msg = "wrong user password!<br/>";
        $_SESSION["login_session"] = false;
      }
   } else {  // login fails
      $error_msg = "<center><font color='red'>wrong user name!<br/></font>";

      $_SESSION["login_session"] = false;
   }
   mysqli_close($link);    
}
?>
<body> 
<link rel="stylesheet" type="text/css" href="login.css">

<div class="icon">  
<a href="contact_us.php"><img src="image/icon3.png" title="message" ></a>
  <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
  <a href="user.php"><img src="image/icon1.png" title="user"></a>
  <a href="menu.php"><img src="image/icon10.png" title="menu"></a>
  </div>


<div class="box">
   <br><br>
   <div class="left"></div>
   
   <div class="right">
    <h4>Login</h4>
    <form action="login.php" method="post">
    <?php echo $error_msg ?>
    <input class="account" type="text" placeholder="Username"  name="user_id" value = <?php echo $user_id?>>
    <input class="account" type="password" placeholder="Password" name="Password">
    <input class="Login" type="submit" value="Login">
    </form>
    <div class="link">
    <a href="register.php">Register</a>
    <div class="logo">
   <img src="image/logo.png"  ></div>
    </div>
</div>
</div>









