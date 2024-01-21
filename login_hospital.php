<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include('db_connection.php');

    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve hospital data from 'users' table
    $query = "SELECT * FROM users WHERE username='$username' AND user_type='hospital'";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_type'] = $row['user_type'];

            // Redirect to hospital dashboard
            header("Location: hospital_dashboard.php");
            exit();
        } else {
            echo "<p class='error'>Invalid password</p>";
        }
    } else {
        echo "<p class='error'>Hospital not found</p>";
    }

    // Close database connection
    mysqli_close($conn);
}
?>
