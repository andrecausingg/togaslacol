<?php
include("connection.php");
date_default_timezone_set('Asia/Manila');

$email = $password = $confirmPassword = "";
$emailError = $passwordError = $confirmPasswordError = "";

$sixRandomNumber = mt_rand(100000,999999);

if($_SERVER["REQUEST_METHOD"] == "POST"){ // Form request

    if(isset($_POST["email"])){   // Checking if the input form have value
        $email = $_POST["email"]; // Getting a value on the input form and putting the value on the variable $email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Filter if the input email is not accepted
            $emailErr = "Invalid email format"; 
        }
    }

    if(isset($_POST["password"])){  // Checking if the input form have value
        $password = $_POST["password"]; // Getting a value on the input form and putting the value on the variable $password
    }

    if(isset($_POST["confirmPassword"])){ // Checking if the input form have value         
        $confirmPassword = $_POST["confirmPassword"]; // Getting a value on the input form and putting the value on the variable $confirmPassword
    }

    if($confirmPassword == $password){ // If the password are both equal
        if($email && $password && $confirmPassword){ // All variable must have value

            $check_email = mysqli_query($connection,"SELECT * FROM user_credential_table WHERE email = '$email'"); // Inserting to the database
            $check_email_row = mysqli_num_rows($check_email);

            if($check_email_row > 0){ // Checking if the email is already registered
                $emailError = "Email is already registered";
            }else{ // Inserting the data on the database 
                $query = mysqli_query($connection,"INSERT INTO user_credential_table (email,password) VALUES ('$email', '$password')");
                
                $check_cred = mysqli_query($connection,"SELECT * FROM user_credential_table");
                while($row_cred = mysqli_fetch_assoc($check_cred)){
                    $db_id = $row_cred["id"];
                }   

                $query_user_vote = mysqli_query($connection,"INSERT INTO user_vote_table (id_user,president,vice_president) VALUES ('$db_id','0','0')");

                echo "<script language='javascript'>alert('Registered Successfully')</script>";
                echo "<script>window.location.href='login.php';</script>";
            }
        }
    }else{ // If the password not match display an error
        $passwordError = "Password not Match!";
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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">
    
    <!-- Css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/mq.css">

    <!-- Title -->
    <title>Togaslacol - Register</title>
</head>
<body>
    <header class="header">
        <div class="overlay">
            <a href="index.php">Home</a>
            <a href="login.php">Log In</a>
            <a href="register.php">Register</a>
        </div>
        <nav class="nav">
            <a href="#" class="hide-desktop"><img src="images/logo/togaslacol.png" alt="togaslacol" width="150" ></a>

            <div class="hide-mobile navigation-links">
                <a href="login.php">Log In</a>
                <a href="index.php"><img src="images/logo/togaslacol.png" alt="togaslacol" width="150"> </a>
                <a href="register.php">Register</a>
            </div>
            
            <a id="buttonHamburger" href="#" class="hamburger hide-desktop">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </nav>
        <div class="creator">
            <div class="creator-website">
                <h5>Creator: Andre Causing |   </h5>
                <a target="blank" href="https://www.facebook.com/andrecausinggg"><img src="images/icons/facebook.svg" alt="facebook" width="24px" height="24px"></a>
            </div>
            <div class="creator-website">
                <a target="blank" href="https://www.facebook.com/togaslacol"><img src="images/icons/facebook.svg" alt="facebook" width="24px" height="24px"></a>
                <h5> |   FB Page: togaslacol</h5>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="form-container">
            <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <h2>Register</h2>
                <span class="error"><?php echo $passwordError; ?></span>
                <span class="error"><?php echo $emailError; ?></span>
                <label for="email">Email</label>
                <input class="inputText" type="email" name="email" id="" placeholder="Email" required value="<?php echo $email;?>">
                <label for="password">Password</label>
                <input class="inputText" type="password" name="password" id="" placeholder="Password" required>
                <label for="confirm-password">Confirm Password</label>
                <input class="inputText" type="password" name="confirmPassword" id="" placeholder="Confirm Password" required>
                <input class="submitBtn" type="submit" value="Log In">
             <span>Already have an account? <a href="login.php">Log In</a></span>
            </form>
        </div>
    </main>

    <script src="js/btnHamburger.js"></script>
</body>
</html>