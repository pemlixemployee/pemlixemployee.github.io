<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    echo "Unauthorized access!";
    exit();
}

include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $product_id = $_POST['product_id'];
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Update query
    $query = "UPDATE blogs SET title = '$title', author = '$author', product_id = '$product_id', contact = '$contact', description = '$content'";

    // Check if a new image is uploaded
    if (!empty($image)) {
        $target_dir = "assets/images/blog_images/";
        $target_file = $target_dir . basename($image);

        // Upload the new image
        if (move_uploaded_file($image_tmp, $target_file)) {
            $query .= ", image = '$image'";
        } else {
            echo "Image upload failed!";
            exit();
        }
    }

    $query .= " WHERE id = '$blog_id'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        
        echo "success";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
?>
