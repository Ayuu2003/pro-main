<?php
// Start the session
session_start();

// Unset the session variables
unset($_SESSION['username']);

// Destroy the session
session_destroy();

// Redirect the user to the login page
header('Location:/pro-main/index.php');
exit;
?>