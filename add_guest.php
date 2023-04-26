<?php
// Session management
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
    <title>Add Guest</title> 
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>

    <h1>Add Guest</h1>

    <form action="save_guest.php" method="post">
        <label for="name">First Name</label>
        <input type="text" id="first_name" name="first_name">

        <label for="name">Last Name</label>
        <input type="text" id="last_name" name="last_name">

        <label for="name">Email</label>
        <input type="text" id="email" name="email">

        <label for="name">Mobile</label>
        <input type="text" id="mobile" name="mobile">

        <button type="submit" name="submit">Submit</button>
         
    </form>
</body>
</html>