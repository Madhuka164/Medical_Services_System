<?php

require_once('../connection/connection.php');

    $email = $_POST['username'];
    $pwd = $_POST['password'];

    $sql = "select * from client where email = $email and password = $pwd";

    $result = mysqli_query($con,$sql);

    if ($result > 0) {
        header('location:patient_pro.php');
    }
    else{
        header('location:profile.php');
    }



?>