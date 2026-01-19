<?php
if (!isset($_SESSION)) {
    session_start();
}
$admin_name = isset($_SESSION["admin_name"]) ? $_SESSION["admin_name"] : "Admin";

if (!isset($data)) 
{
    header("Location: ../php/login_controller.php");
    exit();
}

$customers = $data['customers'];
$sellers = $data['sellers'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users & Sellers</title>
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
        <li class="active"><a href="../php/users_controller.php">Manage Users & Sellers</a></li>
        <li><a href="../php/products_controller.php">Product Moderation</a></li>
        <li><a href="../php/activity_controller.php">Activity Monitor</a></li>
    </ul>
</div>

        <div class="main-content">
            <h2>Manage Users & Sellers</h2>
            
            <div class="section">
                <h3>Users (Customers)</h3>
                <div class="simple-table">
                    <table>
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach ($customers as $customer): 
                            ?>
                            <tr>
                                <td>U<?php echo $count; $count++; ?></td>
                                <td><?php echo $customer['username']; ?></td>
                                <td><?php echo $customer['email']; ?></td>
                                <td>
                                    <?php if ($customer['status'] == 'active'): ?>Active
                                    <?php else: ?>Blocked
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="../php/users_controller.php?action=block&id=<?php echo $customer['id']; ?>" 
                                        class="action-btn delete"
                                        onclick="return confirmAction('Are you sure you want to block/unblock this user?')">
                                        <?php if ($customer['status'] == 'active'): ?>Block
                                        <?php else: ?>Unblock
                                        <?php endif; ?>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="section">
                <h3>Sellers (Farmers)</h3>
                <div class="simple-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Seller ID</th>
                                <th>Shop Name</th>
                                <th>Owner</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            foreach ($sellers as $seller): 
                            ?>
                            <tr>
                                <td>S<?php echo $count; $count++; ?></td>
                                <td><?php echo $seller['shop_name']; ?></td>
                                <td><?php echo $seller['owner_name']; ?></td>
                                <td>
                                    <?php if ($seller['status'] == 'active'): ?>Active
                                    <?php else: ?>Blocked
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="../php/users_controller.php?action=block&id=<?php echo $seller['id']; ?>" 
                                    class="action-btn delete"
                                    onclick="return confirmAction('Are you sure you want to block/unblock this user?')">
                                        <?php if ($seller['status'] == 'active'): ?>Block
                                        <?php else: ?>Unblock
                                        <?php endif; ?>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>