<?php
require_once("../php/seller_auth.php");
include("../db/db.php");


$seller_id = $_SESSION['seller_id'];
$error="";
$earnings=[];
$total_earnings = 0;

$sql = "SELECT earning_id, order_id, amount, created_at FROM earnings WHERE seller_id = '$seller_id' ORDER BY created_at DESC ";
$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $earnings[] = $row;
        $total_earnings += $row['amount'];
    }
} else {
    $error = "Failed to load earnings: " . $conn->error;
}


include("../html/earnings.php");
