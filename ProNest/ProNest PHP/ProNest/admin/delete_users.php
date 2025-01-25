<?php
session_start(); // Always at the top
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include "config.php"; // Database connection

// Check if user ID is passed in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: users.php");
    exit();
}

$user_id = $_GET['id'];

// Check if the user exists before deletion
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "User not found.";
    exit();
}

// Delete the user from the database
$sql_delete = "DELETE FROM users WHERE user_id = ?";
$stmt_delete = $conn->prepare($sql_delete);
$stmt_delete->bind_param("i", $user_id);

if ($stmt_delete->execute()) {
    header("Location: users.php?msg=User deleted successfully");
    exit();
} else {
    echo "Error deleting user.";
}
?>
