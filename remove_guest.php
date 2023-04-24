<!DOCTYPE html>
<html>
<head>
    <title>Remove Guest</title> 
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>

<?php
include "connection.php";

$id = $_POST["id"];

// Get first name of the deleted record
$sql = "SELECT first_name FROM GuestDetails WHERE id='$id'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$first_name = $row["first_name"];

// Delete record from database
$sql = "DELETE FROM GuestDetails WHERE id='$id'";
if (mysqli_query($connection, $sql)) {
    echo "<h1>'$first_name' removed successfully.</h1>";
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}

// Close connection
mysqli_close($connection);
?>

<form action="index.php">
    <button type="submit">Return to Guest List</button>
</form>

</body>
</html>
