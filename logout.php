<?php
// logout.php

// Start the session to access session data
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the login page or any other page you want after logout
header("Location: sign.php");
exit();
?>
