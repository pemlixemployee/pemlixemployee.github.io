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

<!-- Main Content -->
<div class="container-fluid p-4" style="margin-left: 0px;">
    <h1>Product Page</h1>

    <div class="container-fluid">
        <div class="row mt-4">
            <!-- Left Section: Add Product -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Add Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="productName"
                                    name="product_name"
                                    placeholder="Enter product name"
                                    required="required">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Add Product</button>
                        </form>
                    </div>
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Include database connection
                    include "config.php";

                    // Sanitize and validate user input
                    if (isset($_POST['product_name']) && !empty(trim($_POST['product_name']))) {
                        $products_name = mysqli_real_escape_string($conn, trim($_POST['product_name']));

                        // Check for duplicate entry
                        $check_sql = "SELECT * FROM our_products WHERE product_name = '$products_name'";
                        $check_result = mysqli_query($conn, $check_sql);

                        if (mysqli_num_rows($check_result) > 0) {
                            // Duplicate entry found
                            echo '<div class="alert alert-warning text-center">Product already exists. Please use a different name.</div>';
                        } else {
                            // Insert the product if no duplicate is found
                            $sql = "INSERT INTO our_products (product_name) VALUES ('$products_name')";
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                echo '<div class="alert alert-success text-center">Product added successfully!</div>';
                            } else {
                                echo '<div class="alert alert-danger text-center">Failed to add product. Please try again later.</div>';
                            }
                        }
                    } else {
                        // Validation error message
                        echo '<div class="alert alert-warning text-center">Product name cannot be empty. Please provide a valid product name.</div>';
                    }
                }
                ?>
            </div>



            <!-- Right Section: Product View Table -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Product List</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        include "config.php"; // Database connection

                        // SQL query to fetch products
                        $sql = "SELECT * FROM our_products"; // Replace 'our_products' with your actual table name
                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                        if ($result && mysqli_num_rows($result) > 0) {
                        ?>
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch and display each product row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                            <!-- Ensure column name matches database -->
                                            <td>
                                                <a href="edit_product.php?id=<?php echo $row['ID']; ?>" class="btn edit-btn btn-sm btn-warning">Edit</a>
                                                <a href="delete-inline.php?id=<?php echo $row['ID']; ?>" class="btn delete-btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product <?php echo $row['product_name']; ?>?');">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                                
                        <?php
                        } else {
                            // Display a message if no products are found
                            echo '<div class="alert alert-warning text-center">No products found.</div>';
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