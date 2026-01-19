<?php
if (!isset($view_data)) 
{
    $view_data = ['error' => '', 'username' => ''];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-box">
            <?php if (!empty($view_data['error'])): ?>
                <div style="color: red; margin-bottom: 15px; padding: 10px; background: #ffe6e6; border-radius: 5px;">
                    <?php echo $view_data['error']; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="../php/login_controller.php">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username"  value="<?php echo htmlspecialchars($view_data['username']); ?>" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>