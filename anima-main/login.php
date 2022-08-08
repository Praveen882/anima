<?php
session_start();

if (isset($_POST['login'])) {
  require('database.php');
  require('functions.php');
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (isValidAdminLogin($email, $password)) {
    $_SESSION['admin'] = $email;
    header('Location: ./adminpage.php');
  } else if (isValidStudentLogin($email, $password)) {
    $_SESSION['login'] = $email;
    header('Location: ./src/index.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>The Real Anima/login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
  <link rel="stylesheet" href="./LoginStyle.css">

</head>

<body>
  <!-- partial:index.partial.html -->

  <body id="particles-js"></body>
  <div class="animated bounceInDown">
    <div class="container">
      <span class="error animated tada" id="msg"></span>
      <form action="" method="post" class="box">
        <h4>Freshers<span>Park</span></h4>
        <h5>Sign in to your account.</h5>
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
        <label>
          <input type="checkbox">
          <span></span>
          <small class="rmb">Remember me</small>
        </label>
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" value="Sign in" class="btn1" name="login">
      </form>
      <a href="./Signup.php" class="dnthave">Don’t have an account? Sign up</a>
    </div>
    <!-- partial -->
    <script src='https://cldup.com/S6Ptkwu_qA.js'></script>
    <script src="./LoginScript.js"></script>

</body>

</html>