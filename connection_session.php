<?php
// Session management
session_start();

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

include "connection.php";

// Get the user's information from the database based on the user ID in the session
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM Users WHERE id = '$user_id'";
$result = mysqli_query($connection, $sql);

// If user is found, set $username to user's name
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
} else {
    $username = "Unknown User";
}

// Display the logged-in user's information
echo "<div style='position: fixed; top: 0; right: 0;'>Welcome, $username! <a href='logout.php'>Logout</a></div>";
?>