<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head.php"); ?>
</head>

<body>

    <?php include("includes/header.php"); ?>

    <div class="container">

        <div class="sidebar">
            <a href="seller_dashboard.php">Dashboard</a>
            <a href="add_product.php">Add Product</a>
            <a href="my_products.php">My Products</a>
            <a href="orders.php">Orders</a>
            <a href="earnings.php">Seller Earnings</a>
            <a href="profile.php">Profile</a>
        </div>

        <div class="profile-box">
            <h2 align="center">Edit Product</h2><br>

           <?php if (!empty($error)): ?>
            <div class="message" style="color:red; margin:8px;">
                <?= $error ?>
            </div>
        <?php endif; ?>

         <?php if (!empty($message)): ?>
            <div class="message" style="color:green; margin:8px;">
                <?= $message ?>
            </div>
        <?php endif; ?>


            <form method="post" class="profile-form">
                <label>Product Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
                
                <label>Category</label>
                <select name="category">
                    <option>Grains</option>
                    <option>Vegetables</option>
                    <option>Fruits</option>
                </select>

                <label>Price (per kg)</label>
                <input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">

                <label>Quantity (kg)</label>
                <input type="number" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>">
                <div style="margin-top:10px;text-align:center;">
                    <button type="submit" name="update_product" style="width:200px; padding:10px 0;">Update Product</button>
                </div>

            </form>
        </div>

    </div>

    <?php include("includes/footer.php"); ?>

</body>

</html>