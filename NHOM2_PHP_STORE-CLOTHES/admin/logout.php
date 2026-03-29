<?php
session_start();
unset($_SESSION['useradmin']);
unset($_SESSION['fullname']);
unset($_SESSION['userid']);
unset($_SESSION['image']);
header('location:login.php');
?>