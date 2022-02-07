<?php 
include("connection.php"); // Connection for database

$email = $password = $confirmPassword = ""; // Variable for retain on form
$emailError = $passwordError = ""; // Variable for Error

if($_SERVER["REQUEST_METHOD"] == "POST"){ // Form request

    if(isset($_POST["email"])){   // Checking if the input form have value
        $email = $_POST["email"]; // Getting a value on the input form and putting the value on the variable $email
    }

    if(isset($_POST["password"])){ // Checking if the input form have value          
        $password = $_POST["password"]; // Getting a value on the input form and putting the value on the variable $password
    }

    
    if($email && $password ){  // Two variable have value
        $check_email = mysqli_query($connection,"SELECT * FROM user_credential_table WHERE email = '$email'"); // checking the email on the database
        $check_email_row = mysqli_num_rows($check_email); // putting the value on the variable on $check_email_row

        if($check_email_row > 0){ // Checking if the email exist on data base
            while($row = mysqli_fetch_assoc($check_email)){ 
                $user_id = $row["id"];

                $db_password = $row["password"];

                if($password == $db_password){
                    session_start();
                    $_SESSION["id"] = $user_id; 
                    echo "<script>window.location.href='home.php';</script>";
                }else if($password != $db_password){
                    $passwordError = "Incorrect Password";
                }
            }
        }else{
            $emailError = "Email is not registered!";
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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">

    <!-- Css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/mq.css">

    <!-- Title -->
    <title>Togaslacol - Log In</title>
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
                <h2>Log In</h2>
                <span class="error"><?php echo $emailError; ?></span>
                <span class="error"><?php echo $passwordError; ?></span>
                <label for="email">Email</label>
                <input class="inputText" type="email" name="email" id="" placeholder="Email" required value="<?php echo $email;?>"> 
                <label for="email">Password</label>
                <input class="inputText" type="password" name="password" id="" placeholder="Password" required>
                <input class="submitBtn" type="submit" value="Log In">
             <span>Don't have an account? <a href="register.php">Sign Up</a></span>
            </form>
        </div>
    </main>
    
    <script src="js/btnHamburger.js"></script>
</body>
</html>