<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page (or any other page, e.g., index.php)
header("Location: ./index.php");  // Or any other page you want to redirect after logout
exit();
?>