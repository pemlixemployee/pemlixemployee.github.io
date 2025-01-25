<?php
session_start(); // Always at the top
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<?php
include_once('include/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 mt-5 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Update Product</h5>
                </div>
                <div class="card-body">
                    <?php
                        include "config.php"; // Database connection

                        $product_id = $_GET['id'];

                        // SQL query to fetch products
                        $sql = "SELECT * FROM our_products WHERE id=$product_id"; // Replace 'our_products' with your actual table name
                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                    
                    ?>
                    <form action="product_update.php" method="post">
                        <!-- Hidden Field for ID -->
                        <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>"/>

                        <!-- Product Name Input -->
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="product_name"
                                name="product_name"
                                placeholder="Enter product name"
                                required
                                
                                 value="<?php echo $row['product_name']?>">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success w-100">Update</button>
                    </form>
                    <?php
                         }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include_once('include/footer.php');
?>
