<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in as a hospital
    if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'hospital') {
        // Include database connection
        include('db_connection.php');

        // Get hospital ID and blood group from session
        $hospital_id = $_SESSION['user_id'];
        $blood_group = $_POST['blood_group'];

        // Insert data into 'blood_samples' table
        $query = "INSERT INTO blood_samples (hospital_id, blood_group) VALUES ('$hospital_id', '$blood_group')";
        mysqli_query($conn, $query);

        // Close database connection
        mysqli_close($conn);

        // Redirect to hospital dashboard or desired page
        header("Location: hospital_dashboard.php");
        exit();
    } else {
        // Redirect to login page if not logged in as a hospital
        header("Location: hospital_login.html");
        exit();
    }
}
?>
