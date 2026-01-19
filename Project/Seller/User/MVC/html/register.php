<?php include("../html/includes/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include("../html/includes/head.php"); ?>
</head>
<body>

<div class="container">

    <div class="profile-box">
        <h2 align="center">Seller Registration</h2><br>

        <!-- Success message -->
        <?php if (!empty($success)): ?>
            <div class="message" style="color:green; margin:8px; border: 1px solid green; padding: 5px;">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <!-- Error message -->
        <?php if (!empty($error)): ?>
            <div class="message" style="color:red; margin:8px; border: 1px solid red; padding: 5px;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="../php/register.php" class="profile-form">

            <div class="profile-grid">
                <!-- Name -->
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
                    <span style="color:red;"><?php echo isset($nameError) ? $nameError : ''; ?></span>
                </div>

                <!-- Email -->
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                    <span style="color:red;"><?php echo isset($emailError) ? $emailError : ''; ?></span>
                </div>

                <!-- Phone -->
                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>
                    <span style="color:red;"><?php echo isset($phoneError) ? $phoneError : ''; ?></span>
                </div>

                <!-- Shop Name -->
                <div>
                    <label>Shop Name</label>
                    <input type="text" name="shop_name" value="<?php echo isset($shop_name) ? htmlspecialchars($shop_name) : ''; ?>" required>
                    <span style="color:red;"><?php echo isset($shopError) ? $shopError : ''; ?></span>
                </div>

                <!-- Address -->
                <div>
                    <label>Address</label>
                    <textarea name="address" required><?php echo isset($address) ? htmlspecialchars($address) : ''; ?></textarea>
                    <span style="color:red;"><?php echo isset($addressError) ? $addressError : ''; ?></span>
                </div>

                <!-- Password -->
                <div>
                    <label>Password</label>
                    <input type="password" name="password" required>
                    <span style="color:red;"><?php echo isset($passwordError) ? $passwordError : ''; ?></span>
                </div>
            </div>

            <div style="margin-top:10px;text-align:center;">
                <button type="submit" name="register" style="width: 100%;">Register</button>
            </div>

        </form>

        <p style="text-align:center; margin-top:10px;">
            Already have an account?
            <a href="../html/login.php">Login</a>
        </p>

    </div>

</div>

<?php include("../html/includes/footer.php"); ?>
</body>
</html>
