<?php
session_start(); // Always at the top
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<?php


if (isset($_POST['ID']) && isset($_POST['product_name'])) {
    $product_id = $_POST['ID'];
    $product_name = $_POST['product_name'];

    include "config.php";
    $sql = "UPDATE our_products SET product_name= '$product_name' WHERE ID = '$product_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Product updated successfully.";
    } else {
        echo "Failed to update the product.";
    }
} else {
    echo "Required data not received.";
}


?>