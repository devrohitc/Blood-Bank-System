<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver Dashboard</title>
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
    <div class="container">
        <h2>Receiver Dashboard</h2>

        <!-- PHP logic to handle login -->
        <?php
        session_start();

        // Check if the user is logged in
        if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'receiver') {
            echo "<p class='welcome-message'>Welcome, " . $_SESSION['username'] . "!</p>";
        } else {
            // Redirect to login page if not logged in as a receiver
            header("Location: receiver_login.html");
            exit();
        }
        ?>

        <!-- Add action buttons -->
        <div class="action-buttons">
            <a href="available_blood_sample1.php">Available Blood Samples</a>
            <!-- Add more buttons as needed -->
        </div>

        <!-- Add links to User Profile and Logout -->
        <div class="user-links">
            <a href="user_profile.php">View Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
