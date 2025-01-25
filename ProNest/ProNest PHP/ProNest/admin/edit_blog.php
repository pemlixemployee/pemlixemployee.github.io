<?php
session_start(); // Always at the top
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include "config.php";

// Fetch the blog data to edit
$blog_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$blog_id) {
    echo "No blog ID provided!";
    exit();
}

$sql = "SELECT * FROM blogs WHERE id = '$blog_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Blog not found!";
    exit();
}

$blog = mysqli_fetch_assoc($result);

include_once('include/header.php');
?>

<div class="container-fluid p-4 px-5" style="margin-left: 0px;">
    <h1 class="mb-4">Edit Blog</h1>
    <form id="editBlogForm" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $blog['id'] ?>">
        <div class="row">
            <!-- Blog Title -->
            <div class="col-md-12 mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $blog['title'] ?>" required>
            </div>

            <!-- Author Name -->
            <div class="col-md-6 mb-3">
                <label for="author" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="author" name="author" value="<?= $blog['author'] ?>" required>
            </div>

            <!-- Product -->
            <div class="col-md-6 mb-3">
                <label for="product_id" class="form-label">Our Products</label>
                <?php
                $sql = "SELECT * FROM our_products";
                $product_result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                if (mysqli_num_rows($product_result) > 0) {
                    echo '<select class="form-control form-select" name="product_id" id="product_id" required>
                            <option value="" disabled>Select Product</option>';
                    while ($row = mysqli_fetch_assoc($product_result)) {
                        $selected = $blog['product_id'] == $row['ID'] ? "selected" : "";
                        echo "<option value='{$row['ID']}' $selected>{$row['product_name']}</option>";
                    }
                    echo "</select>";
                }
                ?>
            </div>
        </div>

        <div class="row">
            <!-- Blog Image -->
            <div class="col-md-6 mb-3">
                <label for="image" class="form-label">Blog Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <img src="assets/images/blog_images/<?= $blog['image'] ?>" alt="Blog Image" class="mt-2" width="100">
            </div>

            <!-- Blog Contact -->
            <div class="col-md-6 mb-3">
                <label for="contact" class="form-label">Author Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?= $blog['contact'] ?>" required>
            </div>
        </div>

        <!-- Blog Content -->
        <div class="mb-3">
            <label for="content" class="form-label">Blog Content</label>
            <textarea class="form-control" id="content" name="content" rows="6" required><?= $blog['description'] ?></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update Blog</button>
        </div>
    </form>

    <!-- Success and Failure Messages -->
    <div class="mt-4">
        <div class="alert alert-success d-none" id="successMessage" role="alert">
            Blog updated successfully!
        </div>
        <div class="alert alert-danger d-none" id="failureMessage" role="alert">
            Failed to update the blog. Please try again.
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#editBlogForm").on("submit", function (e) {
            e.preventDefault(); // Prevent the default form submission

            let formData = new FormData(this);

            $.ajax({
                url: "update_blog_data.php", // Backend script to handle updates
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.trim() === "success") {
                        $("#successMessage").removeClass("d-none").fadeIn();
                        $("#failureMessage").addClass("d-none");
                    } else {
                        $("#failureMessage").removeClass("d-none").fadeIn();
                        $("#successMessage").addClass("d-none");
                    }
                },
                error: function () {
                    $("#failureMessage").removeClass("d-none").fadeIn();
                    $("#successMessage").addClass("d-none");
                },
            });
        });
    });
</script>

<?php
include_once('include/footer.php');
?>
