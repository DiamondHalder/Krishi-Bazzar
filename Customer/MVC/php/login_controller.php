<?php
session_start();
require_once('../db/database.php');
if (isset($_POST['login_btn'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $res = mysqli_query($conn, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
    if (mysqli_num_rows($res) > 0) {
        $_SESSION['user'] = $user;
        setcookie("user_login", $user, time() + 3600, "/");
        echo "Success! Welcome " . $_SESSION['user'];
    } else { echo "Invalid Credentials"; }
}
?>