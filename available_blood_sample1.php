<!-- available_blood_samples.php -->
<?php
session_start();
include('db_connection.php');

// Check if the user is logged in as a receiver
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'receiver') {
    // Redirect to receiver login page if not logged in as a receiver
    header("Location: receiver_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Blood Samples</title>
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
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            box-sizing: border-box;
            margin: 0 auto;
        }

        h2 {
            color: #F05941;
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

        td a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #BE3144;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center; /* Center align the button text */
        }

        td a:hover {
            background-color: #F05941;
        }

        p {
            margin-top: 20px;
        }

        p a {
            color: #F05941;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Available Blood Samples</h2>
         <!-- Check for the session variable and display the success message -->
         

        <?php
        $query = "SELECT users.username as hospital, blood_samples.blood_group
                  FROM blood_samples
                  INNER JOIN users ON blood_samples.hospital_id = users.id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Hospital</th><th>Blood Group</th><th>Action</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['hospital'] . "</td>";
                echo "<td>" . $row['blood_group'] . "</td>";
                
                // Redirect directly to request_sample.php without eligibility check
                echo "<td><a href='request_sample.php?blood_group=" . $row['blood_group'] . "'>Request Sample</a></td>";

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No available blood samples.</p>";
        }

        mysqli_close($conn);
        ?>

        <?php
        if (isset($_SESSION['request_success']) && $_SESSION['request_success']) {
            echo "<p style='color: green;'>You have successfully submitted a sample request.</p>";
            // Reset the session variable
            unset($_SESSION['request_success']);
        }
        ?>

        <p><a href="index.html">Go back to Home</a></p>
    </div>
</body>
</html>
