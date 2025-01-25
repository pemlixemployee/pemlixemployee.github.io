<?php
session_start(); // Always at the top
if (!isset($_SESSION['email']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<?php
    // Include database connection
    include_once('config.php');

    // Check if the form is submitted
    if(isset($_POST['btn'])) {
        // Retrieve form data
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $image = $_FILES['image']['name']; // Get image name
        $password = $_POST['password'];

        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Upload image (optional)
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Image uploaded successfully
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        // Insert query
        $sql = "INSERT INTO users (full_name, email, feature_img, password) 
                VALUES ('$fullname', '$email', '$image', '$hashed_password')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
?>
