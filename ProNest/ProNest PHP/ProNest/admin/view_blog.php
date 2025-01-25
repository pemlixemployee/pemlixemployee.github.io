<?php
session_start(); // Always at the top
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include_once('include/header.php');
?>

<?php
// Retrieve the blog ID from the URL
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];

    include "config.php";
    // Fetch the blog data from the database
    $sql = "SELECT * FROM blogs WHERE id = $blog_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Blog not found!";
        exit();
    }
} else {
    echo "Invalid Blog ID!";
    exit();
}
?>

<!-- Blog Page -->
<div class="container my-5">
    <div class="row">
        <!-- Blog Image -->
        <div class="col-md-4 mb-4">
            <img src="assets/images/blog_images/<?php echo $row['image']; ?>" alt="Blog Image" class="img-fluid rounded-3">
        </div>

        <!-- Blog Content -->
        <div class="col-md-8">
            <h1 class="mb-4"><?php echo $row['title']; ?></h1>
            <p><strong>Author:</strong> <?php echo $row['author']; ?></p>
            <p><strong>Published on:</strong> <?php echo $row['created_at']; ?></p>
            <p><strong>Contact:</strong> <?php echo $row['contact']; ?></p>

            <div class="blog-content">
                <p><?php echo nl2br($row['description']); ?></p>
            </div>

            
        </div>
        <a href="blogs.php" class="btn btn-primary mt-4" style="width:200px;"><i class="fa fa-arrow-left"></i> Back to Blog List</a>
    </div>
    
</div>


<?php
include_once('include/footer.php');
?>
