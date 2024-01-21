<!-- login_page.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank System - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Blood Bank System - Login</h2>

        <div class="user-type">
            <a href="?login=hospital">Hospital Login</a>
            <a href="?login=receiver">Receiver Login</a>
        </div>

        <?php
        // Display any error messages here (if needed)
        ?>

        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="hidden" name="user_type" value="<?php echo isset($_GET['login']) ? $_GET['login'] : ''; ?>">

            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="?register=hospital">Register as Hospital</a> or <a href="?register=receiver">Register as Receiver</a></p>
    </div>
</body>
</html>
