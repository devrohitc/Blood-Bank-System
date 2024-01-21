<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include('db_connection.php');

    // Get user input
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];

    // Insert data into 'users' table
    $query = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$password', '$user_type')";
    mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);

    // Redirect to login page
    header("Location: hospital_login.html");
    exit();
}
?>
