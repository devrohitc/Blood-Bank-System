<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include('db_connection.php');

    // Get user input
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = $_POST['user_type'];
    $blood_group = $_POST['blood_group'];

    // Insert data into 'users' table
    $query = "INSERT INTO users (username, password, user_type, blood_group) VALUES ('$username', '$password', '$user_type', '$blood_group')";
    mysqli_query($conn, $query);

    // Close database connection
    mysqli_close($conn);

    // Redirect to login page
    header("Location: receiver_login.html");
    exit();
}
?>
