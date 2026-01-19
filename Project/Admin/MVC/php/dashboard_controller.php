<?php
require_once "session_check.php";
include "../db/config.php";

$admin_name = $_SESSION["admin_name"] ?? "Admin";

$total_users = 0;
$total_sellers = 0;
$total_products = 0;
$total_orders = 0;

$sql1 = "SELECT COUNT(*) as count FROM users WHERE type='customer'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$total_users = $row1['count'];

$sql2 = "SELECT COUNT(*) as count FROM users WHERE type='seller'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$total_sellers = $row2['count'];

$sql3 = "SELECT COUNT(*) as count FROM products";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$total_products = $row3['count'];

$sql4 = "SELECT COUNT(*) as count FROM orders";
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$total_orders = $row4['count'];

$data = [
    'admin_name' => $admin_name,
    'total_users' => $total_users,
    'total_sellers' => $total_sellers,
    'total_products' => $total_products,
    'total_orders' => $total_orders
];

require_once "../html/dashboard.php";
mysqli_close($conn);
?>