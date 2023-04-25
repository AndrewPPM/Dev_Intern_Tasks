<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title> 
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>

    <h1>Logout Successful</h1>

    <form action="login.php" method="post">
        <button type="submit">Login</button>
    </form>
    
</body>
</html>