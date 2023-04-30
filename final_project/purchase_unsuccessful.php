<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Purchase Unsuccessful</title>
    <link rel="stylesheet" type="text/css" href="purchase_unsuccessful.css">
</head>
<?php session_start();
if(!isset($_SESSION["login_session"]))
{
  $_SESSION["login_session"] = false;
}
?>
<body> 
<link rel="stylesheet" type="text/css" href="menu.css">

<div class="icon">
<?php
//check if there is a user login. There will be different image wiht a href showing on the page.
  if(!$_SESSION["login_session"])
  {
    echo "<a href='login.php'><img src='image/icon4.png' title='login'></a>";
  }
  else
  {
    echo "<a href='logout.php'><img src='image/icon9.png' title='logout'></a>";
  }
  ?>
  <a href="contact_us.php"><img src="image/icon3.png" title="message" ></a>
  <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
  <a href="user.php"><img src="image/icon1.png" title="user"></a>
  <a href="menu.php"><img src="image/icon10.png" title="menu"></a>

  </div>
  

    <div class="wavy">
        <!-- --i是自定义属性，可通过var函数调用 -->
        <span style="--i:1;">P</span>
        <span style="--i:2;">u</span>
        <span style="--i:3;">r</span>
        <span style="--i:4;">c</span>
        <span style="--i:5;">h</span>
        <span style="--i:6;">a</span>
        <span style="--i:7;">s</span>
        <span style="--i:8;">e&nbsp;</span>
        <span style="--i:9;">u</span>
        <span style="--i:10;">n</span>
        <span style="--i:11;">s</span>
        <span style="--i:12;">u</span>
        <span style="--i:13;">c</span>
        <span style="--i:14;">c</span>
        <span style="--i:15;">e</span>
        <span style="--i:16;">s</span>
        <span style="--i:17;">s</span>
        <span style="--i:18;">f</span>
        <span style="--i:19;">u</span>
        <span style="--i:20;">l</span>
        <span style="--i:21;">l</span>
        <span style="--i:22;">y</span>
        <span style="--i:23;">!</span><br><br><br><br><br><br><br>
        <span style="--i:24;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;☹</span>
    </div>
</body>
</html>