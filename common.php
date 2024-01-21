<!-- common.php -->
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood_bank_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if a user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to get the user type
function getUserType() {
    return isset($_SESSION['user_type']) ? $_SESSION['user_type'] : null;
}
?>
