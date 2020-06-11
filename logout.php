<?php include "database.php";?>

<?php session_start();
?>

<?php
    $_SESSION['username']=null;
    $_SESSION['user_id']=null;
header("Location: login.php");
?>