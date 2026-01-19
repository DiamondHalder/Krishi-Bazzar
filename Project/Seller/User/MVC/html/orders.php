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
            <h2 align="center">Customer Orders</h2><br>

            <?php if (!empty($message)): ?>
                <p style="color:green; margin:8px;"><?php echo $message; ?></p>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
        <p style="color:red; background: #fff5f5; padding: 10px; border: 1px solid red;"><?php echo $error; ?></p>
    <?php endif; ?>

            <table>
                <tr>
                    <th>Cart Id</th>
                    <th>Customer Id</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php if (!empty($orders)): ?>

                    <?php foreach ($orders as $order): ?>

                        <tr>
                            <td><?php echo htmlspecialchars($order['cart_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['customer_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                            <td>
                                ৳<?php echo $order['price'] * $order['quantity']; ?>
                            </td>
                            <td><?php echo ucfirst($order['status']); ?></td>
                            <td>
                                <?php if ($order['status'] === 'pending'): ?>
                                    <form method="post" action="../php/orders.php" style="display: inline;">
                                        <input type="hidden" name="cart_id" value="<?= $order['cart_id'] ?>">
                                        <input type="hidden" name="product_id" value="<?= $order['product_id'] ?>">
                                        <input type="hidden" name="quantity" value="<?= $order['quantity'] ?>">
                                        <button type="submit" name="confirm" style="background-color: rgb(2, 116, 2); color: white; font-weight: bold; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Confirm</button>
                                    </form>

                                    <form method="post" action="../php/orders.php" style="display: inline;">
                                        <input type="hidden" name="cart_id" value="<?= $order['cart_id'] ?>">
                                        <input type="hidden" name="product_id" value="<?= $order['product_id'] ?>">

                                        <button type="submit" name="decline" style="background-color:rgba(252, 126, 126, 0.89); color: white; font-weight: bold; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Decline</button>
                                    </form>
                                <?php else: ?>
                                    <em>No Action</em>
                                <?php endif; ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </table>

        </div>

    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>