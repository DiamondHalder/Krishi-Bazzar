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

    <div class="profile-box">
        <h2 align="center">My Profile</h2><br>

        <?php if (!empty($message)) echo "<div class='message' style='color:green; margin:8px;'>$message</div>"; ?>
        <?php if (!empty($error)) echo "<div class='message' style='color:red; margin:8px; font-weight:bold;'>$error</div>"; ?>
        <form method="post" class="profile-form">

            <div class="profile-grid">
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($seller['name'] ?? '') ?>">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($seller['email'] ?? '') ?>">
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="<?= htmlspecialchars($seller['phone'] ?? '') ?>">
                </div>
                <div>
                    <label for="shop_name">Shop Name</label>
                    <input type="text" name="shop_name" value="<?= htmlspecialchars($seller['shop_name'] ?? '') ?>">
                </div>
                <div>
                    <label for="address">Address</label>
                    <textarea name="address"><?= htmlspecialchars($seller['address'] ?? '') ?></textarea>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter new password to update">
                </div>
            </div>

            <div style="margin-top:10px;text-align:center;">
                <button type="submit" name="update_profile" style="width: 100%;">Update Profile</button>
            </div>

        </form>

    </div>

</div>

<?php include("includes/footer.php"); ?>
</body>
</html>
