<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the connection file to connect to the database
include 'connection.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Execute a SELECT query to retrieve the user's data from the database
    $query = "SELECT * FROM Users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    // Check if the username exists in the database
    if (mysqli_num_rows($result) == 1) {
        // Retrieve the user's data from the database
        $row = mysqli_fetch_assoc($result);

        // Check if the password matches
        if (password_verify($password, $row['password'])) {
            // Login successful, redirect to index.php
            header('Location: index.php');
            exit();
        } else {
            // Login failed, show an error message
            echo "Entered password: $password <br>";
            echo "Stored password: {$row['password']} <br>";
            $error = 'Invalid password.';
        }
    } else {
        // Login failed, show an error message
        $error = 'Invalid username.';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.statically.io/gh/HoangTuan110/subreply-css/main/subreply.css">

    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
