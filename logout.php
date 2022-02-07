<?php
session_start();
unset($_SESSION['id']);
session_unset();
session_destroy();
header('Refresh: 1;url=index.php');
exit();
?>