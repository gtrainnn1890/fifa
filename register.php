<?php
require 'core.inc.php';
require 'connect.inc.php';

if (!loggedin()){


if (isset($_POST['username']) &&     //This is to check for each field having a value
  isset($_POST['password']) &&
  isset($_POST['password_again']) &&
  isset($_POST['firstname']) &&
  isset($_POST['lastname'])) {

    $username = $_POST['username']; //reinitalize the post data
    $password = $_POST['password'];
    $password_again = $_POST['password_again'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password_hash = md5($password);

    if (!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($lastname)) {
      if ($password!=$password_again){
      echo 'Passwords do not match.';
      } else {

        $query = "SELECT username FROM users WHERE username='$username'";
        $query_run = mysql_query($query);

        if (@mysql_num_rows($query_run)==1) {
            echo 'The username '.$username.' already exists.';
        } else {

          $query = "INSERT INTO users VALUES('', '$username', '$password_hash', '$firstname', '$lastname')";

          //$query = "INSERT INTO users VALUES('', '"mysql_real_escape_string($username)"', '".mysql_real_escape_string($password_hash)."', '".mysql_real_escape_string($firstname)."', '".mysql_real_escape_string($lastname)."')";
            if ($query_run = mysql_query($query)) {
            header('Location: register_success.php');
            } else {
              echo 'Sorry, could not register you at this time. Please try again later.';
          }
        }

    }
    } else {
      echo 'All fields are required.';
    }

  }

?>

<form action="register.php" method="post">
Username: <br> <input type="text" name="username" value="<?php echo @$username; ?>"> <br> <br>
Password: <br> <input type="password" name="password" value=""> <br> <br>
Password again: <br> <input type="password" name="password_again" value=""> <br> <br>
First Name: <br> <input type="text" name="firstname" value="<?php echo @$firstname; ?>"> <br> <br>
Last Name: <br> <input type="text" name="lastname" value="<?php echo @$lastname; ?>"> <br> <br>
<input type="submit" name="" value="Register">
</form>


<?php
} else if (loggedin()){
  echo 'You are registered and logged in.';
}

?>
