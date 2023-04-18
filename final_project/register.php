<!---php part: FONG IEK KIN-->
<!DOCTYPE html>
<body> 
<link rel="stylesheet" type="text/css" href="register.css">
<!DOCTYPE html>
<html>
<?php
session_start();
$user_id = "";
$error_msg = "";

if(isset($_POST['submit'])){
// obtain form data
  if ( isset($_POST["user"]) )
    $user_id = $_POST["user"];

// check if user filled in username and password
  if ($user_id != "") {
   // connect to database
    $link = mysqli_connect("localhost","root",
                            "A12345678","cakeshop")
                  or die("Cannot open MySQL database connection!<br/>");


    // define sql string
    $sql = "SELECT * FROM user WHERE ";
    $sql.= "user_id='".$user_id."'";
    // execute SQL command
    $result = mysqli_query($link, $sql);
    $total_records = mysqli_num_rows($result);
    // check if login data matched with database
    if ( $total_records == 0 ) {
      $password = $_POST["pass"];
      $hash = password_hash($password, PASSWORD_DEFAULT);
      
      //create a string about a sql statement which is used to insert a user record
      $insert_sql = "INSERT INTO user (user_id, password, person_name, birthday, gender, email, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $add_stmt = $link->prepare($insert_sql);
      $add_stmt->bind_param("sssssss",$_POST["user"],$hash,$_POST["name"],$_POST["birthday"],$_POST["gender"],$_POST["email"],$_POST["phone_number"]);
    
      $add_stmt->execute();
    
      $add_stmt->close();
      $link->close();
    
      header("Location: menu.php");
    } 
    else {  // login fails
    
      $error_msg = "<font color='red'>user name exist! Need a new one!<br/></font>";

    }
    mysqli_close($link);    
  }
}

?>
<head>
  <title>User Information</title>
</head>

  <form name="reg" onsubmit = "return formValidation();" method = "post" action = "register.php">
<div class="box">
  <div class="empty"></div>
   <div class="register"><h4><br>Register</h4></div>
   
   <div class="infor">
    <form>
    Username:&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="user" name="user" size="20" placeholder="Letters and Numbers Only"><br><?php echo $error_msg ?><br>
    Password:&ensp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" id="pass" name="pass" size="23" placeholder="6-15 characters"><p style="line-height: 0.4; font-size:x-small;font-weight:300;color:#E05273;">(at least 1 number, 1 Uppercase letter and 1 lowercase letter)</p><br>

    Password confirmation:&thinsp;&thinsp;&thinsp;
    <input type="password" id="passcon" name="passcon" size="23"><br><br>
    Name:&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="name" name="name" size="18" placeholder="Letters Only"><br><br>
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
    <input class="signup" type="submit" name="submit" type="submit" value="Sign up">
    </form>
    <div class="link">
    <a href="login.php">Login</a>
    <div class="logo">
   <img src="image/logo.png"  ></div>
    </div>
</div>
</div>
</form>

  <script>
    function formValidation() {
      var user = document.reg.user;   //create a variable to store the user's username 
      var psd = document.reg.pass;   //create a variable to store the user's password
      var name = document.reg.name;  //create a variable to store the user's name 
      var birthday = document.reg.birthday;  //create a variable to store the user's birthday
      var gender = document.reg.gender;   //create a variable to store the user's gender
      var country = document.reg.country;  //create a variable to store the user's country
      var address = document.reg.address;  //create a variable to store the user's address
      var email = document.reg.email;  //create a variable to store the user's email
      var color = document.reg.color;  //create a variable to store the user's favourite color
      var hobby = document.reg.hobby; //create a variable to store the user's hobbies
      var foodstyle = document.reg.foodstyle;  //create a variable to store the user's favourite food style
      var subject = document.reg.subject;  //create a variable to store the user's favourite subject
      var phone = document.reg.phone_number; //create a variable to store the user's phone number

      //Validation is performed in order. If the input are all corrected, then it will return true.
      //If one input is incorrect, it will return false and ask the user to modify.
      
      if (user_Valid(user)) {
        if (pass_valid(psd)) {
          if (passcon_valid()) {
            if (name_valid(name)) {
              if (birthday_valid(birthday)) {
                if (gender_valid(gender)) {
                  if (country_valid()) {
                    if (address_valid()) {
                      if (email_valid(email)) {
                        if (color_valid()) {
                          if (hobby_valid()) {
                            if (food_valid()) {
                              if (phone_Valid(phone)) {
                                
                                return true;  
                              }
                              else
                              {
                                return false;
                              }
                            }
                            else
                            {
                              return false;
                            }
                          }
                          else
                          {
                            return false;
                          }
                        }
                        else
                        {
                          return false;
                        }
                      }
                      else
                      {
                        return false;
                      }
                    }
                    else
                    {
                      return false;
                    }
                  }
                  else
                  {
                    return false;
                  }
                }
                else
                {
                  return false;
                }
              }
              else
              {
                return false;
              }
            }
            else
            {
              return false;
            }
          }
          else
          {
            return false;
          }
        }
        else
        {
          return false;
        }
     }
      else
      {
        return false;
      }
    }
    function user_Valid(user) { //function used to validate the user name written in letters and numbers
      var letters = /^[A-Za-z0-9]+$/;
      if (!user.value) { //if not input, alert to input user name and focus
        alert("Please input your user name!");
        user.focus();
        return false;
      } else if (user.value.match(letters)) { //if written in letters, return true
        return true;
      } else { //otherwise alert to input letters and focus
        alert('User name must have alphabet characters or numeric digits only!');
        user.focus();
        return false;
      }
    }
    function pass_valid(psd) { //function used to validate password 6 to 15 characters    
      //which contain at least one numeric digit, one uppercase and one lowercase letter
      var psd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}$/;
      if (pass.value.match(psd)) {
        return true;
      } else { // otherwise will display alert window and focus
        alert("Password not be empty and it should be 6 to 15 characters, " +
          "at least one numeric digit, one uppercase and one lowercase letter");
        pass.focus();
        return false;
      }
    }
    function passcon_valid() {//function used to ensure that user enter password is the same as first time
      var psdcon = document.getElementById("passcon").value; //get the first time password value
      var pass = document.getElementById("pass").value; //get the second time password value
      if (psdcon == pass) { //if they are equal, return true
        return true;
      } else { // otherwise will display alert window and focus
        alert("The password and confirming password disagree! Please input the same passwords!")
        passcon.focus();
        return false;
      }
    }
    function name_valid(name) { //function used to validate the name written in letters
      var letters = /^[A-Za-z]+$/;
      if (!name.value) { //if not input, alert to input name and focus
        alert("Please input your name!");
        name.focus();
        return false;
      } else if (name.value.match(letters)) { //if written in letters, return true
        return true;
      } else { //otherwise alert to input letters and focus
        alert('Name must have alphabet characters only!');
        name.focus();
        return false;
      }
    }
    function birthday_valid(birthday) { //function used to vetify the birthday date
      var dateformat = /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/;
      if (birthday.value.match(dateformat)) { //only can input numbers for date 
        return true;
      } else { // if not, alert and focus
        alert("Invalid date format!");
        birthday.focus();
        return false;
      }
    }
    function gender_valid(gender) { //function used to verify the gender 
      //if the user doesn't choose any options, alert and return false
      if ((!gender[0].checked) && (!gender[1].checked)) {
        alert("Please select a gender !");
        return false;
      } else
        return true;//otherwise, return true
    }
    function country_valid() { // function used to verify contry selection

        return true;//otherwise, return true

    }
     function address_valid() {// function used to verify address
        return true;//otherwise, return true
    }

    function email_valid(email) { // function used to verify email
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (email.value.match(mailformat)) {//if the user input meet the format, return true
        return true;
      } else { //if not match, alert, focus and return false
        alert("You have entered an invalid email address!");
        email.focus();
        return false;
      }
    }
    function phone_Valid(phone) { //function used to validate the user name written in letters and numbers
      var letters = /^[0-9]+$/;
      if (!phone.value) { //if not input, alert to input user name and focus
        alert("Please input your phone number!");
        phone.focus();
        return false;
      } else if (phone.value.match(letters)) { //if written in letters, return true
        return true;
      } else { //otherwise alert to input letters and focus
        alert('Phone number must only have numeric digits only!');
        phone.focus();
        return false;
      }
    }

    function color_valid() { //function used to verify color selection

        return true;//otherwise, return true
    }
    function hobby_valid() { //function used to verify the hobby selection

        return true;//otherwise, return true
    }
    function food_valid() { //function used to verify foodstyle selection

        return true;//otherwise, return true

    }
    function subject_valid() { //function used to verify drinkstyle selection

        return true; //otherwise, return true
    }
    var today = new Date(); //create a variable to store the Date object
    var dd = today.getDate(); //create a variable to store the day
    var mm = today.getMonth() + 1; //create a variable to store the month
    var yyyy = today.getFullYear(); //create a variable to store the year
    if (dd < 10) { 
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    //set the date format
    today = yyyy + '-' + mm + '-' + dd;
    // here shows that date after today not allowed
    document.getElementById("birthday").setAttribute("max", today);
  </script>
</body>
</html>



