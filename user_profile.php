<!-- user_profile.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        header {
            background-color: #BE3144;
            padding: 20px;
            text-align: center;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            color: black;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .welcome-message {
            color: #555;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }

        .action-buttons a {
            display: block;
            padding: 10px 15px; /* Slightly smaller buttons */
            text-decoration: none;
            color: #fff; /* Use the specified color */
            background-color: #BE3144; /* Background color to white initially */
            border: 2px; /* Border color */
            border-radius: 5px;
            transition: background-color 0.3s ease;
            
        }

        .action-buttons a:hover {
            background-color: #F05941; /* Change to specified color on hover */
            color: #fff; /* Text color on hover */
        }

        .user-links {
            margin-top: 20px;
        }

        .user-links a {
            color: #F05941;
            text-decoration: none;
            margin: 0 10px;
        }

        .user-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<header style="position: fixed; width: 100%; top: 0; background-color: #BE3144; padding: 20px; text-align: center; z-index: 1000; display: flex; justify-content: space-between; align-items: center; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
    <h1 style="color: #fff; margin: 10px;">Blood Bank</h1>
    <div style="margin-right: 20px;"> <!-- Adjust the margin as needed -->
        <!-- Your logo or additional content can go here -->
    </div>
</header>
    <div class="container">
        <h2>User Profile</h2>

        <!-- PHP logic to fetch and display user profile information -->
        <?php
        // Include database connection
        include('db_connection.php');

        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Retrieve user data from 'users' table
            $query = "SELECT * FROM users WHERE id='$user_id'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                // Display user profile information
                echo "<p><strong>Username:</strong> " . $row['username'] . "</p>";
                echo "<p><strong>User Type:</strong> " . $row['user_type'] . "</p>";
                echo "<p><strong>Blood Group:</strong> " . $row['blood_group'] . "</p>";
            } else {
                echo "User not found.";
            }
        } else {
            // Redirect to login page if not logged in
            header("Location: index.html");
            exit();
        }

        // Close database connection
        mysqli_close($conn);
        ?>

        <!-- <p><a href="index.html">Go back to Home</a></p> -->
        <form action="index.html" method="get">
            <button type="submit" class="action-buttons">Go back to Home</button>
        </form>
    </div>
</body>
</html>




