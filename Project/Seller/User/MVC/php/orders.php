<?php
require_once("seller_auth.php");
include("../db/db.php");


$seller_id = $_SESSION['seller_id'];
$message = "";
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $cart_id = $_POST['cart_id'] ?? NULL;
     $product_id = $_POST['product_id'] ?? NULL;
     $quantity = $_POST['quantity'] ?? NULL;

     if (isset($_POST['confirm'])) {


          $cartRes = $conn->query("SELECT customer_id FROM cart WHERE cart_id='$cart_id'");
          $cartData = $cartRes->fetch_assoc();
          $customer_id = $cartData['customer_id'] ?? NULL;

          $priceRes = $conn->query("SELECT price FROM products WHERE product_id='$product_id' AND seller_id='$seller_id' ");

          $priceRow = $priceRes->fetch_assoc();

          if ($priceRow && $customer_id) {
              
               $amount = $priceRow['price'] * $quantity;

               $insertOrder = $conn->query("INSERT INTO orders (customer_id, seller_id, product_id, quantity, total_price, status) 
                                            VALUES ('$customer_id', '$seller_id', '$product_id', '$quantity', '$amount', 'confirmed')");
               
               if ($insertOrder) {
                    
                    $new_order_id = $conn->insert_id;

                    
                    $insertEarnings = $conn->query("INSERT INTO earnings (seller_id, order_id, amount) VALUES ('$seller_id', '$new_order_id', '$amount')");

                    if ($insertEarnings) {
                       
                         $conn->query("UPDATE cart SET status='shipped' WHERE cart_id='$cart_id'");
                         $conn->query("UPDATE products SET quantity = quantity - $quantity WHERE product_id='$product_id'");
                         
                         $message = "Order confirmed and moved to earnings successfully.";
                    } else {
                         $error = "Earnings Error: " . $conn->error;
                    }
               } else {
                    $error = "Orders Table Error: " . $conn->error;
               }

          } else {
               $error = "Error: Could not retrieve order or price details.";
          }

          

          
     }

     if (isset($_POST['decline'])) {

          $conn->query("UPDATE cart SET status='declined' WHERE cart_id='$cart_id' ");

          $message = "Order canceled successfully.";
     }
}

$sql = "SELECT c.cart_id, c.customer_id, c.quantity, c.status, p.product_id, p.name AS product_name, p.price,(p.price * c.quantity) AS total_price FROM cart c JOIN products p ON c.product_id = p.product_id WHERE p.seller_id = '$seller_id' AND c.status = 'pending' ";

$result = $conn->query($sql);
$orders = [];
while ($row = $result->fetch_assoc()) {
     $orders[] = $row;
}


include("../html/orders.php");
