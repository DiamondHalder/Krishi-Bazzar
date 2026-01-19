<?php
require_once "session_check.php";
include "../db/config.php";

if (isset($_GET['action']) && isset($_GET['id'])) 
{
    $id = $_GET['id'];
    
    if ($_GET['action'] == 'approve') 
    {
        $sql = "UPDATE products SET status = 'approved' WHERE id = $id";
    } 
    elseif ($_GET['action'] == 'remove') 
    {
        $sql = "DELETE FROM products WHERE id = $id";
    }
    
    mysqli_query($conn, $sql);
    header("Location: products_controller.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

$products = [];
while ($row = mysqli_fetch_assoc($result)) 
{
    $products[] = $row;
}

mysqli_close($conn);

$data = ['products' => $products];
require_once "../html/products.php";
?>