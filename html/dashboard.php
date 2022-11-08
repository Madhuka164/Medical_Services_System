<?php
    /* start the session */
	session_start();

    /* database connection page include */
    require_once('../connection/connection.php');

    /* if session is not set, redirect to login page */
    if(!isset($_SESSION['username'])) {
	    header("location:login.php");
	}


    //count department
    $query = "SELECT COUNT(*) AS countDept FROM `department` WHERE `is_deleted` = 0";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $dept_count = mysqli_fetch_assoc($result_set);

    }

    //count doctor
    $query = "SELECT COUNT(*) AS countDoc FROM `doctor` WHERE `is_deleted` = 0";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $doc_count = mysqli_fetch_assoc($result_set);

    }

    //count patient
    $query = "SELECT COUNT(*) AS countPat FROM `patient` WHERE `is_deleted` = 0";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $pat_count = mysqli_fetch_assoc($result_set);

    }

    //count nurse
    $query = "SELECT COUNT(*) AS countNur FROM `nurse` WHERE `is_deleted` = 0";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $nur_count = mysqli_fetch_assoc($result_set);

    }

    //count accountant
    $query = "SELECT COUNT(*) AS countAcc FROM `accountant` WHERE `is_deleted` = 0";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $acc_count = mysqli_fetch_assoc($result_set);

    }

    //count laboratorist
    $query = "SELECT COUNT(*) AS countLab FROM `laboratorist` WHERE `is_deleted` = 0";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $lab_count = mysqli_fetch_assoc($result_set);

    }

    //count client
    $query = "SELECT COUNT(*) AS countCli FROM `client` WHERE `is_deleted` = 0";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $cli_count = mysqli_fetch_assoc($result_set);

    }

    //count accepted apponitment
    if($_SESSION['role'] == 'doctor'){
        $query = "SELECT COUNT(*) AS countAppoi FROM `appointment` WHERE `is_deleted` = 0 AND `doctorId` = '{$_SESSION['id']}'";
    } else if($_SESSION['role'] == 'client' || $_SESSION['role'] == 'patient'){
        $query = "SELECT COUNT(*) AS countAppoi FROM `appointment` WHERE `is_deleted` = 0 AND `clientId` = '{$_SESSION['id']}'";
    } else {
        $query = "SELECT COUNT(*) AS countAppoi FROM `appointment` WHERE `is_deleted` = 0";
    }    

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $appoi_count = mysqli_fetch_assoc($result_set);

    }

    //count requested apponitment
    if($_SESSION['role'] == 'doctor'){
        $query = "SELECT COUNT(*) AS countReqAppoi FROM `requestedappointment` WHERE `is_deleted` = 0 AND `doctorId` = '{$_SESSION['id']}'";
    } else if($_SESSION['role'] == 'client' || $_SESSION['role'] == 'patient'){
        $query = "SELECT COUNT(*) AS countReqAppoi FROM `requestedappointment` WHERE `is_deleted` = 0 AND `clientId` = '{$_SESSION['id']}'";
    } else {
        $query = "SELECT COUNT(*) AS countReqAppoi FROM `requestedappointment` WHERE `is_deleted` = 0";
    }    

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $req_appoi_count = mysqli_fetch_assoc($result_set);

    }

    //count bllodDonor
    $query = "SELECT COUNT(*) AS countDonor FROM `blooddonor` WHERE `is_deleted` = 0";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $donor_count = mysqli_fetch_assoc($result_set);

    }

    //count unpaid invoices
    $query = "SELECT COUNT(*) AS countUnIn FROM `invoice` WHERE `is_deleted` = 0 AND `is_paid` = 'Unpaid'";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $unin_count = mysqli_fetch_assoc($result_set);

    }

    //count paid invoices
    $query = "SELECT COUNT(*) AS countPayIn FROM `invoice` WHERE `is_deleted` = 0 AND `is_paid` = 'Paid'";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $payin_count = mysqli_fetch_assoc($result_set);

    }

    //amount unpaid invoices
    if($_SESSION['role'] == 'client' || $_SESSION['role'] == 'patient'){
        $query = "SELECT SUM(`amount`) AS amountUnIn FROM `invoice` WHERE `is_deleted` = 0 AND `is_paid` = 'Unpaid' AND `patientId` = '{$_SESSION['id']}'";
    } else {
        $query = "SELECT SUM(`amount`) AS amountUnIn FROM `invoice` WHERE `is_deleted` = 0 AND `is_paid` = 'Unpaid'";
    }

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $unin_amount = mysqli_fetch_assoc($result_set);

    }

    //amount paid invoices
    $query = "SELECT SUM(`amount`) AS amountPayIn FROM `invoice` WHERE `is_deleted` = 0 AND `is_paid` = 'Paid'";

    $result_set = mysqli_query($con,$query);

    if (mysqli_num_rows($result_set) == 1) {

        $payin_amount = mysqli_fetch_assoc($result_set);

    }

    //count A blood bags
    $queryP = "SELECT `noOfBag` as countAPlus FROM `bloodbank` WHERE `bloodGroup` = 'A+'";
    $queryM = "SELECT `noOfBag` as countAMinus FROM `bloodbank` WHERE `bloodGroup` = 'A-'";

    $result_setP = mysqli_query($con,$queryP);
    $result_setM = mysqli_query($con,$queryM);

    $aplus_count = mysqli_fetch_assoc($result_setP);
    $aminus_count = mysqli_fetch_assoc($result_setM);

    //count B blood bags
    $queryP = "SELECT `noOfBag` as countBPlus FROM `bloodbank` WHERE `bloodGroup` = 'B+'";
    $queryM = "SELECT `noOfBag` as countBMinus FROM `bloodbank` WHERE `bloodGroup` = 'B-'";

    $result_setP = mysqli_query($con,$queryP);
    $result_setM = mysqli_query($con,$queryM);

    $bplus_count = mysqli_fetch_assoc($result_setP);
    $bminus_count = mysqli_fetch_assoc($result_setM);

    //count AB blood bags
    $queryP = "SELECT `noOfBag` as countABPlus FROM `bloodbank` WHERE `bloodGroup` = 'AB+'";
    $queryM = "SELECT `noOfBag` as countABMinus FROM `bloodbank` WHERE `bloodGroup` = 'AB-'";

    $result_setP = mysqli_query($con,$queryP);
    $result_setM = mysqli_query($con,$queryM);

    $abplus_count = mysqli_fetch_assoc($result_setP);
    $abminus_count = mysqli_fetch_assoc($result_setM);

    //count O blood bags
    $queryP = "SELECT `noOfBag` as countOPlus FROM `bloodbank` WHERE `bloodGroup` = 'O+'";
    $queryM = "SELECT `noOfBag` as countOMinus FROM `bloodbank` WHERE `bloodGroup` = 'O-'";

    $result_setP = mysqli_query($con,$queryP);
    $result_setM = mysqli_query($con,$queryM);

    $oplus_count = mysqli_fetch_assoc($result_setP);
    $ominus_count = mysqli_fetch_assoc($result_setM);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard | Aarogya</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--title icon-->
        <link rel="icon" type="image/ico" href="../img/logo_only.png"/>
        
        <!-- bootstrap jquary -->
        <script src="../js/bootstrap.min.js"></script>
        
        <!-- bootstrap css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    
        <!-- font awesome icon -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.css" rel="stylesheet">
        
        <!-- popper for tooltip -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        
        
        <!-- jquary -->        
        <script src="../js/jquery.min.js"></script>
        <script src="../js/script.js"></script>
        
        <!-- css -->
        <link href="../css/main.css" rel="stylesheet">
    </head>

    <body>
        <div class="page-wrapper chiller-theme toggled">
            
            <?php
                require_once('sidebar.php');
            ?><!-- sidebar-wrapper  -->
    
            <main class="page-content">
                <div class="container">
                    
                    <?php
                        require_once('logoutbar.php');
                    ?><!-- logout bar  -->  
                    
                    
                    <div class="row topic mb-4">
                        <div class="col-md-1 topic-logo">
                            <i class="fas fa-tachometer-alt fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <span class="font-weight-bold"><big>Dashboard</big><br><small>Home</small></span>
                        </div>
                    </div>                    
                    
                    <a <?php if($_SESSION['role'] == 'admin') echo "href='departmetList.php'";?> class="btn" id="deptCount">
                        <div class="card img-fluid border-secondary mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(130,138,145, 0.5);">
                            <i  <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "class='fas fa-building fa-7x'";
                                    } else if($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'client'){
                                        echo "class='far fa-calendar-check fa-7x'";
                                    } else if($_SESSION['role'] == 'accountant'){
                                        echo "class='fas fa-hand-holding-usd fa-7x'";
                                    } else {
                                        echo "class='fas fa-building fa-7x'";
                                    }
                                ?>
                               
                               style="color:gainsboro;position:absolute; bottom:0; right:0;"></i>
                            <div class="card-body card-img-overlay text-secondary">
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<h4 class='card-title'>Departments</h4>";
                                    } else if($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'client'){
                                        echo "<h4 class='card-title'>Appointments</h4>";
                                    } else if($_SESSION['role'] == 'accountant'){
                                        echo "<h4 class='card-title'>Paid Invoices</h4>";
                                    } else {
                                        echo "<h4 class='card-title'>Departments</h4>";
                                    }
                                ?>
                                
                                <h1>
                                    <?php
                                        if($_SESSION['role'] == 'admin'){
                                            echo $dept_count['countDept'];
                                        } else if($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'client'){
                                            echo $appoi_count['countAppoi'];
                                        } else if($_SESSION['role'] == 'accountant'){
                                            echo $payin_count['countPayIn'];
                                        } else {
                                            echo $dept_count['countDept'];
                                        }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                    <a <?php if($_SESSION['role'] == 'admin') echo "href='doctorList.php'";?> class="btn" id="docCount">
                        <div class="card img-fluid border-success mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(72,180,97, 0.5);">
                            <i  
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "class='fas fa-user-md fa-7x'";
                                    } else if($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'client'){
                                        echo "class='far fa-calendar-plus fa-7x'";
                                    } else if($_SESSION['role'] == 'accountant'){
                                        echo "class='fas fa-hand-holding fa-7x'";
                                    } else {
                                        echo "class='fas fa-user-md fa-7x'";
                                    }
                                ?>
                               
                                style="color:gainsboro;position:absolute; bottom:0; right:0;"></i>
                            <div class="card-body card-img-overlay text-success">
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<h4 class='card-title'>Doctors</h4>";
                                    } else if($_SESSION['role'] == 'doctor'){
                                        echo "<h4 class='card-title'>Requested Appointments</h4>";
                                    } else if($_SESSION['role'] == 'client'){
                                        echo "<h4 class='card-title'>Pending Appointments</h4>";
                                    } else if($_SESSION['role'] == 'accountant'){
                                        echo "<h4 class='card-title'>Unpaid Invoices</h4>";
                                    } else {
                                        echo "<h4 class='card-title'>Doctors</h4>";
                                    }
                                ?>
                                <h1>
                                    <?php
                                        if($_SESSION['role'] == 'admin'){
                                            echo $doc_count['countDoc'];
                                        } else if($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'client'){
                                            echo $req_appoi_count['countReqAppoi'];
                                        } else if($_SESSION['role'] == 'accountant'){
                                            echo $unin_count['countUnIn'];
                                        } else {
                                            echo $doc_count['countDoc'];
                                        }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                    <a <?php if($_SESSION['role'] == 'admin') echo "href='patientList.php'";?> class="btn" id="patCount">
                        <div class="card img-fluid border-primary mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(38,143,255, 0.5);">
                            <i
                                <?php
                                    if($_SESSION['role'] == 'laboratorist'){
                                        echo "class='fas fa-user fa-7x'";
                                    } else {
                                        echo "class='fa fa-wheelchair fa-7x'";
                                    }
                                ?>
                               
                               style="color:gainsboro;position:absolute; bottom:0; right:0;"></i>
                            <div class="card-body card-img-overlay text-primary">
                                <?php
                                    if($_SESSION['role'] == 'laboratorist'){
                                        echo "<h4 class='card-title'>Blood Donors</h4>";
                                    } else {
                                        echo "<h4 class='card-title'>Patients</h4>";
                                    }
                                ?>
                                <h1>
                                    <?php
                                        if($_SESSION['role'] == 'laboratorist'){
                                            echo $donor_count['countDonor'];
                                        } else {
                                            echo $pat_count['countPat'];
                                        }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                    <a <?php if($_SESSION['role'] == 'admin') echo "href='nurseList.php'";?> class="btn" id="nurCount">
                        <div class="card img-fluid border-warning mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(222,170,12, 0.5);">
                            <i 
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "class='fas fa-user-nurse fa-7x'";
                                    } else if($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'nurse'){
                                        echo "class='fas fa-user fa-7x'";
                                    } else if($_SESSION['role'] == 'laboratorist'){
                                        echo "class='fas fa-tint fa-7x'";
                                    } else if($_SESSION['role'] == 'accountant'){
                                        echo "class='far fa-check-square fa-7x'";
                                    } else {
                                        echo "class='fas fa-user-nurse fa-7x'";
                                    }
                                ?>
                               
                                style="color:gainsboro;position:absolute; bottom:0; right:0;"></i>
                            <div class="card-body card-img-overlay text-warning">
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<h4 class='card-title'>Nurses</h4>";
                                    } else if($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'nurse'){
                                        echo "<h4 class='card-title'>Blood Donors</h4>";
                                    } else if($_SESSION['role'] == 'laboratorist'){
                                        echo "<h4 class='card-title'>A+ Bags | A- Bags</h4>";
                                    } else if($_SESSION['role'] == 'accountant'){
                                        echo "<h4 class='card-title'>Received Amount</h4>";
                                    } else {
                                        echo "<h4 class='card-title'>Nurses</h4>";
                                    }
                                ?>
                                <h1>
                                    <?php
                                        if($_SESSION['role'] == 'admin'){
                                            echo $nur_count['countNur'];
                                        } else if($_SESSION['role'] == 'doctor' || $_SESSION['role'] == 'nurse'){
                                            echo $donor_count['countDonor'];
                                        } else if($_SESSION['role'] == 'laboratorist'){
                                            echo $aplus_count['countAPlus']." | ".$aminus_count['countAMinus'];
                                        } else if($_SESSION['role'] == 'accountant'){
                                            echo $payin_amount['amountPayIn'];
                                        } else {
                                            echo $nur_count['countNur'];
                                        }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                    <a <?php if($_SESSION['role'] == 'admin') echo "href='accountantList.php'";?> class="btn" id="accCount">
                        <div class="card img-fluid border-danger mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(225,83,97, 0.5);">
                            <i
                                <?php
                                    if($_SESSION['role'] == 'accountant' || $_SESSION['role'] == 'client' || $_SESSION['role'] == 'patient'){
                                        echo "class='fas fa-spinner fa-7x'";
                                    } else if($_SESSION['role'] == 'laboratorist'){
                                        echo "class='fas fa-tint fa-7x'";
                                    } else {
                                        echo "class='far fa-money-bill-alt fa-7x'";
                                    }
                                ?>
                               style="color:gainsboro;position:absolute; bottom:0; right:0;"></i>
                            <div class="card-body card-img-overlay text-danger">
                                <?php
                                    if($_SESSION['role'] == 'accountant'){
                                        echo "<h4 class='card-title'>Receivable Amount</h4>";
                                    } else if($_SESSION['role'] == 'client' || $_SESSION['role'] == 'patient'){
                                        echo "<h4 class='card-title'>Payable Amount</h4>";
                                    } else if($_SESSION['role'] == 'laboratorist'){
                                        echo "<h4 class='card-title'>B+ Bags | B- Bags</h4>";
                                    } else {
                                        echo "<h4 class='card-title'>Accountants</h4>";
                                    }
                                ?>
                                <h1>
                                    <?php
                                        if($_SESSION['role'] == 'accountant' || $_SESSION['role'] == 'client' || $_SESSION['role'] == 'patient'){
                                            echo $unin_amount['amountUnIn'];
                                        } else if($_SESSION['role'] == 'laboratorist'){
                                            echo $bplus_count['countBPlus']." | ".$bminus_count['countBMinus'];
                                        } else {
                                            echo $acc_count['countAcc'];
                                        }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                    <a <?php if($_SESSION['role'] == 'admin') echo "href='laboratoristList.php'";?> class="btn" id="labCount">
                        <div class="card img-fluid border-info mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(58,176,195, 0.5);">
                            <i
                                <?php
                                    if($_SESSION['role'] == 'laboratorist'){
                                        echo "class='fas fa-tint fa-7x'";
                                    } else {
                                        echo "class='fas fa-flask fa-7x'";
                                    }
                                ?>
                               style="color:gainsboro;position:absolute; bottom:0; right:0;"></i>
                            <div class="card-body card-img-overlay text-info">
                                <?php
                                    if($_SESSION['role'] == 'laboratorist'){
                                        echo "<h4 class='card-title'>AB+ Bags | AB- Bags</h4>";
                                    } else {
                                        echo "<h4 class='card-title'>Laboratorists</h4>";
                                    }
                                ?>
                                <h1>
                                    <?php
                                        if($_SESSION['role'] == 'laboratorist'){
                                            echo $abplus_count['countABPlus']." | ".$abminus_count['countABMinus'];
                                        } else {
                                            echo $lab_count['countLab'];
                                        }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                    <a <?php if($_SESSION['role'] == 'admin') echo "href='clientList.php'";?> class="btn" id="cliCount">
                        <div class="card img-fluid border-dark mb-3" style="width: 18rem;height: 10rem;box-shadow: 4px 4px 4px rgba(82,88,93, 0.5);">
                            <i
                                <?php
                                    if($_SESSION['role'] == 'laboratorist'){
                                        echo "class='fas fa-tint fa-7x'";
                                    } else {
                                        echo "class='fas fa-user fa-7x'";
                                    }
                                ?>
                               style="color:gainsboro;position:absolute; bottom:0; right:0;"></i>
                            <div class="card-body card-img-overlay text-dark">
                                <?php
                                    if($_SESSION['role'] == 'laboratorist'){
                                        echo "<h4 class='card-title'>O+ Bags | O- Bags</h4>";
                                    } else {
                                        echo "<h4 class='card-title'>Clients</h4>";
                                    }
                                ?>
                                <h1>
                                    <?php
                                        if($_SESSION['role'] == 'laboratorist'){
                                            echo $oplus_count['countOPlus']." | ".$ominus_count['countOMinus'];
                                        } else {
                                            echo $cli_count['countCli'];
                                        }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </a>
                    <!-- -------------------------- -->
                    
                    
                </div>
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        
    </body>

    </html>