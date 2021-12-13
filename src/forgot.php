<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './php/mail/Exception.php';
require './php/mail/PHPMailer.php';
require './php/mail/SMTP.php';
require '../src/db.php';

if (isset($_POST['forgot'])) {

    global $db;
    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    $Newpassword = randomPassword();

    $email = $_POST['fmail'];
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "thalaking88258@gmail.com";
    $mail->Password   = "lhytxynhjvkozesu";
    $mail->IsHTML(true);
    $mail->AddAddress($email, "Anima");
    $mail->SetFrom("thalaking88258@gmail.com", "Anima! Forgot Password ?");
    //$mail->AddReplyTo("reply-to-email@domain", "Dinesh");
    //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
    $mail->Subject = "Anima - forgot your Password";
    $content = "<b>Find your new password</b><br /><p>User Password : {$Newpassword}</p>";
    $mail->MsgHTML($content);

    if (!$mail->Send()) {
        echo "<script>alert('Error while sending Email')</script>";
        var_dump($mail);
    } else {
        $updatequery = "UPDATE login SET UserPassword = :userpassword WHERE UserEmail = :useremail";
        $statment = $db->prepare($updatequery);
        $statment->bindValue(':userpassword', $Newpassword);
        $statment->bindValue(':useremail', $email);

        if ($statment->execute()) {
            echo "<script>alert('Password Send to mail successfully')</script>";
        } else {
            echo "<script>alert('Mail Id Not Register')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<body>
    <h1>
        Forgot Pin Page
    </h1>
    <form action="" method="post">
        <div class="exp">
            <p class="and" style="color: blue;">After Successfully send mail check your spam mail box</p>
        </div>
        <input type="email" name="fmail" required>
        <button name="forgot">Forgot</button>
    </form>
</body>

</html>