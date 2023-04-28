<?php
// Session Management
session_start();

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Guest Removal</title> 
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>
<?php
include "connection.php";

$id = $_GET["id"];

// Delete record from database
$sql = "DELETE FROM GuestDetails WHERE id='$id'";

if (mysqli_query($connection, $sql)) {
    echo "<h1>Guest removed successfully.</h1>";
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}

// Close connection
mysqli_close($connection);
?>

<form action="index.php">
    <button type="submit">Home</button>
</form>

</body>
</html>