<?php

session_start();

if (isset($_POST['signup'])) {
  global $db;
  require('db.php');

  $New_Password = $_POST['User_New_Password'];
  $Confirm_Password = $_POST['User_Confirm_Password'];
  $password;

  if ($New_Password == $Confirm_Password) {
    $password = $New_Password;
  } else {
    $password = null;
    echo "<script>alert('Password not match')</script>";
  }

  $username = $_POST['User_Name'];
  $email = $_POST['User_Email'];
  $query = "INSERT INTO login(UserName,UserEmail,UserPassword) VALUES('$username','$email','$password')";

  if ($db-> query($query)) {
    echo '<script>alert("SignUp Successfully")</script>';
  } else {
    echo '<script>alert("Something Wrong")</script>';
  }
}

?>


<!DOCTYPE html>
<html>
<style>
  /*set border to the form*/

  form {
    border: 3px solid lightcoral;
    margin-right: 30%;
    margin-left: 30%;
    margin-top: 5%;
  }

  /*assign full width inputs*/

  h2 {
    color: orange;
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
    border: 1px solid lightcoral;
    box-sizing: border-box;
  }

  /*set a style for the buttons*/

  button {
    background-color: lightseagreen;
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
    background-color: #9c59e9;
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

  @media screen and (max-width: 300px) {}
</style>

<body>
  <center>
    <h2>Create Account</h2>
  </center>
  <!--Step 1 : Adding HTML-->
  <form action="" method="post">
    <div class="imgcontainer">
      <img src="./img/login.gif" alt="Avatar" class="avatar" />
      <h1>ANIMA</h1>
    </div>

    <div class="container" style="color: crimson">
      <label><b>Name</b></label>
      <input type="text" placeholder="Enter Your Name" name="User_Name" required />

      <label><b>Gmail</b></label>
      <input type="text" placeholder="Enter gmail" name="User_Email" required />

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="User_New_Password" required />

      <label><b>Confirm Password</b></label>
      <input type="password" placeholder="Enter Confirm Password" name="User_Confirm_Password" required />

      <button type="submit" name="signup">Create Account</button>
      <input type="checkbox" checked="true" /> Remember me
    </div>
  </form>
</body>

</html>