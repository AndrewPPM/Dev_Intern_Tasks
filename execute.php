<?php
include "connection.php";

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];

if ($first_name == '' || $last_name == '' || $email == '' || $mobile == '') {
  header("Location: add_guest.php");
} 
// Insert data into database
$sql = "INSERT INTO GuestDetails (first_name, lastname, email, mobile, enrolled_date) 
        VALUES ('$first_name', '$last_name', '$email', '$mobile', NOW())";
// Test connection to insert into database
  if (mysqli_error($connection)) {
  echo "Error: " . mysqli_error($connection);
  } else {
  echo "Data inserted successfully <br>";
}
// Message to know if record was created
if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
    
// Close connection
mysqli_close($connection);

?>
