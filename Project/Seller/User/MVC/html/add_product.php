<?php include("includes/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php"); ?>
</head>
<body>

<div class="container">

    <div class="sidebar">
        <a href="seller_dashboard.php">Dashboard</a>
        <a href="add_product.php">Add Product</a>
        <a href="my_products.php">My Products</a>
        <a href="orders.php">Orders</a>
        <a href="earnings.php">Seller Earnings</a>
        <a href="profile.php">Profile</a>
    </div>

    <div class="content">
        <h2 align="center" >Add New Product</h2><br>

        <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
        <?php if($message) echo "<p style='color:green;'>$message</p>"; ?>

        <div class="profile-box">
            <form method="post" action="../php/add_product.php" class="profile-form">
                <label>Product Name</label>
                <input type="text" name="name">

                <label>Category</label>
                <select name="category" >
                    <option value="">Select</option>
                    <option value="Vegetables">Vegetables</option>
                    <option value="Fruits">Fruits</option>
                    <option value="Grains">Grains</option>
                </select>

                <label>Price (per kg)</label>
                <input type="number" name="price">

                <label>Quantity (kg)</label>
                <input type="number" name="quantity">

                <br>
                <button type="submit">Add Product</button>
            </form>
        </div>

    </div>

</div>

<?php include("includes/footer.php"); ?>
</body>
</html>
