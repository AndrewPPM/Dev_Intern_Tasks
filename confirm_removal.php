<?php

include "connection_session.php";

?>

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

$id = $_POST["id"];

// Get first name of the deleted record
$sql = "SELECT * FROM GuestDetails WHERE id='$id'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$id = $_POST["id"];
$first_name = isset($row["first_name"]) ? $row["first_name"] : '';
$last_name = isset($row["lastname"]) ? $row["lastname"] : '';
$email = isset($row["email"]) ? $row["email"] : '';
$mobile = isset($row["mobile"]) ? $row["mobile"] : '';

// Display guest to be deleted
if (mysqli_query($connection, $sql)) {
    echo "<h1>$first_name<br>$last_name<br>$email<br>$mobile<br><br> will be removed!</h1>";
} else {
    echo "Error deleting record: " . mysqli_error($connection);
}

// Close connection
mysqli_close($connection);
?>

<form action="remove_guest.php">
    <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
    <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
    <input type="hidden" name="lastname" value="<?php echo $last_name; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="mobile" value="<?php echo $mobile; ?>">
    <button type="submit">Confirm</button>
</form>
<form action="index.php">
    <button type="submit">Cancel</button>
</form>

</body>
</html>