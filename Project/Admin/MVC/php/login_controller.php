<?php
session_start();

$error = "";
$username = "";

if (isset($_SESSION["admin_logged_in"])) 
{
    header("Location: dashboard_controller.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if (empty($username) || empty($password)) 
    {
        $error = "Please enter both username and password";
    }
    else
    {
        include "../db/config.php";

        $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) == 1) 
        {
            $admin = mysqli_fetch_assoc($result);
            
            $_SESSION["admin_logged_in"] = true;
            $_SESSION["admin_name"] = $admin['name'];
            
            header("Location: dashboard_controller.php");
            exit();
        } 
        else 
        {
            $error = "Invalid username or password";
        }
        
        mysqli_close($conn);
    }
}

$view_data = [
    'error' => $error,
    'username' => $username
];

require_once "../html/login.php";
?>