<?php
session_start();

// Destroy all session data
session_unset(); 
session_destroy();

// Redirect to login page (adjust path or filename as needed)
header('Location: index.php');
exit;
?>
