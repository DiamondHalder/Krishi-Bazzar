<?php
if (!isset($_SESSION))
{
    session_start();
}
$admin_name = isset($_SESSION["admin_name"]) ? $_SESSION["admin_name"] : "Admin";

if (!isset($data)) 
{
    header("Location: ../php/login_controller.php");
    exit();
}

$orders = $data['orders'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Orders</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/statistics.css">
</head>
<body class="dashboard-page">
    <div class="header">
        <div class="user-info">
            <span>Welcome, <?php echo $admin_name; ?></span>
            <a href="../php/logout_controller.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
    <h3>Menu</h3>
    <ul>
        <li><a href="../php/dashboard_controller.php">Dashboard</a></li>
        <li><a href="../php/statistics_controller.php">Statistics</a></li>
        <li class="active"><a href="../php/orders_controller.php">Manage Orders</a></li>
        <li><a href="../php/users_controller.php">Manage Users & Sellers</a></li>
        <li><a href="../php/products_controller.php">Product Moderation</a></li>
        <li><a href="../php/activity_controller.php">Activity Monitor</a></li>
    </ul>
</div>
        
        <div class="main-content">
            <h2>Manage Orders</h2>
            
            <div class="simple-table">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Amount (৳)</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['customer_name']; ?></td>
                            <td><?php echo $order['amount']; ?></td>
                            <td>
                                <?php if ($order['status'] == 'pending'): ?>Pending
                                <?php elseif ($order['status'] == 'confirmed'): ?>Confirmed
                                <?php elseif ($order['status'] == 'delivered'): ?>Delivered
                                <?php else: ?>Cancelled
                                <?php endif; ?>
                            </td>
                            <td><?php echo $order['order_date']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>