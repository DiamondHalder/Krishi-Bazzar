<?php
session_start();

// Clear session
session_unset();
session_destroy();

// Clear cookies
if(isset($_COOKIE['user_role'])){
    setcookie("user_role", "", time() - 3600, "/");
    setcookie("user_email", "", time() - 3600, "/");
}

// Redirect to login view
header("Location: ../html/login.php");
exit();
?>
