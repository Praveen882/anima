<?php

if (isset($_POST['signup'])) {
  require('database.php');
  $r_email = strtolower($_POST['email']);
  $password = $_POST['new_password'];

  $query = "SELECT * FROM login WHERE email = :email";
  $statement = $db->prepare($query);
  $statement->bindValue(':email', $r_email);
  $statement->execute();

  if ($statement->rowCount() > 0) {
    echo '<script>alert("email already taken")</script>';
  } elseif ($_POST['new_password'] != $_POST['confirm_password']) {
    echo '<script>alert("Password mismatch")</script>';
  } elseif ((strlen($_POST['new_password']) < 8) and (strlen($_POST['confirm_password']) < 8)) {
    echo '<script>alert("password must be minimum 8")</script>';
  } else {
    $query = "INSERT INTO login(email,password) VALUES('$r_email','$password')";
    $db->exec($query);
    echo '<script>alert("Sign Up Successfully")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>The Real Anima/Signup</title>
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
      <form action="" name="form1" class="box" method="post">
        <h4>Freshers<span>Park</span></h4>
        <h5>Signup</h5>
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="new_password" placeholder="New Passsword" id="pwd" autocomplete="off">
        <input type="password" name="confirm_password" placeholder="Confirm Passsword" id="pwd" autocomplete="off">

        <input type="submit" name="signup" value="Sign up" class="btn1">
      </form>
      <a href="./login.php" class="dnthave">If you have an account? Sing in</a>

    </div>
    <!-- partial -->
    <script src='https://cldup.com/S6Ptkwu_qA.js'></script>
    <script src="./LoginScript.js"></script>

</body>

</html>