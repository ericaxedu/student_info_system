<?php
$host = "localhost";  // XAMPP runs MySQL locally
$user = "root";       // Default MySQL username
$password = "";       // No password (leave blank)
$dbname = "ipt2_midterm_project"; // Your database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected!";
}
?>