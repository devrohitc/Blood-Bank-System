<!-- hospital_dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard</title>
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
            padding: 12px;
            text-decoration: none;
            color: #fff;
            background-color: #BE3144;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .action-buttons a:hover {
            background-color: #BE3144;
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
        <h2>Hospital Dashboard</h2>

        <!-- PHP logic to handle login -->
        <?php
        session_start();

        // Check if the user is logged in
        if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'hospital') {
            echo "<p class='welcome-message'>Welcome, " . $_SESSION['username'] . "!</p>";
        } else {
            // Redirect to login page if not logged in as a hospital
            header("Location: hospital_login.html");
            exit();
        }
        ?>

        <!-- Add action buttons -->
        <div class="action-buttons">
            <a href="add_blood_info.html">Add Blood Information</a>
            <!-- Add more buttons as needed -->
            <a href="view_requests.php">View Requests</a> <!-- Add this line -->
        </div>

        <!-- Add links to User Profile and Logout -->
        <div class="user-links">
            <!-- Update the link to redirect to hospital_profile.php -->
            <a href="user_profile.php">View Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
