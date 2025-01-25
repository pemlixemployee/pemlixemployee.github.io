<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $blog_pro_id = $_POST['product_id'];
    $blog_title = $_POST['title'];
    $blog_author = $_POST['author'];
    $blog_contact = $_POST['contact'];
    $blog_content = $_POST['content'];

    $blog_image = $_FILES['image']['name'];
    $target_dir = "assets/images/blog_images/";
    $target_file = $target_dir . basename($blog_image);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO blogs (product_id, title, description, author, contact, image) 
                VALUES ('$blog_pro_id', '$blog_title', '$blog_content', '$blog_author', '$blog_contact', '$blog_image')";

        if (mysqli_query($conn, $sql)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
}
?>
