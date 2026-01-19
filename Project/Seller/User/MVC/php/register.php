<?php
session_start();


include("../db/db.php");

$success = "";
$error = "";
$nameError = $emailError = $phoneError = $shopError = $addressError = $passwordError = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {


    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $shop_name = trim($_POST['shop_name']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);

    if (empty($name)) {
        $nameError = "Name is required.";
    } elseif (!preg_match("/^[A-Za-z][A-Za-z .-]*$/", $name)) {
        $nameError = "Name must start with a letter";
    } elseif (str_word_count($name) < 2) {
        $nameError = "Name must contain at least 2 words";
    }

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }
    if (empty($phone)) {
        $phoneError = "Phone number is required.";
    }
    if (empty($shop_name)) {
        $shopError = "Shop name is required.";
    }
    if (empty($address)) {
        $addressError = "Address is required.";
    }
    if (empty($password)) {
        $passwordError = "Password is required.";
    } elseif (strlen($password) < 6) {
        $passwordError = "Password must be at least 6 characters long.";
    } elseif (!preg_match("/[A-Za-z]/", $password)) {
        $passwordError = "Password must contain at least one letter";
    }

    if (
        empty($nameError) && empty($emailError) && empty($phoneError) &&
        empty($shopError) && empty($addressError) && empty($passwordError)
    ) {

        /* ====== Email duplicate check ====== */
        $checkSql = "SELECT seller_id FROM sellers WHERE email='$email'";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            $error = "Email is already registered";
        } else {

            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO sellers 
            (name, email, phone, shop_name, address, password)
            VALUES 
            ('$name', '$email', '$phone', '$shop_name', '$address', '$hashPassword')";

            if ($conn->query($sql)) {
                $success = "Registration successful! You can now log in.";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}

include("../html/register.php");
