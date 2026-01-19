<?php
require_once("../php/seller_auth.php");
include("../db/db.php");

$error = "";
$message = "";

$seller_id = $_SESSION['seller_id'];
$product_id = $_GET['product_id'] ?? NULL;

if (empty($product_id)){
    die("Invalid product access.");
}
$sql = "SELECT * FROM products WHERE product_id = '$product_id' AND seller_id = '$seller_id'";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
if (!$product) {
    die("Product not found.");
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'])) {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $price = trim($_POST['price']);
    $quantity = trim($_POST['quantity']);

    if (empty($name) || empty($category) || empty($price) || empty($quantity)) {
        $error = "All fields are required.";
    } elseif (!is_numeric($price) || !is_numeric($quantity) || $price < 0 || $quantity < 0) {
        $error = "Price and Quantity must be non-negative numbers.";
    } else {
        $updateSql = "UPDATE products SET name = '$name', category = '$category', price = '$price', quantity = '$quantity' WHERE product_id = '$product_id' AND seller_id = '$seller_id'";
        if ($conn->query($updateSql)) {
            $message = "Product updated successfully.";
        } else {
            $error = "Update Failed: " . $conn->error;
        }


        
    }
}   
include("../html/edit_products.php");