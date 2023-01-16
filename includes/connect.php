<?php

    $con=new mysqli('localhost', 'root','', 'gocery');
    if(!$con){
        die(mysqli_error($con));
    }
    
?>