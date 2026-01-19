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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Platform Statistics</title>
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
        <li class="active"><a href="../php/statistics_controller.php">Statistics</a></li>
        <li><a href="../php/orders_controller.php">Manage Orders</a></li>
        <li><a href="../php/users_controller.php">Manage Users & Sellers</a></li>
        <li><a href="../php/products_controller.php">Product Moderation</a></li>
        <li><a href="../php/activity_controller.php">Activity Monitor</a></li>
    </ul>
    </div>

        <div class="main-content">
            <h2>Platform Statistics</h2>
            
            <div class="simple-table">
                <table>
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Count</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Active Users</td>
                            <td><?php echo $data['active_users']; ?></td>
                            <td>Today</td>
                        </tr>
                        <tr>
                            <td>Active Sellers</td>
                            <td><?php echo $data['active_sellers']; ?></td>
                            <td>Today</td>
                        </tr>
                        <tr>
                            <td>Products Listed</td>
                            <td><?php echo $data['total_products']; ?></td>
                            <td>Yesterday</td>
                        </tr>
                        <tr>
                            <td>Pending Orders</td>
                            <td><?php echo $data['pending_orders']; ?></td>
                            <td>Today</td>
                        </tr>
                        <tr>
                            <td>Completed Orders</td>
                            <td><?php echo $data['completed_orders']; ?></td>
                            <td>This Month</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>