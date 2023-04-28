<!--php part: FONG IEK KIN-->
<!DOCTYPE html>
<?php
session_start();
$user_id = "";
$error_msg = "";
if(isset($_POST['submit'])){
  
    // connect to database
      $link = mysqli_connect("localhost","root",
                            "A12345678","cakeshop")
                  or die("Cannot open MySQL database connection!<br/>");

      $user_id = $_SESSION['user_id'];

      // define sql string
      $sql = "SELECT * FROM user WHERE ";
      $sql.= "user_id='".$user_id."'";

      // execute SQL command
      $result = mysqli_query($link, $sql);
      $total_records = mysqli_num_rows($result);

      // check if user exist matched with database
      if ( $total_records > 0 ) {

        $password = $_POST["pass"];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        //create a string about a sql statement which is used to insert a user record
        $update_sql = "UPDATE user SET password = ?, person_name = ? , birthday = ?, gender = ?, email = ?, phone_number = ? WHERE user_id = '".$user_id."'";

        $update_stmt = $link->prepare($update_sql);

        $update_stmt->bind_param("ssssss",$hash,$_POST["name"],$_POST["birthday"],$_POST["gender"],$_POST["email"],$_POST["phone_number"]);

        $update_stmt->execute();

        $update_stmt->close();
        $link->close();
    
        header("Location: menu.php");
      } 
      else {  // login fails
    
        $error_msg = "<font color='red'>user id is not exist!<br/></font>";

      }
      mysqli_close($link);    
  }

if ($_SESSION['login_session'] == true){
  

//PDO and script: Owen ZHENG BO WEN

// create PDO
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'A12345678';
$DATABASE_NAME = 'cakeshop';
try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to database!');
}
// Prepare statement and execute, prevents SQL injection
$stmt = $pdo->prepare('SELECT * FROM user WHERE user_id = ?');
$stmt->execute([$user_id]);
// Fetch the user from the database and return the result as an Array
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// Check if the user exists (array is not empty)
if (!$user) {
    // Simple error to display if the id for the user doesn't exists (array is empty)
    exit('user does not exist!');
}


?>
<head>
<script>
    function formValidation() {
      var user = document.reg.user;   //create a variable to store the user's username 
      var psd = document.reg.pass;   //create a variable to store the user's password
      var name = document.reg.name;  //create a variable to store the user's name 
      var birthday = document.reg.birthday;  //create a variable to store the user's birthday
      var gender = document.reg.gender;   //create a variable to store the user's gender
      var address = document.reg.address;  //create a variable to store the user's address
      var email = document.reg.email;  //create a variable to store the user's email
      var phone = document.reg.phone_number; //create a variable to store the user's phone number

      //Validation is performed in order. If the input are all corrected, then it will return true.
      //If one input is incorrect, it will return false and ask the user to modify.
      
        if (pass_valid(psd)) {
          if (passcon_valid()) {
            if (name_valid(name)) {
              if (birthday_valid(birthday)) {
                if (gender_valid(gender)) {
                  if (email_valid(email)) {
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
</head>
<body> 
<link rel="stylesheet" type="text/css" href="user.css">
<form name="reg" onsubmit = "return formValidation();" method = "post" action = "user.php">

<div class="icon">  
  <a href="logout.php"><img src="image/icon9.png" title="logout"></a>
  <a href="contact_us.php"><img src="image/icon3.png" title="message" ></a>
  <a href="shopping_cart.php"><img src="image/icon2.png" title="shopping cart"></a>
  <a href="user.php"><img src="image/icon1.png" title="user"></a>
  <a href="menu.php"><img src="image/icon10.png" title="menu"></a>
  </div>

<div class="box">
  <div class="empty"></div>
   <div class="user"><h4><br>User Information</h4></div>
   
   <div class="infor">

    Password:&ensp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" id="pass" name="pass" size="23" value="<?=$user['password']?>"><p style="line-height: 0.4; font-size:x-small;font-weight:300;color:#efa238;">(at least 1 number, 1 Uppercase letter and 1 lowercase letter)</p><br>

    Password confirmation:&thinsp;&thinsp;&thinsp;
    <input type="password" id="passcon" name="passcon" size="23"><br><br>
    Name:&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="name" name="name" size="18" value="<?=$user['person_name']?>" ><br><br>
    Birthday:&ensp;&nbsp;&nbsp;&nbsp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input id="birthday" name="birthday" type="date"  max="1111-13-13" value="<?=$user['birthday']?>"><br><br>
    Gender:&thinsp;&thinsp;&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="gender" value="Male" <?php if($user['gender']=='Male') echo"checked"?>><span>Male</span>
    <input type="radio" name="gender" value="Female" <?php if($user['gender']=='Female') echo"checked"?>><span>Female</span><br><br>
    Phone number:&ensp;&thinsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="phone_number" name="phone_number" size="20" value="<?=$user['phone_number']?>"><br><br>
    Email:&thinsp;&thinsp;&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="email" name="email" size="28" value="<?=$user['email']?>"><br><br>
    </div>
    <input class="modify" type="submit" name="submit" type="submit" value="Modify"><input class="cancel" type="submit" name="Cancel" type="submit" value="Cancel">


</div>
</div>
</form>
</body>

<?php }
else if ($_SESSION['login_session'] == false || !isset($_SESSION['login_session'])) {
  header("Location: login.php");
}
else{
  echo "error";
}
?>