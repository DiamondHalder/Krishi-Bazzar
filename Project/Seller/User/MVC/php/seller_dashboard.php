<?php 
require_once("seller_auth.php");
include("../db/db.php");

$seller_id = $_SESSION['seller_id'];
//total orders
$totalOrdersRes = $conn->query("SELECT COUNT(*) AS total FROM cart c 
                                JOIN products p ON c.product_id = p.product_id 
                                WHERE p.seller_id='$seller_id'");
$totalOrders = $totalOrdersRes->fetch_assoc() ['total'] ?? 0;
//pending orders
$pendingOrdersRes = $conn->query("SELECT COUNT(*) AS total FROM cart c 
                                   JOIN products p ON c.product_id = p.product_id 
                                   WHERE p.seller_id='$seller_id' AND c.status='pending'");
$pendingOrders = $pendingOrdersRes->fetch_assoc() ['total'] ?? 0;
//total sales
$totalSalesRes = $conn->query("SELECT SUM(amount) AS total_earned FROM earnings WHERE seller_id='$seller_id'");
$totalSales = $totalSalesRes->fetch_assoc() ['total_earned'] ?? 0;
include("../html/seller_dashboard.php");
exit;
?>