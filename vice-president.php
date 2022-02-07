<?php 
session_start(); // Accessing session of I.D
include("connection.php"); // Database connection

if(isset($_SESSION["id"])){ // Checking if the I.D is set
    $id_user = $_SESSION["id"];
}else{ // If not set it will force go to LOG IN page
    echo "<script language='javascript'>alert('LOG IN FIRST!')</script>"; // Message
    echo "<script>window.location.href='login.php';</script>"; // Redirect to Log in page
}

// View Vote Candidate 
$view_vote = mysqli_query($connection,"SELECT * FROM candidates_table ");
while($row = mysqli_fetch_assoc($view_vote)){
    // Vice President
    $db_sara_duterte = $row["sara_duterte"];
    $db_kiko_pangilinan = $row["kiko_pangilinan"];
    $db_vicente_sotto = $row["vicente_sotto"];
    $db_ong_willie = $row["ong_willie"];
    $db_lito_atienza = $row["lito_atienza"];
}

// Count of user Vote
$check_vote = mysqli_query($connection,"SELECT * FROM user_vote_table WHERE id_user = '$id_user'");
    while($row = mysqli_fetch_assoc($check_vote)){
        $db_president = $row["president"];
        $db_vice_president = $row["vice_president"];
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vice - President
    if(isset($_POST["voteSarah"])){ // Sara
        $voteSarah = 1;

        if($db_vice_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET vice_president = $voteSarah WHERE id_user = $id_user");
            $accu = $db_sara_duterte + $voteSarah;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET sara_duterte = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='vice-president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR VICE PRESIDENT')</script>";
        }
    }

    if(isset($_POST["voteKiko"])){ // Kiko
        $voteKiko = 1;

        if($db_vice_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET vice_president = $voteKiko WHERE id_user = $id_user");
            $accu = $db_kiko_pangilinan + $voteKiko;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET kiko_pangilinan = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='vice-president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR VICE PRESIDENT')</script>";
        }
    }

    if(isset($_POST["voteVicente"])){ // Vicente
        $voteVicente = 1;

        if($db_vice_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET vice_president = $voteVicente WHERE id_user = $id_user");
            $accu = $db_vicente_sotto + $voteVicente;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET vicente_sotto = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='vice-president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR VICE PRESIDENT')</script>";
        }
    }

    if(isset($_POST["voteOng"])){ // Ong
        $voteOng = 1;

        if($db_vice_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET vice_president = $voteOng WHERE id_user = $id_user");
            $accu = $db_ong_willie + $voteOng;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET ong_willie = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='vice-president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR VICE PRESIDENT')</script>";
        }
    }


    if(isset($_POST["voteLito"])){ // Lito
        $voteLito = 1;

        if($db_vice_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET vice_president = $voteLito WHERE id_user = $id_user");
            $accu = $db_lito_atienza + $voteLito;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET lito_atienza = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='vice-president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR VICE PRESIDENT')</script>";
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
    <title>Togaslacol - Vice President</title>
</head>
<body>
    <header class="header">
        <div class="overlay">
            <a href="home.php">Home</a>
            <a href="president.php">President</a>
            <a href="vice-president.php">Vice President</a>
            <a href="logout.php">Log Out</a>
        </div>
        <nav class="nav">
            <a href="#" class="hide-desktop"><img src="images/logo/togaslacol.png" alt="togaslacol" width="150" ></a>

            <div class="hide-mobile navigation-links">
                <a href="home.php">Home</a>
                <a href="president.php">President</a>
                <a href="home.php"><img src="images/logo/togaslacol.png" alt="togaslacol" width="150"> </a>
                <a href="vice-president.php">Vice President</a>
                <a href="logout.php">Log Out</a>
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
        <section class="section">
            <div class="card">
                <h2 class="header-title-candidate">Vice President</h2>
                <h3>Sara Duterte</h3>
                <div class="card-content">
                    <img src="images/canditates/vice-president/sara-duterte.jpg" alt="sara-duterte" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_sara_duterte; ?></h3>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form1">  
                        <button name="voteSarah" type="submit" class="vote-btn" form="form1" >Vote</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="header-title-candidate">Vice President</h2>
                <h3>Kiko Pangilinan</h3>
                <div class="card-content">
                    <img src="images/canditates/vice-president/kiko-pangilinan.jpg" alt="kiko-pangilinan" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_kiko_pangilinan; ?></h3>
                        <button name="voteKiko" type="submit" class="vote-btn" form="form1" >Vote</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="header-title-candidate">Vice President</h2>
                <h3>Vicente Sotto</h3>
                <div class="card-content">
                    <img src="images/canditates/vice-president/vicente-sotto.jpg" alt="panfilo-lacson" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_vicente_sotto; ?></h3>
                        <button name="voteVicente" type="submit" class="vote-btn" form="form1" >Vote</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="header-title-candidate">Vice President</h2>
                <h3>Ong Willie</h3>
                <div class="card-content">
                    <img src="images/canditates/vice-president/ong-willie.jpg " alt="ong-willie" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_ong_willie; ?></h3>
                        <button name="voteOng" type="submit" class="vote-btn" form="form1" >Vote</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="header-title-candidate">Vice President</h2>
                <h3>Lito Atienza</h3>
                <div class="card-content">
                    <img src="images/canditates/vice-president/lito-atienza.jpg" alt="lito-atienza" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_lito_atienza; ?></h3>
                        <button name="voteLito" type="submit" class="vote-btn" form="form1" >Vote</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    
    <script src="js/btnHamburger.js"></script>
</body>
</html>





