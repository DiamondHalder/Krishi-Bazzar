
<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
require_once('../db/database.php');

$u_id = $_SESSION['user_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$u_id'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | Krishibazar</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="checkout-page">
    <header class="header-main">
        <div class="header-container">
            <div class="logo">Krishibazar</div>
            <nav class="header-nav">
                <a href="dashboard.php">Home</a>
                <a href="cart.php">Cart</a>
                <a href="orders.php">Orders</a>
                <a href="profile.php" class="active">Me</a>
                <a href="../php/logout.php" style="color: #d9534f;"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </nav>
        </div>
    </header>
