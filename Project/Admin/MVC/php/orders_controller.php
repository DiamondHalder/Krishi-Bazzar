<?php
require_once "session_check.php";
include "../db/config.php";

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = mysqli_query($conn, $sql);

$orders = [];
while ($row = mysqli_fetch_assoc($result)) 
{
    $orders[] = $row;
}

mysqli_close($conn);

$data = [
    'orders' => $orders
];
require_once "../html/orders.php";
?>