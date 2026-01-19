<?php
include("includes/header.php");
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head.php"); ?>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
   <section class="hero">
    <div class="hero-content">
        <h1>Welcome to Krishi Bazaar</h1>
        <p>Your trusted digital marketplace for fresh agricultural products</p>
        
        <div class="hero-buttons">
            <?php if (isset($_SESSION['seller_id'])): ?>
                <a href="../php/seller_dashboard.php" class="btn primary">Go to Dashboard</a>
            <?php else: ?>
                <a href="../html/login.php" class="btn primary">Login</a>
            <?php endif; ?>
            <a href="../html/register.php" class="btn secondary">Register</a>
        </div>
    </div>
</section>

    <section class="features">
        <h2>Why Choose Krishi Bazaar?</h2>
        <div class="feature-box">
            <div class="feature">
                <h3>Direct from Farmers</h3>
                <p>Buy fresh products directly from verified sellers.</p>
            </div>
            </div>
    </section>

    <section class="how-it-works">
    <h2>How It Works</h2>
    <div class="steps">
        <div class="step">Browse Products</div>
        <div class="step">Add to Cart</div>
        <div class="step">Confirm Order</div>
        <div class="step">Fast Delivery</div>
    </div>
</section>

<section class="cta">
    <h2>Start Selling or Buying Today</h2>
    <p>Join thousands of farmers and customers on Krishi Bazaar</p>
    <a href="../php/register.php" class="btn primary">Get Started</a>
</section>

    <?php include("includes/footer.php"); ?>

</body>

</html>