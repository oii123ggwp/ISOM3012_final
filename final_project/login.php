<!-- 
   Author: FONG IEK KIN BC000076
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
$_SESSION["user_id"] = "";
$user_id = "";  $password = "";
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
   $sql = "SELECT * FROM user WHERE password='";
   $sql.= $password."' AND user_id='".$user_id."'";
   // execute SQL command
   $result = mysqli_query($link, $sql);
   $total_records = mysqli_num_rows($result);
   // check if login data matched with database
   if ( $total_records > 0 ) {
      // if matched, specify session variable login_session as true
      $_SESSION["login_session"] = true;//if true, mean user login
      header("Location: menu.php");
   } else {  // login fails
      echo "<center><font color='red'>";
      echo "wrong user name or password!<br/>";
      echo "</font>";
      $_SESSION["login_session"] = false;//if false, mean user not login
   }
   mysqli_close($link);    
}
?>
<form action="login.php" method="post">
<table align="center" bgcolor="#FFCC99">
 <tr><td><font size="2">User ID:</font></td>
   <td><input type="text" name="user_id"
                size="15" maxlength="10" value = <?php echo $_POST["user_id"]?> >
   </td></tr>
 <tr><td><font size="2">password:</font></td>
   <td><input type="password" name="Password"
              size="15" maxlength="10"/>
   </td></tr>
 <tr><td colspan="2" align="center">
   <input type="submit" value="Log In"/>
   </td></tr>
   <tr><td colspan="2" align="center">
   <a href = "register_page.php">No account? Sign up here!</a>
   </td></tr> 
</table>
</form>
</body>
</html>
