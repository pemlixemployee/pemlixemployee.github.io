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


<div class="container-fluid p-4" style="margin-left: 0px;">
    <h1 class="mb-4">Contacts</h1>

    <!-- Responsive Table -->
    <div class="table-responsive">
        <?php
        include "config.php"; // Database connection

        // SQL query to fetch products
        $sql = "SELECT contacts.ID, contacts.first_name, contacts.last_name, contacts.contact_number,
                    contacts.email, contacts.post_code, our_products.product_name as product_name, contacts.created_at
             FROM contacts JOIN our_products ON contacts.product_id = our_products.id";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        ?>
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Email ID</th>
                        <th>Post Code</th>
                        <th>Product Name</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['contact_number']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['post_code']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                
                                <a href="delete-contacts.php?id=<?php echo $row['ID']; ?>" class="btn delete-btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?>?');">Delete</a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            <?php
        }
            ?>
            </table>
    </div>
</div>




<?php

include_once('include/footer.php');
?>