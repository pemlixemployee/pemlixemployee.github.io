

<?php
    include_once('include/header.php');
?>

<div class="signup-container">
    <h2 class="text-center">Create an Account</h2>
    <form action="savedata.php" method="post" enctype='multipart/form-data'>
      <div class="mb-3">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter your full name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
        <div class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="featured_image" class="form-label">Featured Image</label>
        <input type="file" name="image" class="form-control" id="featured_image" placeholder="Select Your Image" required>
        <div class="form-text">We'll never share your image with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Create a password" required>
        <div class="form-text">Your password must be at least 8 characters long.</div>
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm your password" required>
      </div>
      <button type="submit" name="btn" class="btn btn-primary">Sign Up</button>
    </form>
    <div class="text-center mt-3">
      <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
  </div>

  <?php
     include_once('include/footer.php');
  ?>