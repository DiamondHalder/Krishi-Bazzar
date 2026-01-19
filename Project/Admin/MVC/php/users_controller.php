<?php
require_once "session_check.php";
include "../db/config.php";

if (isset($_GET['action']) && $_GET['action'] == 'block' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "UPDATE users SET status = IF(status='active', 'blocked', 'active') WHERE id = $id";
    mysqli_query($conn, $sql);
    
    header("Location: users_controller.php");
    exit();
}

$sql_customers = "SELECT * FROM users WHERE type='customer'";
$result_customers = mysqli_query($conn, $sql_customers);

$customers = [];
while ($row = mysqli_fetch_assoc($result_customers)) {
    $customers[] = $row;
}

$sql_sellers = "SELECT * FROM users WHERE type='seller'";
$result_sellers = mysqli_query($conn, $sql_sellers);

$sellers = [];
while ($row = mysqli_fetch_assoc($result_sellers)) {
    $sellers[] = $row;
}

mysqli_close($conn);

$data = [
    'customers' => $customers,
    'sellers' => $sellers
];

require_once "../html/users.php";
?>