<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<div class="navbar">
    <div class="nav-left">
        <img src="../images/plogo.png" alt="Krishi Bazaar Logo">
        <strong>Krishi Bazaar</strong>
    </div>
    <div>
        <?php if(isset($_SESSION['user_role'])): ?>
            <a href="../php/logout.php">Logout</a>
        <?php endif; ?>
    </div>
</div>
