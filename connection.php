<?php
$host="localhost";
$user="root";
$password="";
$database="GuestHouseDB";

$connection=mysqli_connect($host,$user,$password,$database);

// Check if connection was successful
if (mysqli_connect_errno()) {
    die("EConnection error: " . mysqli_connect_error());
} 

?>