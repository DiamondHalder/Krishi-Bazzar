<?php
session_start();
require_once('../db/database.php');

if (isset($_POST['login_btn'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        // 1. SET SESSION
        $_SESSION['username'] = $user;

        // 2. SET COOKIE
        setcookie("last_user", $user, time() + 3600, "/");

        // 3. REDIRECT TO DASHBOARD (The critical step)
        header("Location: ../html/dashboard.php");
        exit(); // Always call exit after header redirect
    } else {
        echo "<script>alert('Invalid Username or Password'); window.location='../html/login.php';</script>";
    }
}
?>