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

    <!-- Main Content -->
    <div class="container-fluid p-4" style="margin-left: 250px;">
      <h1>Welcome to Your Dashboard</h1>
      <p>Here is the content for your dashboard.</p>
    </div>

<?php
     include_once('include/footer.php');
?>