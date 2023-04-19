<?php
include "connection.php";
    

    if(!$connection){
      echo "Could not Connect!<br>Error Returned By MySQL server:".mysqli_connect_error();
    
    }
    echo "Connection is Succesful";

    mysqli_close($connection);
?>