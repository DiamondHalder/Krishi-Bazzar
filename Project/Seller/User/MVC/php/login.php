<?php
session_start();
include("../db/db.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email == "" || $password == "") {
        $error = "Email and Password required.";
     
    } else {
        $sql = "SELECT * FROM sellers WHERE email ='$email'";
        $result = $conn->query($sql);

        if($result->num_rows ==1){
            $seller = $result->fetch_assoc();

            if (password_verify($password, $seller['password'])){
                $_SESSION['user_role'] = "seller";
                $_SESSION['seller_id'] = $seller['seller_id'];
                $_SESSION['seller_email'] = $seller['email'];

                setcookie("user_role", "seller", time()+ 3600, "/");
                setcookie("user_email", $seller['email'], time()+ 3600, "/");

                header("Location: ../php/seller_dashboard.php");
                exit();

            }else{
                $error = "Incorrect Password.";
            }

            
        }else{
            $error="Seller not found.";
        }

        

        
    }
}

if ($error != "") {
$_SESSION['login_error'] = $error;
header("Location: ../html/login.php");
exit();
}
?>