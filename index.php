<!DOCTYPE html>
<html>
<head>
    <title>Guest List</title> 
    <style type="text/css">
        table{
            border-collapse: collapse;
            width: 100%;
            color: #000000;
            font-family: monospace;
            font-size: 15px;
            text-align: left;
        }
        /* New style to position the "Add" button */
        #addButtonContainer {
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px;
        }
    </style>
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.statically.io/gh/HoangTuan110/subreply-css/main/subreply.css">
</head>
<body>
    <h1>Guest List</h1>
    <div id="addButtonContainer">
        <form action='add_guest.php' method='post'>
            <input type='hidden' name='id'>
            <button type='submit'>Add</button>
        </form>
    </div>

<?php
include "connection.php";

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    // Insert data into database
    $sql = "INSERT INTO GuestDetails (first_name, lastname, email, mobile, enrolled_date) 
        VALUES ('$first_name', '$last_name', '$email', '$mobile', NOW())";

    if (mysqli_query($connection, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
    
    // Database select to show table
    $sql = "SELECT id, first_name, lastname, email, mobile, enrolled_date FROM GuestDetails";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Table header
        echo "<table>
                <tr>
                    <th>Edit</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Enrolled Date</th>
                    <th>Delete</th>
                </tr>";

        // Table rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>
                        <form action='update_guest.php' method='post'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <button type='submit'>Edit</button>
                        </form>
                    </td>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["lastname"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["mobile"] . "</td>
                    <td>" . $row["enrolled_date"] . "</td>
                    <td>
                        <form action='remove_guest.php' method='post'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <button type='submit'>Delete</button>
                        </form>
                    </td>
                </tr>";
        }

        // Close table
        echo "</table>";
    } else {
        echo "0 results";
    }


    
// Close connection
mysqli_close($connection);

?>
</table>
</body>
</html>