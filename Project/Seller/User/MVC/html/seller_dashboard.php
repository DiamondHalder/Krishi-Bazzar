<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head.php"); ?>
</head>

<body>

    <?php include("includes/header.php"); ?>

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
            <h2 align="center">Seller Dashboard</h2><br>

            <div align="center" class="card-container">
                <div class="card" style="background-color: #e3f2fd; border-left: 5px solid #2196f3; padding: 20px; border-radius: 8px;">
                    <h3>Total Orders</h3>
                    <p style="font-size: 24px; color: #1976d2; font-weight: bold;"><?php echo $totalOrders; ?></p>
                </div>

                <div class="card" style="background-color: #fff3e0; border-left: 5px solid #ff9800; padding: 20px; border-radius: 8px;">
                    <h3>Pending Orders</h3>
                    <p style="font-size: 24px; color: #ff9800; font-weight: bold;"><?php echo $pendingOrders; ?></p>
                </div>

                <div class="card" style="background-color: #e8f5e9; border-left: 5px solid #4caf50; padding: 20px; border-radius: 8px;">
                    <h3>Total Sales</h3>
                    <p style="font-size: 24px; color: #4caf50; font-weight: bold;">৳<?php echo number_format($totalSales, 2); ?></p>
                </div>
            </div>

            <div align="center" style="margin-top: 30px;">
                <button type="button" onclick="loadCharts()">Refresh to show charts</button>
            </div>

            <div class="analytics-row">
                <div class="graph-box" id="orderBox" style="display: none;">
                    <h3>Orders Income </h3>
                    <div id="barChartContainer"></div>
                </div>
                <div class="graph-box" id="productBox" style="display: none;">
                    <h3>Product Prices</h3>
                    <div id="lineGraphContainer"></div>
                </div>
            </div>

        </div>
    </div>




        <script src="../js/dashboard_charts.js"></script>

        <?php include("includes/footer.php"); ?>

</body>

</html>