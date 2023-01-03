<?php

    $con=new mysqli('localhost', 'root','', 'gocery');
    if($con){
        echo 'connection successful';
    } else{
        die(mysqli_error($con));
    }

?>