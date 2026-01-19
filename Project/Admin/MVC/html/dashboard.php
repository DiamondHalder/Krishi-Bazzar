<?php
if (!isset($data)) 
{
    header("Location: ../php/login_controller.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="../js/confirm.js"></script>
</head>
<body class="dashboard-page">
    <div class="header">
        <div class="user-info">
            <span>Welcome, <?php echo $data['admin_name']; ?></span>
            <a href="../php/logout_controller.php" class="logout-btn">Logout</a>
        </div>
    </div>
 
    <div class="container">
        <div class="sidebar">
            <h3>Menu</h3>
            <ul>
                <li class="active"><a href="../php/dashboard_controller.php">Dashboard</a></li>
                <li><a href="../php/statistics_controller.php">Statistics</a></li>
                <li><a href="../php/orders_controller.php">Manage Orders</a></li>
                <li><a href="../php/users_controller.php">Manage Users & Sellers</a></li>
                <li><a href="../php/products_controller.php">Product Moderation</a></li>
                <li><a href="../php/activity_controller.php">Activity Monitor</a></li>
            </ul>
        </div>
 
        <div class="main-content">
            <div style="margin-top: 20px; padding: 15px; background: #f8f9fa; border: 1px solid #ddd; border-radius: 5px;">
                <button onclick="loadServerTime()" style="background: #3498db; color: white; padding: 8px 15px; border: none; border-radius: 4px;">
                    Server Time
                </button>
                <p id="serverTime" style="margin-top: 10px;"></p>
            </div>
            <br>
            <div class="cards-container">
                
                <div class="card">
                    <h3>Total Users</h3>
                    <p class="number"><?php echo $data['total_users']; ?></p>
                </div>
               
                <div class="card">
                    <h3>Total Sellers</h3>
                    <p class="number"><?php echo $data['total_sellers']; ?></p>
                </div>
               
                <div class="card">
                    <h3>Total Products</h3>
                    <p class="number"><?php echo $data['total_products']; ?></p>
                </div>
               
                <div class="card">
                    <h3>Total Orders</h3>
                    <p class="number"><?php echo $data['total_orders']; ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>