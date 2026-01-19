<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php"); ?>
</head>
<body>

<div class="container">

    <div class="sidebar">
        <a href="../php/seller_dashboard.php">Dashboard</a>
        <a href="../php/add_product.php">Add Product</a>
        <a href="../php/my_products.php">My Products</a>
        <a href="../php/orders.php">Orders</a>
        <a href="../php/earnings.php">Seller Earnings</a>
        <a href="../php/profile.php">Profile</a>
    </div>

    <div class="content">
        <h2 align="center">Seller Earnings</h2><br>
<?php if (!empty($error)): ?>
            <p style="color:red; margin:8px;"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (!empty($earnings)): ?>

        <table>
            <tr>
                <th>Earning Id</th>
                <th>Order Id</th>
                <th>Amount</th>
                <th>Date</th>
                
            </tr>
            <?php foreach($earnings as $e): ?>
            <tr>
                <td><?php echo htmlspecialchars($e['earning_id']); ?></td>
                <td><?php echo htmlspecialchars($e['order_id']); ?></td>
                <td>৳<?php echo htmlspecialchars($e['amount']); ?></td>
                <td><?php echo htmlspecialchars($e['created_at']); ?></td>
            </tr>
            <?php endforeach; ?>

            <tr style="font-weight:bold; background: white">
                <td colspan="2" align="right">Total Earnings:</td>
                <td colspan="2">৳<?php echo $total_earnings; ?></td>

            </tr>             
        </table>
        <?php else: ?>
            <p>No Earnings Yet.</p>
        <?php endif; ?>
    </div>

</div>

<?php include("includes/footer.php"); ?>
</body>
</html>
