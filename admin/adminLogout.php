<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

    echo "<script>alert('Logout Successfully');
    window.location.href = '../user/index.php';</script>";

    exit();
?>
