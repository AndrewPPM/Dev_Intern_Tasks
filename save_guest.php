<?php

include "connection_session.php";

?>

<!DOCTYPE html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
}
?>
<html>
<head>
    <title>Save Guest</title> 
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>

    <h1>Save Guest</h1>

    <?php
        echo "<h1> '$first_name' added successfully.</h1>";
    ?>

    <form action="index.php" method="post">
        <input type="hidden" name="first_name" value="<?php echo $_POST['first_name']; ?>">
        <input type="hidden" name="lastname" value="<?php echo $_POST['lastname']; ?>">
        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
        <input type="hidden" name="mobile" value="<?php echo $_POST['mobile']; ?>">
        <button type="submit">Home</button>
    </form>
    
</body>
</html>
