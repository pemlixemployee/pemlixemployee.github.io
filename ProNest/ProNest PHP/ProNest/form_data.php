<?php

    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cus_fname = $_POST['firstname'];
    $cus_lname = $_POST['lastname'];
    $cus_contact = $_POST['contact'];
    $cus_email = $_POST['email'];
    $cus_post_code = $_POST['post_code'];
    $pname = $_POST['pname'];

    include "admin/config.php";

    $sql = "INSERT INTO contacts (first_name, last_name, contact_number, email, post_code, product_id) 
            VALUES ('$cus_fname', '$cus_lname', '$cus_contact', '$cus_email', '$cus_post_code', '$pname')";

    if (mysqli_query($conn, $sql)) {
        echo 'success';
    } else {
        echo 'error';
    }
}



?>