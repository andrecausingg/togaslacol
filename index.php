<?php 
session_start();
include("connection.php");

$vote = "";

// View Vote Candidate 
$view_vote = mysqli_query($connection,"SELECT * FROM candidates_table ");
while($row = mysqli_fetch_assoc($view_vote)){
    // Presidents
    $db_bbm = $row["bbm"];
    $db_leni = $row["leni_robredo"];
    $db_isko_moreno = $row["isko_moreno"];
    $db_manny_pacquiao = $row["manny_pacquiao"];
    $db_panfilo_lacson = $row["panfilo_lacson"];

    // Vice Presidents
    $db_sara_duterte = $row["sara_duterte"];
    $db_kiko_pangilinan = $row["kiko_pangilinan"];
    $db_vicente_sotto = $row["vicente_sotto"];
    $db_ong_willie = $row["ong_willie"];
    $db_lito_atienza = $row["lito_atienza"];
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["vote"])){  
        if(empty($_SESSION["id"])){
            echo "<script language='javascript'>alert('LOG IN FIRST!')</script>";
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

    <!-- Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Font -->

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="images/icons/favicon.ico">

    <!-- Css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/mq.css">

    <!-- Title -->
    <title>Togaslacol</title>
</head>
<body>
    <header class="header">
        <div class="overlay">
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
        <section class="section">
            <div class="card" >
                <h2 class="header-title-candidate">President</h2>
                <h3>Bong Bong Marcos</h3>
                <div class="card-content">
                    <img src="images/canditates/presidents/bong-bong-marcos.jpg" alt="bong-bong-marcos" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_bbm;?></h3>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form1">  
                                <button name="vote" type="submit" class="vote-btn" >Vote</button>
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
                        <h3><?php echo $db_leni;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
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
                        <h3><?php echo $db_isko_moreno;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
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
                        <h3><?php echo $db_manny_pacquiao;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
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
                        <h3><?php echo $db_panfilo_lacson;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
                    </div>
                </div>
            </div>

            

            <div class="card">
                <h2 class="header-title-candidate">Vice President</h2>
                <h3>Sara Duterte</h3>
                <div class="card-content">
                    <img src="images/canditates/vice-president/sara-duterte.jpg" alt="sara-duterte" width="110" height="145">
                    <div class="seperator"></div>
                    <div class="vote">
                        <h3><?php echo $db_sara_duterte;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
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
                        <h3><?php echo $db_kiko_pangilinan;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
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
                        <h3><?php echo $db_vicente_sotto;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
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
                        <h3><?php echo $db_ong_willie;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
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
                        <h3><?php echo $db_lito_atienza;?></h3>
                        <button name="vote" type="submit" class="vote-btn" form="form1">Vote</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <script src="js/btnHamburger.js"></script>
</body>
</html>