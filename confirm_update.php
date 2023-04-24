<!DOCTYPE html>
<html>
<head>
    <title>Confirm Update</title> 
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
</head>
<body>
<?php
    include "connection.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST["id"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        
        $sql = "UPDATE GuestDetails SET first_name='$first_name', lastname='$last_name', email='$email', mobile='$mobile' WHERE id='$id'";
        mysqli_query($connection, $sql);
        
        $sql = "SELECT * FROM GuestDetails WHERE id='$id'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>

<h1>Guest Updated</h1>
<p>First Name: <?php echo $row["first_name"]; ?></p>
<p>Last Name: <?php echo $row["lastname"]; ?></p>
<p>Email: <?php echo $row["email"]; ?></p>
<p>Mobile: <?php echo $row["mobile"]; ?></p>

<form action="update_guest.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="first_name" value="<?php echo $row['first_name']; ?>">
    <input type="hidden" name="last_name" value="<?php echo $row['lastname']; ?>">
    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
    <input type="hidden" name="mobile" value="<?php echo $row['mobile']; ?>">
    <button type="submit">Edit</button>
</form>

<form action="index.php">
    <button type="submit">Return to Guest List</button>
</form>

<?php
    mysqli_close($connection);
?>
</body>
</html>
