<!DOCTYPE html>
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

<div  style="text-align:center;">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="image/logo.png" width=100px height=100px >
</div>

<div class="bar">
  <ul class="bar1">
    <li class="item">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="product.php">Products</a>
    </li>
    <li class="item">
      <a href="search_product.php">Search</a>
    </li>
    <li class="item">
      <a href="FAQ.php">FAQ</a>
    </li>
  </ul>
<br>
</div>

<div class="focus">
  </div>

  <footer id="footer">
  <div class="word">
    <br> &nbsp;&nbsp;&nbsp;&nbsp;Acceptable Eletronic Payment Method: 
    </div>

  <div class="icons">
  <img src="image/icon5.png" >
  <img src="image/icon7.png" >
  <img src="image/icon6.png" >
  <img src="image/icon8.png" >
  </div>

  <div class="copy">
    &copy; Copyright Home Bakery. All Rights Reserved.
    </div>


<div class="since">
    Since 2023
    </div><br>
  </footer>
