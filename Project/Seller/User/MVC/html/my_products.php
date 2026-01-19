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
            <h2 align="center">My Products</h2><br>

            <?php if ($error) echo "<p style='color:red; margin:8px;'>$error</p>"; ?>
            <?php if ($message) echo "<p style='color:green; margin:8px;'>$message</p>"; ?>

            <table>
                <tr>
                   
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity (kg)</th>
                    <th>Action</th>
                </tr>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td><?php echo htmlspecialchars($product['category']); ?></td>
                            <td><?php echo htmlspecialchars($product['price']); ?></td>
                            <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                            <td>

                                <form method="post" action="../php/my_products.php" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                    <button type="submit" name="edit_product" style="background-color: rgb(2, 116, 2); color: white; font-weight: bold; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                                        Edit
                                    </button>
                                </form>
                                <form method="post" action="../php/my_products.php" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                    <button type="submit" name="delete_product"
                                        onclick="return confirm('Are you sure you want to delete this product?');" style="background-color:rgba(252, 126, 126, 0.89); color: white; font-weight: bold; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" align="center">No products found.</td>
                    </tr>
                <?php endif; ?>


                
               
              
            </table>

        </div>
    </div>

    <?php include("includes/footer.php"); ?>
</body>

</html>