<?php
session_start();

// Unset all session variables
$_SESSION = array();

session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or another desired page
header("Location: /supershine/login.php"); // Replace "login.php" with the page you want to redirect to
exit();
?>