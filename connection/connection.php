<?php
    $con = mysqli_connect("localhost","root","","medicals");

    // Check connection
    if (mysqli_connect_errno())
    {
        die("Failed to connect to database: " . mysqli_connect_error());
    }
?>