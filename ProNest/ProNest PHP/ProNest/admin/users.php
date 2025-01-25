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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Users</h1>
        <a href="sign_up.php" type="button" class="btn btn-success">Add User/Admin</a>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Users List</h5>
            </div>
            <div class="card-body">
                <?php
                include "config.php"; // Database connection

                // SQL query to fetch users
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                if ($result && mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>User ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch and display each user row
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                                    <td>
                                        <a href="edit_users.php?id=<?php echo $row['user_id']; ?>" 
                                           class="btn btn-sm btn-warning">Edit</a>
                                        <a href="delete_users.php?id=<?php echo $row['user_id']; ?>" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Are you sure you want to delete this user: <?php echo htmlspecialchars($row['full_name']); ?>?');">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                    // Display a message if no users are found
                    echo '<div class="alert alert-warning text-center">No users found.</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once('include/footer.php');
?>
