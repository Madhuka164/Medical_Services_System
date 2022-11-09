<?php

require_once('../connection/connection.php');

session_start();

    //$email = $_POST['username'];
    //$pwd = $_POST['password'];

    $email =  mysqli_real_escape_string($con,trim($_POST['username']));
	$pwd = mysqli_real_escape_string($con,trim($_POST['password']));
        
    $h_pwd = sha1($pwd);
    
    $sql = "SELECT * FROM `client` WHERE `is_deleted` = 0 AND `password` = '$h_pwd ' AND (`email` = '$email') LIMIT 1";;

    $result_set = mysqli_query($con,$sql);
    
    if (mysqli_num_rows($result_set)==1) {
        $_SESSION['username']=$email;
        header('location:patient_pro.php');
    }
    else{
        header('location:login.php');
    }



?>