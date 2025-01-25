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
    <h1 class="mb-4">Add Blog</h1>
    <form id="blogForm" enctype="multipart/form-data">
        <div class="row">
            <!-- Blog Title -->
            <div class="col-md-12 mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" required>
            </div>

            <!-- Author Name -->
            <div class="col-md-6 mb-3">
                <label for="author" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="product_id" class="form-label">Our Products</label>
                <?php
                include "config.php";
                $sql = "SELECT * FROM our_products";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                if (mysqli_num_rows($result) > 0) {
                    echo '<select class="form-control form-select" name="product_id" id="product_id" required>
                            <option value="" selected disabled>Select Product</option>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['ID']}'>{$row['product_name']}</option>";
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
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Blog Contact -->
            <div class="col-md-6 mb-3">
                <label for="contact" class="form-label">Author Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter author contact" required>
            </div>
        </div>

        <!-- Blog Content -->
        <div class="mb-3">
            <label for="content" class="form-label">Blog Content</label>
            <textarea class="form-control" id="content" name="content" rows="6" placeholder="Write your blog content here..." required></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Add Blog</button>
        </div>
    </form>

    <!-- Success and Failure Messages -->
    <div class="mt-4">
        <div class="alert alert-success d-none" id="successMessage" role="alert">
            Blog added successfully!
        </div>
        <div class="alert alert-danger d-none" id="failureMessage" role="alert">
            Failed to add the blog. Please try again.
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#blogForm").on("submit", function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Validate the form manually if needed (additional checks)
            let formData = new FormData(this);

            $.ajax({
                url: "save_blog_data.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.trim() === "success") {
                        $("#successMessage").removeClass("d-none").fadeIn();
                        $("#failureMessage").addClass("d-none");

                        // Reset the form
                        $("#blogForm")[0].reset();
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
