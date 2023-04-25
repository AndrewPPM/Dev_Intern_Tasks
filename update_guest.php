<?php
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
    <title>Update Guest</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>

<?php

// Display Details to be edited of user selected.
// Fix confirm_update to display changed details.

include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Update record in database
    $sql = "UPDATE GuestDetails SET first_name='$first_name', lastname='$last_name', email='$email', mobile='$mobile' WHERE id='$id'";
    mysqli_query($connection, $sql);
}

// Retrieve record from database
$id = $_GET["id"];

// Check if id is empty or not a number
if (empty($id) || !is_numeric($id)) {
    echo "Invalid id";
    exit;
}

$sql = "SELECT * FROM GuestDetails WHERE id='$id'";
$result = mysqli_query($connection, $sql);

// Debug statement to print the value of $sql
echo "SQL query: " . $sql . "<br>";

// Check if query was successful and returned a row
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Record not found";
    exit;
}

$row = mysqli_fetch_assoc($result);

// Check if the row was fetched successfully
if (!$row) {
    echo "Error: could not fetch row";
    exit;
}

?>

<h1>Update Guest</h1>

<form action="confirm_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    First Name: <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $row['lastname']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Mobile: <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"><br><br>
    <button type="submit">Update</button>
</form>

<?php
// Close connection
mysqli_close($connection);
?>

</body>
</html>
