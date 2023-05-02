<?php

include "connection_session.php";

?>


<!DOCTYPE html>
<html>
<head>
    <title>Guest List</title> 
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.statically.io/gh/HoangTuan110/subreply-css/main/subreply.css">
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
            top: 30;
            right: 0;
            margin: 10px;
        }
        /* New style for the add button */
        .add_button {
            display: inline-block;
            padding: 5px 10px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        /* New style for the edit button */
        .edit_button {
            display: inline-block;
            padding: 5px 10px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        /* New style for the delete button */
        .delete_button {
            display: inline-block;
            padding: 5px 10px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }


    </style>
</head>
<body>
    <h1>Guest List</h1>
    <div id="addButtonContainer">
        <form action='add_guest.php' method='post'>
            <input type='hidden' name='id'>
            <button type='submit' class='add_button'>Add</button>
        </form>
    </div>

<?php

// Removing undefined arrays
if (isset($first_name) || isset($last_name) || isset($email) || isset($mobile)) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["lastname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["lastname"];
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
                    <a href='update_guest.php?id=".$row["id"]."' class='edit_button'>Edit</a>
                </td>
                <td>" . $row["id"] . "</td>
                <td>" . $row["first_name"] . "</td>
                <td>" . $row["lastname"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["mobile"] . "</td>
                <td>" . $row["enrolled_date"] . "</td>
                <td>
                    <form action='confirm_removal.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit' class='delete_button'>Delete</button>
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