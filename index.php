<?php

    $connection=mysqli_connect("localhost","root","","GuestHouseDB") or die("could not Connect!<br>Error Returned By MySQL server:".mysqli_connect_error());

    if($connection){
      echo "Connection is Sucessful";
    }
    mysql_close($connection);
?>