<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other appropriate page after logout
echo "<script>alert('Logout Successfully'); window.location.href = 'index.php';</script>";
exit();
?>
