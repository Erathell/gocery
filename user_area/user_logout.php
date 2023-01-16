<?php

session_start();
session_unset();
session_destroy();
echo "<script>window.open('/gocery/index.php','_self')</script>";
?>