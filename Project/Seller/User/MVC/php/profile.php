<?php
require_once("../php/seller_auth.php");
include("../db/db.php");  


$seller_id = $_SESSION['seller_id'];


$message = "";
$error= "";
$sql=$conn->query("SELECT * FROM sellers WHERE seller_id = '$seller_id'");
$seller=$sql->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $name= $_POST['name'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $shop_name = $_POST['shop_name'];
    $address= $_POST['address'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $update_sql = "UPDATE sellers SET name='$name', email='$email', phone='$phone', shop_name='$shop_name', address='$address', password='$hashed_password' WHERE seller_id='$seller_id'";
    if($conn->query($update_sql)){
        $message = "Profile updated successfully";
        $res = $conn->query("SELECT * FROM sellers WHERE seller_id = '$seller_id'");
        $seller = $res->fetch_assoc();
    } else {
        $error = "Error updating profile: " . $conn->error;
    }
    

    
    $_SESSION['seller'] = $seller;
}


include("../html/profile.php");
