<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- set title -->
  <title>Contact us</title>
  </head>
  <div class="icon">  
  <a href=""><img src="image/icon9.png" title="logout"></a>
  <a href="contact_us.php"><img src="image/icon3.png" title="message" ></a>
  <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
  <a href="user.php"><img src="image/icon1.png" title="user"></a>
  <a href="menu.php"><img src="image/icon10.png" title="menu"></a>
  </div>
<br>
<center><span style="font-family:cursive;  font-size:40px; color:#5f391e">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Us<br></span></center><br>
<script language="Javascript">
MyBanners=newArray(image/Contact_us.png);
function ShowBanner(){
    document.ChangeBanner.src=MyBanners[banner];
}
</script>
<body onload="ShowBanner()">
<link rel="stylesheet" type="text/css" href="contact_us.css">

<center>
&nbsp;&nbsp;&nbsp;&nbsp;
<img src="image/contact_us.png" width="550" height="150" name="ChangeBanner"/>
</center><br>
<center>
<span style="font-family:system-ui; font-size:23px; color:#5f391e">We are Home Bakery!</span>
</center><br>
<center>
<span style="font-family:system-ui; font-size:23px; color:#5f391e">Thanks for reaching out, please leave your comments and we will reply you with below information!</span>
</center>
<form name="reg" onsubmit = "return formValidation();" method = "post"><br><br>
<center>
<span style="font-family:cursive; font-size:18px; color:#5f391e"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Name:</strong></span>
<input type="text" id="name" name="name" size="44"><br><br>
<span style="font-family:cursive; font-size:18px; color:#5f391e"><strong>&nbsp;&nbsp;&nbsp;Email:</strong></span>
<input type="text" id="email" name="email" size="44"><br><br>

<span style="font-family:cursive; font-size:18px; color:#5f391e;vertical-align: top;"><strong>Comments:</strong></span>

<textarea name="comment" rows="11" cols="40.5">Enter your comments here...</textarea><br>
<input class="send" type = "submit" name = "send" value = "send">
</center>
</form>
<script>
    function formValidation() {
    var name = document.reg.name;
    var email = document.reg.email;  //create a variable to store the user's email
    var comment = document.reg.comment;
    if (name_valid(name)) {
      if (email_valid(email)) {
        if (comment_valid(comment)) {
            alert("Upload successfully!");  
            }else{
              return false;
              }
                }else{
                  return false;
                  }
                   }else{
                    return false;
                    }
                  }
     function email_valid(email) { // function used to verify email
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (email.value.match(mailformat)) {//if the user input meet the format, return true
        return true;
      } else { //if not match, alert, focus and return false
        alert("Please enter an valid email address!");
        email.focus();
        return false;
      }
    }
    function comment_valid(comment) {// function used to verify comment
      if (!comment.value) { // if empty, alert and focus
        alert("Please input your comments!");
        comment.focus();
        return false;
      } else {
        return true;//otherwise, return true
      }
    }
    function name_valid(name) {// function used to verify name
      if (!name.value) { // if empty, alert and focus
        alert("Please input your name!");
        name.focus();
        return false;
      } else {
        return true;//otherwise, return true
      }
    }
</script>
</body>
</html>