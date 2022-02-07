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
    // President
    $db_bbm = $row["bbm"];
    $db_leni_robredo = $row["leni_robredo"];
    $db_isko_moreno = $row["isko_moreno"];
    $db_manny_pacquiao = $row["manny_pacquiao"];
    $db_panfilo_lacson = $row["panfilo_lacson"];

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
    // President
    if(isset($_POST["voteBBM"])){  // BBM
        $voteBBM = 1;

        if($db_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET president = $voteBBM WHERE id_user = $id_user");
            $accu = $db_bbm + $voteBBM;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET bbm = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR PRESIDENT')</script>";
        }
    }

    if(isset($_POST["voteLeni"])){  // Leni
        $voteLeni = 1;

        if($db_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET president = $voteLeni WHERE id_user = $id_user");
            $accu = $db_leni_robredo + $voteLeni;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET leni_robredo = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR PRESIDENT')</script>";
        }
    }

    if(isset($_POST["voteIsko"])){  // Isko
        $voteIsko = 1;

        if($db_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET president = $voteIsko WHERE id_user = $id_user");
            $accu = $db_isko_moreno + $voteIsko;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET isko_moreno = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR PRESIDENT')</script>";
        }
    }

    if(isset($_POST["voteManny"])){  // Manny
        $voteManny = 1;

        if($db_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET president = $voteManny WHERE id_user = $id_user");
            $accu = $db_manny_pacquiao + $voteManny;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET manny_pacquiao = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR PRESIDENT')</script>";
        }
    }

    if(isset($_POST["votePanfilo"])){  // Panfilo
        $votePanfilo = 1;

        if($db_president < 1){
            $query_vote_candidate = mysqli_query($connection,"UPDATE user_vote_table SET president = $votePanfilo WHERE id_user = $id_user");
            $accu = $db_panfilo_lacson + $votePanfilo;
            $query_canditates = mysqli_query($connection,"UPDATE candidates_table SET panfilo_lacson = $accu WHERE id_candidates = 1");
            echo "<script>window.location.href='president.php';</script>";
        }else{
            echo "<script language='javascript'>alert('ONE VOTE FOR PRESIDENT')</script>";
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
    <title>Togaslacol - President</title>
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
                <h2 class="header-title-candidate">President</h2>
                <h3>Bong Bong Marcos</h3>
                <div class="card-content">
                    <img src="images/canditates/presidents/bong-bong-marcos.jpg" alt="bong-bong-marcos" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_bbm; ?></h3>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form1">  
                            <button name="voteBBM" type="submit" class="vote-btn" >Vote</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="header-title-candidate">President</h2>
                <h3>Leni Robredo</h3>
                <div class="card-content">
                    <img src="images/canditates/presidents/leni_robredo.png" alt="leni_robredo" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_leni_robredo; ?></h3>
                        <button name="voteLeni" type="submit" class="vote-btn" form="form1" >Vote</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="header-title-candidate">President</h2>
                <h3>Isko Moreno</h3>
                <div class="card-content">
                    <img src="images/canditates/presidents/isko-moreno.jpg " alt="isko-moreno" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_isko_moreno; ?></h3>
                        <button name="voteIsko" type="submit" class="vote-btn" form="form1" >Vote</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="header-title-candidate">President</h2>
                <h3>Manny Pacquiao</h3>
                <div class="card-content">
                    <img src="images/canditates/presidents/manny-pacquiao.jpg" alt="manny-pacquiao" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_manny_pacquiao; ?></h3>
                        <button name="voteManny" type="submit" class="vote-btn" form="form1" >Vote</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="header-title-candidate">President</h2>
                <h3>Panfilo Lacson</h3>
                <div class="card-content">
                    <img src="images/canditates/presidents/panfilo-lacson.jpg" alt="panfilo-lacson" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_panfilo_lacson; ?></h3>
                        <button name="votePanfilo" type="submit" class="vote-btn" form="form1" >Vote</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    
    <script src="js/btnHamburger.js"></script>
</body>
</html>





