<?php
require_once "session_check.php";
include "../db/config.php";

$sql_active_users = "SELECT COUNT(*) as count FROM users WHERE type='customer' AND status='active'";
$result1 = mysqli_query($conn, $sql_active_users);
$row1 = mysqli_fetch_assoc($result1);
$active_users = $row1['count'];

$sql_active_sellers = "SELECT COUNT(*) as count FROM users WHERE type='seller' AND status='active'";
$result2 = mysqli_query($conn, $sql_active_sellers);
$row2 = mysqli_fetch_assoc($result2);
$active_sellers = $row2['count'];

$sql_products = "SELECT COUNT(*) as count FROM products";
$result3 = mysqli_query($conn, $sql_products);
$row3 = mysqli_fetch_assoc($result3);
$total_products = $row3['count'];

$sql_pending_orders = "SELECT COUNT(*) as count FROM orders WHERE status='pending'";
$result4 = mysqli_query($conn, $sql_pending_orders);
$row4 = mysqli_fetch_assoc($result4);
$pending_orders = $row4['count'];

$sql_completed_orders = "SELECT COUNT(*) as count FROM orders WHERE status='delivered'";
$result5 = mysqli_query($conn, $sql_completed_orders);
$row5 = mysqli_fetch_assoc($result5);
$completed_orders = $row5['count'];

mysqli_close($conn);

$data = [
    'active_users' => $active_users,
    'active_sellers' => $active_sellers,
    'total_products' => $total_products,
    'pending_orders' => $pending_orders,
    'completed_orders' => $completed_orders
];

require_once "../html/statistics.php";
?>