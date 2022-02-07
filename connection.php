<?php

$connection = mysqli_connect("localhost","root","","togas_lacol_db");
    if(mysqli_connect_errno()){
        echo "FAILED TO CONNECT TO MYSQL: " . mysqli_connect_error();
    }
?>