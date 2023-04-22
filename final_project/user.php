<!DOCTYPE html>
<body> 
<link rel="stylesheet" type="text/css" href="user.css">
<form name="reg" onsubmit = "return formValidation();" method = "post" action = "">

<div class="icon">  
  <a href=""><img src="image/icon9.png" title="logout"></a>
  <a href="contact_us.php"><img src="image/icon3.png" title="message" ></a>
  <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
  <a href="user.php"><img src="image/icon1.png" title="user"></a>
  <a href="menu.php"><img src="image/icon10.png" title="menu"></a>
  </div>

<div class="box">
  <div class="empty"></div>
   <div class="user"><h4><br>User Information</h4></div>
   
   <div class="infor">
    <form>
    Username:&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="user" name="user" size="20" ><br><br>
    Password:&ensp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" id="pass" name="pass" size="23"><p style="line-height: 0.4; font-size:x-small;font-weight:300;color:#efa238;">(at least 1 number, 1 Uppercase letter and 1 lowercase letter)</p><br>

    Password confirmation:&thinsp;&thinsp;&thinsp;
    <input type="password" id="passcon" name="passcon" size="23"><br><br>
    Name:&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="name" name="name" size="18" ><br><br>
    Birthday:&ensp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="birthday" name="birthday" type="date"  max="1111-13-13"><br><br>
    Gender:&thinsp;&thinsp;&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="gender" value="Male"><span>Male</span>
    <input type="radio" name="gender" value="Female"><span>Female</span><br><br>
    Phone number:&ensp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="phone_number" name="phone_number" size="20"><br><br>
    Email:&thinsp;&thinsp;&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="email" name="email" size="28"><br><br>
    </div>
    <input class="modify" type="submit" name="submit" type="submit" value="Modify"><input class="cancel" type="submit" name="submit" type="submit" value="Cancel">
    </form>
    
    
</div>
</div>
</form>