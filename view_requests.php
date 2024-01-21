<?php
// Start the session
session_start();

// Include database connection
include('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital View Requests</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your main stylesheet here -->
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
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            box-sizing: border-box;
            margin: 0 auto;
        }

        h2 {
            color: black;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #BE3144;
            color: #fff;
        }

        td {
            background-color: #F5F5F5; /* Light gray background for table cells */
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
        <h2>Hospital View Requests</h2>

        <!-- PHP logic to fetch and display requests for a particular blood group -->
        <?php
        // Check if the user is logged in as a hospital
        if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'hospital') {
            // Get hospital ID from session
            $hospital_id = $_SESSION['user_id'];

            // Retrieve data from 'requests' table for the hospital's blood bank
            $query = "SELECT users.username as receiver, requests.blood_group
                      FROM requests
                      INNER JOIN users ON requests.receiver_id = users.id
                      INNER JOIN blood_samples ON LOWER(requests.blood_group) = LOWER(blood_samples.blood_group)
                      WHERE blood_samples.hospital_id = '$hospital_id'";
            $result = mysqli_query($conn, $query);

            // Check for SQL errors
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            // Check if there are rows in the result set
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>Receiver</th><th>Blood Group</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['receiver'] . "</td>";
                    echo "<td>" . $row['blood_group'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No requests for blood samples.";
            }
        } else {
            // Redirect to login page if not logged in as a hospital
            header("Location: hospital_login.html");
            exit();
        }

        // Close database connection
        mysqli_close($conn);
        ?>

        <!-- Use a form to create a button for navigating back to the dashboard -->
        <form action="hospital_dashboard.php" method="get">
            <button type="submit" class="action-buttons">Go back to Dashboard</button>
        </form>
    </div>
</body>
</html>
