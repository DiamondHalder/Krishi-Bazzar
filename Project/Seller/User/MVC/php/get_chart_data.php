<?php
error_reporting(0);
require_once("seller_auth.php");
include("../db/db.php");

$seller_id = $_SESSION['seller_id'];

$orderQuery = "SELECT order_id, amount  
               FROM earnings 
               WHERE seller_id = '$seller_id' 
               ORDER BY created_at DESC LIMIT 10";

$orderRes = $conn->query($orderQuery);
$orderData = [];
while($row = $orderRes->fetch_assoc()){
    $orderData[] = $row;
}

// Product Line Graph
$productQuery = "SELECT name, price FROM products WHERE seller_id = '$seller_id' LIMIT 10";
$productRes = $conn->query($productQuery);
$productData = [];
while($row = $productRes->fetch_assoc()){
    $productData[] = $row;
}

$response = [
    "orderStats" => $orderData,
    "productInfo" => $productData
];

header('Content-Type: application/json');
echo json_encode($response);
?>