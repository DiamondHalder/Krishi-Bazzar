<?php
if (!isset($_SESSION)) 
{
    session_start();
}
$admin_name = isset($_SESSION["admin_name"]) ? $_SESSION["admin_name"] : "Admin";

if (!isset($data)) {
    header("Location: ../php/login_controller.php");
    exit();
}

$products = $data['products'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Moderation</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/statistics.css">
    <link rel="stylesheet" href="../css/users.css">
    <link rel="stylesheet" href="../css/products.css">
    <script src="../js/confirm.js"></script>
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
                <li><a href="../php/orders_controller.php">Manage Orders</a></li>
                <li><a href="../php/users_controller.php">Manage Users & Sellers</a></li>
                <li class="active"><a href="../php/products_controller.php">Product Moderation</a></li>
                <li><a href="../php/activity_controller.php">Activity Monitor</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h2>Product Moderation</h2>
            
            <div class="simple-table">
                <table>
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Seller ID</th>
                            <th>Price (৳)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count = 1;
                        foreach ($products as $product): 
                        ?>
                        <tr>
                            <td>P<?php echo $count; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td>S<?php echo $product['seller_id']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td>
                                <?php if ($product['status'] == 'pending'): ?>Pending
                                <?php elseif ($product['status'] == 'approved'): ?>Approved
                                <?php else: ?>Rejected
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($product['status'] != 'approved'): ?>
                                    <a href="../php/products_controller.php?action=approve&id=<?php echo $product['id']; ?>" class="action-btn">Approve</a>
                                <?php endif; ?>
                                    <a href="../php/products_controller.php?action=remove&id=<?php echo $product['id']; ?>" 
                                    class="action-btn delete"
                                    onclick="return confirmAction('Are you sure you want to remove this product?')">Remove</a>
                            </td>
                        </tr>
                        <?php 
                        $count++;
                        endforeach; 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>