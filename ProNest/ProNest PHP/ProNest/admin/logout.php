<?php
// Start the session to access session variables
session_start();

// Destroy the session
session_unset();      // Removes all session variables
session_destroy();    // Destroys the session

// Redirect to the login page
header("Location: login.php");
exit();
?>
