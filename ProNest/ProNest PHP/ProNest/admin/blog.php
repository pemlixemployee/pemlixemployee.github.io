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
<div class="container-fluid p-4 px-5" style="margin-left: 0px;">
<div class="d-flex justify-content-between align-items-center">
    <h1 class="mb-4">Blogs</h1>
    <a href="add_blog.php" class="btn btn-success">Add Blog</a>
</div>

    
    <!-- Table to display blogs -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Contact</th>
                    <th>Image</th>
                    <th style="width:120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "config.php";

                $sql = "SELECT * FROM blogs ORDER BY id DESC"; // Fetch blogs
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['title']}</td>
                                <td>{$row['author']}</td>
                                <td>{$row['contact']}</td>
                                <td>
                                    <img src='assets/images/blog_images/{$row['image']}' alt='Blog Image' class='img-thumbnail' style='max-width: 100px;'>
                                </td>
                                <td class='d-flex'>
                                    <a href='view_blog.php?id={$row['id']}' class='btn btn-sm btn-primary me-2'>View</a>
                                    <a href='edit_blog.php?id={$row['id']}' class='btn btn-sm btn-primary me-2'>Edit</a>
                                    <a href='delete_blog.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No blogs found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once('include/footer.php');
?>
