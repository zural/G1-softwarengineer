<?php
// Database connection details
$servername = "localhost";
$username = "admin";  // Your XAMPP MySQL username
$password = "12345678";  // Your XAMPP MySQL password
$dbname = "G1"; // Your database name

// Create the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
