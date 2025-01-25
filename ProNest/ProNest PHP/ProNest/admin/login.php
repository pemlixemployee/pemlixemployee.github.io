<?php


// Start session to manage user login
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pemlix</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="assets/css/style.css"><!--css file included-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><!--Bootstrap5 included-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><!--Bootstrap5 included-->

  <!--fonts include-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!--font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!--jQuery include-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- // new link  -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

  <!--bootstrap3 include-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

 <!-- Bootstrap 5 JS (Bundle with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 
</head>


<body>

<div class="login-container">
    <h2 class="text-center">Login</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>

    <div class="text-center mt-3">
        <a href="#">Forgot your password?</a>
    </div>
    <div class="text-center mt-2">
        <p>Don't have an account? <a href="sign_up.php">Sign up</a></p>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>   


<script src="js/myScript.js"></script><!--js file included-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</body>
</html>


<?php


// Login functionality
if (isset($_POST['login'])) {
    include "config.php"; // Database connection

    // Sanitize user inputs to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // User input password

    // SQL query to validate user credentials
    $sql = "SELECT email, password, role FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store session data
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];

            // Check user role and redirect accordingly
            if ($_SESSION['user_role'] === 'admin') {
                header("Location: index.php");  // Admin dashboard
            } else {
                header("Location: /ProNest/index.php");  // Non-admin users
            }
            exit();
        } else {
            // Invalid credentials for admin
            echo '<div class="alert alert-danger text-center">Invalid email or password.</div>';
        }

    } else {
        // Invalid email or password
        echo '<div class="alert alert-danger text-center">Email-Id and Password are not matched.</div>';
    }
}
?>
