<?php
require_once("seller_auth.php"); 
include("../db/db.php");

$message = "";
$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = trim($_POST["name"]);
    $category = trim($_POST["category"]);
    $price = trim($_POST["price"]);
    $quantity = trim($_POST["quantity"]);

    $seller_id = $_SESSION["seller_id"] ?? null;

    if(empty($seller_id)){
        $error = "Unauthorized access.";
    } elseif($name=="" || $category=="" || $price=="" || $quantity==""){
        $error = "All fields are required.";
    } elseif (!is_numeric($price) || $price <= 0){
        $error = "Enter a valid price.";
    } elseif (!is_numeric($quantity) || $quantity < 1){
        $error = "Enter a valid quantity.";
    } else {

       $sql = "INSERT INTO products (seller_id, name, category, price, quantity) VALUES ('$seller_id', '$name', '$category', '$price', '$quantity')";
         if($conn->query($sql)){
              $message = "Product added successfully.";
         } else {
              $error = "Database Error: " . $conn->error;
         }
    }
}


include("../html/add_product.php");


