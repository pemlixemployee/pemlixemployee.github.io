<?php
session_start(); // Always at the top
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include_once('include/header.php');
?>



<!-- Add the following CSS to your page -->
<style>

  .blog-title{
    font-size: 30px;
    font-weight: 600;
  }

  .blog-meta{
    font-size: 14px;
  }

  .card-title{
    font-size: 18px;
    font-weight: 600;
    margin: 10px 0;
  }

  .card-text{
    font-size: 14px;
  }

  .author-details .card-body{
    font-size: 12px;
  }

  .blog-post {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    margin-bottom: 20px;
  }

  .blog-image {
    width: 120px; /* Smaller image size */
    height: 120px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 20px; /* Space between image and content */
  }

  .blog-post-body {
    flex: 1;
  }

  .blog-post-title {
    font-size: 1.50rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
  }

  .blog-post-excerpt {
    font-size: 12px;
    color: #666;
    margin-bottom: 15px;
  }

  .read-more {
    font-size: 12px;
    font-weight: 500;
    color: #007bff;
    text-decoration: none;
  }

  .read-more:hover {
    text-decoration: underline;
  }

  /* Pagination */
  .pagination .page-item.disabled .page-link {
    color: #ccc;
  }

  .pagination .page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
  }
</style>


<?php
// Retrieve the blog ID from the URL
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];

    include "admin/config.php"; // Include the database connection
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

<!-- Blog Header -->
<header class="blog-header text-center py-5 text-white" style="background-color: #004AAD;">
  <h1 class="blog-title display-4"><?php echo $row['title']; ?></h1>
  <p class="blog-meta">Published on: <strong><?php echo date("F j, Y", strtotime($row['created_at'])); ?></strong> | Author: <strong><?php echo $row['author']; ?></strong></p>
</header>

<!-- Blog Content -->
<div class="container my-5">
  <div class="row">
    <!-- Blog Image on the Left -->
    <div class="col-md-5 mb-4">
      <img src="admin/assets/images/blog_images/<?php echo $row['image']; ?>" alt="Blog Image" class="img-fluid rounded-4 shadow-lg">
    </div>

    <!-- Blog Text Content on the Right -->
    <div class="col-md-7">
      <div class="card shadow-lg border-0">
        <div class="card-body">
          <h4 class="card-title">Blog Content</h4>
          <p class="card-text"><?php echo nl2br($row['description']); ?></p>
        </div>
      </div>

      <!-- Author Details -->
      <div class="author-details mt-4">
        <div class="card border-0">
          <div class="card-body">
            <p><strong>Written by:</strong> <?php echo $row['author']; ?></p>
            <p><strong>Contact:</strong> <?php echo $row['contact']; ?></p>
          </div>
        </div>
      </div>

      <!-- Back to Blog List -->
      <a href="blogs.php" class="btn mt-4" style="font-size: 1.1rem; padding: 10px 20px;background-color: #004AAD;color:white;"><i class="fa fa-arrow-left"></i> Back to Blog List</a>
    </div>
  </div>
</div>
<div>

</div>
<br></br>

<h3 class="ms-5 ps-5">Related Products</h3>

<!-- Blog Content -->
<div class="container my-5">
  <?php
  // Include the database connection
  include "admin/config.php";

  // Set the number of blogs per page
  $blogs_per_page = 3;

  // Get the current page number from the query string, default to 1 if not set
  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

  // Calculate the starting row for the SQL query
  $start_from = ($current_page - 1) * $blogs_per_page;

  // Query to fetch blogs with a LIMIT for pagination
  $sql = "SELECT * FROM blogs LIMIT $start_from, $blogs_per_page";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // Start the blog display container
      echo '<div class="row">';
      
      // Loop through each blog and display it
      while ($row = mysqli_fetch_assoc($result)) {
          // Blog ID, Title, Excerpt, Image Path, etc.
          $blog_id = $row['id'];
          $title = $row['title'];
          $excerpt = substr($row['description'], 0, 100); // Get the first 100 characters as an excerpt
          $image_path = 'admin/assets/images/blog_images/' . $row['image']; // Assuming images are stored in this directory
          
          echo '<div class="col-md-4 mb-4">'; // Added bottom margin for spacing
          echo '  <div class="blog-post d-flex">'; // Flexbox to align image and content
          echo '    <img src="' . $image_path . '" alt="' . $title . '" class="img-fluid blog-image">'; // Smaller image
          echo '    <div class="blog-post-body">';
          echo '      <h5 class="blog-post-title">' . $title . '</h5>';
          echo '      <p class="blog-post-excerpt">' . $excerpt . '...</p>';
          echo '      <a href="view_blog.php?id=' . $blog_id . '" class="read-more" style="color:#004AAD;">Read More</a>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
      }
      
      echo '</div>'; // End the row
  } else {
      echo "<p>No blogs found!</p>";
  }

  // Query to get the total number of blogs for pagination
  $sql_total = "SELECT COUNT(*) FROM blogs";
  $result_total = mysqli_query($conn, $sql_total);
  $row_total = mysqli_fetch_array($result_total);
  $total_blogs = $row_total[0];

  // Calculate the total number of pages
  $total_pages = ceil($total_blogs / $blogs_per_page);
  ?>

  
</div>



<?php
include_once('include/footer.php');
?>
