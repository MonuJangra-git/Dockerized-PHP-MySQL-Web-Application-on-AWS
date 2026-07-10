<?php
require_once 'config.php';

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destroy all session data
$_SESSION = [];

// Delete session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(
        session_name(), 
        '', 
        time() - 3600, 
        '/', 
        '', 
        true,   // secure (use true if HTTPS)
        true    // httponly
    );
}

// Destroy session
session_destroy();

// Redirect to login page
header('Location: index.php?message=logged_out');
exit();
?>