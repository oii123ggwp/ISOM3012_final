<!DOCTYPE html>
<?php session_start();?>
<body> 
<link rel="stylesheet" type="text/css" href="menu.css">

<div class="icon">
  <a href=""><img src="image/icon3.png" title="message" ></a>
  <a href=""><img src="image/icon2.png" title="shopping cart"></a>
  <a href=""><img src="image/icon1.png" title="user"></a>
  <?php
  if(!$_SESSION["login_session"])
  {
    echo "<a href='login.php'><img src='image/icon4.png' title='login'></a>";
  }
  else
  {
    echo "<a href='logout.php'><img src='image/icon9.png' title='logout'></a>";
  }
  ?>
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
      <a href="">Search</a>
    </li>
    <li class="item">
      <a href="">FAQ</a>
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
