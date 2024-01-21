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

        <!-- PHP logic to fetch and display available blood samples -->
        <?php
        // Include database connection
        include('db_connection.php');

        // Retrieve data from 'blood_samples' table
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

                // Check if the user is a receiver
                if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'receiver') {
                    // Add a "Request Sample" button
                    echo "<td><a class='request-button' href='";

                    // Check if the user is logged in
                    if (isset($_SESSION['user_id'])) {
                        // If logged in, provide the request_sample link
                        echo "request_sample.php?blood_group=" . $row['blood_group'];
                    } else {
                        // If not logged in, redirect to receiver login page
                        echo "receiver_login.html";
                    }

                    echo "'>Request Sample</a></td>";
                } else {
                    // If not a receiver, display a message
                    echo "<td>Only receivers can request samples</td>";
                }

                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p>No available blood samples.</p>";
        }

        // Close database connection
        mysqli_close($conn);
        ?>

        <p><a href="index.html">Go back to Home</a></p>
    </div>
</body>
</html>
