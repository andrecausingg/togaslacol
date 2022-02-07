<?php 

$verification = "";

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
  
    if($verification){
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = "true";
      $mail->SMTPSecure = "tls";
      $mail->Port = "587";
      $mail->Username = "eospatterfly@gmail.com";
      $mail->Password = "hsibwi!1vuvu";
      $mail->Subject = "Email";
      $mail->setFrom("eospatterfly@gmail.com");
      $mail->Body = "";
      $mail->addAddress("eospatterfly@gmail.com");
      $mail->Send();
      $mail->smtpClose();
      if($mail->Send()){
          echo "Email Sent!";
      }else{
          echo "error";
      }
  }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->

    <!-- Css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/mq.css">

    <!-- Title -->
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="overlay">
            <a href="#">Log In</a>
            <a href="#">President</a>
            <a href="#">Vice President</a>
            <a href="#">Register</a>
        </div>
        <nav class="nav">
            <a href="#" class="hide-desktop"><img src="images/logo/togaslacol.png" alt="togaslacol" width="150" ></a>

            <div class="hide-mobile navigation-links">
                <a href="#">Log In</a>
                <a href="index.php">President</a>
                <a href="index.php"><img src="images/logo/togaslacol.png" alt="togaslacol" width="150"> </a>
                <a href="vice-president.php">Vice President</a>
                <a href="register.php">Register</a>
            </div>
            
            <a id="buttonHamburger" href="#" class="hamburger hide-desktop">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </nav>
        <div class="creator">
            <h5>Creator: Andre Causing</h5>
            <div class="creator-socialmedia">
                <a href="#"><img src="images/icons/facebook.svg" alt="facebook" width="24px" height="24px"></a>
                <a href="#"><img src="images/icons/instagram-icon.svg" alt="instagram" width="24px" height="24px"></a>
                <a href="#"><img src="images/icons/twitter-icon.svg" alt="twitter-icon" width="24px" height="24px"></a>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="form-container">
            <form class="form" action="">
                <label for="">Enter Code</label>
                <input class="inputText" type="text" name="verification" id="" placeholder="Enter Code">
                <input class="submitBtn" type="submit" value="Submit">
                <span>Didn't get your email? <a href="login.php"> Resend the Code</a> <br> or <a href="login.php"> Update your email address.</a></span>
            </form>
        </div>
    </main>
    
    <script src="js/btnHamburger.js"></script>
</body>
</html>



<?php
    $sixRandomNumber = mt_rand(100000,999999);
    echo $sixRandomNumber;
?>