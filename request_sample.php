<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['blood_group'])) {
    // Check if the user is logged in as a receiver
    if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'receiver') {
        // Include database connection
        include('db_connection.php');

        // Get receiver ID and blood group from session
        $receiver_id = $_SESSION['user_id'];
        $blood_group = $_GET['blood_group'];

        // Insert request into a 'requests' table (you may customize the table structure)
        $query = "INSERT INTO requests (receiver_id, blood_group) VALUES ('$receiver_id', '$blood_group')";
        mysqli_query($conn, $query);

        // Close database connection
        mysqli_close($conn);

        // Set a session variable to indicate successful submission
        $_SESSION['request_success'] = true;

        // Redirect to the 'Available Blood Samples' page or desired page
        header("Location: available_blood_sample1.php");
        exit();
    } else {
        // Redirect to login page if not logged in as a receiver
        header("Location: receiver_login.html");
        exit();
    }
} else {
    // Redirect to the 'Available Blood Samples' page if no blood group is specified
    header("Location: available_blood_sample1.php");
    exit();
}
?>
