<?php
session_start();

function isValidLogin($user, $password)
{
  global $db;
  $valid = false;
  $query = 'select * from login where UserName = :user and UserPassword = :password';
  $statment = $db->prepare($query);
  $statment->bindValue(':user', $user);
  $statment->bindValue(':password', $password);
  $statment->execute();

  if ($statment->rowCount() == 1) {
    $valid = true;
  } else {
    $valid = false;
  }
  return $valid;
}

if (isset($_POST['login'])) {
  require('db.php');
  $username = $_POST['User_Name'];
  $userpassword = $_POST['User_Password'];

  if (isValidLogin($username, $userpassword)) {
    $_SESSION['login'] = $UserName;
    header('Location:./landingPage.php');
  } else {
    echo "<html><script>alert('User and Password not match')</script></html>";
  }
}

?>

<!DOCTYPE html>
<html>
<style>
  /*set border to the form*/

  form {
    border: 3px solid lightgreen;
    margin-right: 30%;
    margin-left: 30%;
    margin-top: 5%;
  }

  /*assign full width inputs*/

  h2 {
    color: lightgreen;
    font-style: italic;
  }

  h1 {
    color: lightseagreen;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 8px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid lightgreen;
    box-sizing: border-box;
  }

  /*set a style for the buttons*/

  button {
    background-color: #4caf50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  /* set a hover effect for the button*/

  button:hover {
    opacity: 0.8;
  }

  /*set extra style for the cancel button*/

  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f15e24;
  }

  /*centre the display image inside the container*/

  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
  }

  /*set image properties*/

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  /*set padding to the container*/

  .container {
    padding: 16px;
  }

  /*set the forgot password text*/

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /*set styles for span and cancel button on small screens*/

  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }

    .cancelbtn {
      width: 100%;
    }
  }
</style>

<body>
  <center>
    <h2>Login Form</h2>
  </center>
  <!--Step 1 : Adding HTML-->
  <form action="" , method="post">
    <div class="imgcontainer">
      <img src="./img/login.gif" alt="Avatar" class="avatar" />
      <h1>ANIMA</h1>
    </div>

    <div class="container" style="color: steelblue">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="User_Name" required />

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="User_Password" required />

      <button type="submit" name="login">Login</button>
      <input type="checkbox" checked="checked" /> Remember me
    </div>

    <div class="container" style="background: color white">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="./forgot.php">password?</a></span>
    </div>
  </form>
</body>

</html>