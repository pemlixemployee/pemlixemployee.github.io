<?php
include_once('include/header.php');
?>

<body>
<style>
  p{
    font-size: 14px;
  }
  .blog-header {
    background-color: #f8f9fa;
    padding: 30px 0;
    text-align: center;
  }
  .blog-title {
    font-weight: 600;
    font-size: 2.5rem; /* Larger font for the title */
  }
  .blog-post {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 30px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    background-color: #fff;
  }
  .blog-post:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
  }
  .blog-post img {
    width: 100%;
    height: 300px; /* Set height to make it square with container */
    object-fit: cover; /* Ensures the image fits within the square */
  }
  .blog-post-body {
    padding: 20px;
  }
  .blog-post-title {
    font-weight: 600;
    font-size: 1.75rem; /* Larger font for the blog post titles */
    margin-bottom: 10px;
    color: #333;
  }
  .blog-post-excerpt {
    color: #555;
    font-size: 1.1rem; /* Larger font for the excerpt */
    margin-bottom: 15px;
  }
  .read-more {
    color: #007bff;
    font-weight: 500;
    font-size: 1rem; /* Larger font for "Read More" links */
    text-decoration: none;
  }
  .read-more:hover {
    text-decoration: underline;
  }
  .pagination {
    justify-content: center;
    margin-top: 30px;
  }
  .pagination .page-item {
    margin: 0 5px;
  }
  .pagination .page-link {
    color: #007bff;
    border-radius: 5px;
    padding: 10px 15px;
  }
  .pagination .page-item.active .page-link {
    background-color: #007bff;
    color: white;
  }
  .pagination .page-item.disabled .page-link {
    color: #aaa;
  }
</style>

<!-- Header -->
<header class="blog-header">
  <h1 class="blog-title">Blog</h1>
  <p>Explore our latest blogs on energy savings, insulation tips, and more to keep your home efficient and comfortable.</p>
</header>

<!-- Blog Content -->
<div class="container my-5">
  <?php
  // Include the database connection
  include "admin/config.php";

  // Pagination setup
  $blogs_per_page = 2; // Number of blogs per page
  $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
  if ($current_page < 1) $current_page = 1;

  // Calculate the starting row for SQL query
  $start_from = ($current_page - 1) * $blogs_per_page;

  // Fetch blogs for the current page
  $sql = "SELECT * FROM blogs LIMIT $start_from, $blogs_per_page";
  $result = mysqli_query($conn, $sql);

  // Fetch total blog count
  $sql_total = "SELECT COUNT(*) as total_blogs FROM blogs";
  $result_total = mysqli_query($conn, $sql_total);
  $row_total = mysqli_fetch_assoc($result_total);
  $total_blogs = $row_total['total_blogs'];

  // Calculate total pages
  $total_pages = ceil($total_blogs / $blogs_per_page);

  if (mysqli_num_rows($result) > 0) {
      echo '<div class="row d-flex flex-wrap justify-content-between">';
      while ($row = mysqli_fetch_assoc($result)) {
          $blog_id = $row['id'];
          $title = $row['title'];
          $excerpt = substr($row['description'], 0, 100); // Get the first 100 characters
          $image_path = 'admin/assets/images/blog_images/' . $row['image'];

          echo '<div class="col-md-5 mb-4">'; // 2 blogs per row
          echo '  <div class="blog-post">';
          echo '    <img src="' . $image_path . '" alt="' . $title . '" class="img-fluid">';
          echo '    <div class="blog-post-body">';
          echo '      <h5 class="blog-post-title">' . $title . '</h5>';
          echo '      <p class="blog-post-excerpt">' . $excerpt . '...</p>';
          echo '      <a href="view_blog.php?id=' . $blog_id . '" class="read-more">Read More</a>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
      }
      echo '</div>'; // End row
  } else {
      echo "<p>No blogs found!</p>";
  }
  ?>

  <!-- Pagination -->
  <nav aria-label="Blog Pagination">
    <ul class="pagination">
      <!-- Previous Button -->
      <li class="page-item <?php if ($current_page <= 1) echo 'disabled'; ?>">
        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" tabindex="-1">Previous</a>
      </li>

      <!-- Page Numbers -->
      <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
          <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
      <?php endfor; ?>

      <!-- Next Button -->
      <li class="page-item <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
      </li>
    </ul>
  </nav>
</div>

</body>

<?php
include_once('include/footer.php');
?>
