<html>
    <body onload="showLink();"></body>
    
    <script type="text/javascript">
        function showLink()
        {
            var value = "<?php echo $_SESSION['role'] ?>"
            switch(value){
                case 'admin':
                    document.getElementById('departmentLink').style.display = 'block';
                    document.getElementById('doctorLink').style.display = 'block';
                    document.getElementById('patientLink').style.display = 'block';
                    document.getElementById('nurseLink').style.display = 'block';
                    document.getElementById('accountLink').style.display = 'block';
                    document.getElementById('labLink').style.display = 'block';
                    document.getElementById('clientLink').style.display = 'block';
                    document.getElementById('bloodDonorLink').style.display = 'block';
                    document.getElementById('monitorLink').style.display = 'block';
                    //document.getElementById('appointLink').style.display = 'block';
                    //document.getElementById('reportLink').style.display = 'block';
                    //document.getElementById('invoiceLink').style.display = 'block';
                    break;
                case 'doctor':
                    //document.getElementById('departmentLink').style.display = 'block';
                    //document.getElementById('doctorLink').style.display = 'block';
                    document.getElementById('patientLink').style.display = 'block';
                    //document.getElementById('nurseLink').style.display = 'block';
                    //document.getElementById('accountLink').style.display = 'block';
                    //document.getElementById('labLink').style.display = 'block';
                    //document.getElementById('clientLink').style.display = 'block';
                    //document.getElementById('monitorLink').style.display = 'block';
                    document.getElementById('bloodBankLink').style.display = 'block';
                    document.getElementById('bloodDonorLink').style.display = 'block';
                    document.getElementById('appointLink').style.display = 'block';
                    document.getElementById('reportLink').style.display = 'block';
                    //document.getElementById('invoiceLink').style.display = 'block';
                    
                    document.getElementById('accCount').style.display = 'none';
                    document.getElementById('labCount').style.display = 'none';
                    document.getElementById('cliCount').style.display = 'none';
                    break;
                case 'nurse':
                    //document.getElementById('departmentLink').style.display = 'block';
                    //document.getElementById('doctorLink').style.display = 'block';
                    document.getElementById('patientLink').style.display = 'block';
                    //document.getElementById('nurseLink').style.display = 'block';
                    //document.getElementById('accountLink').style.display = 'block';
                    //document.getElementById('labLink').style.display = 'block';
                    //document.getElementById('clientLink').style.display = 'block';
                    //document.getElementById('monitorLink').style.display = 'block';
                    document.getElementById('bloodBankLink').style.display = 'block';
                    document.getElementById('bloodDonorLink').style.display = 'block';
                    //document.getElementById('appointLink').style.display = 'block';
                    document.getElementById('reportLink').style.display = 'block';
                    //document.getElementById('invoiceLink').style.display = 'block';
                    
                    document.getElementById('deptCount').style.display = 'none';
                    document.getElementById('docCount').style.display = 'none';
                    document.getElementById('accCount').style.display = 'none';
                    document.getElementById('labCount').style.display = 'none';
                    document.getElementById('cliCount').style.display = 'none';
                    break;
                case 'accountant':
                    //document.getElementById('departmentLink').style.display = 'block';
                    //document.getElementById('doctorLink').style.display = 'block';
                    //document.getElementById('patientLink').style.display = 'block';
                    //document.getElementById('nurseLink').style.display = 'block';
                    //document.getElementById('accountLink').style.display = 'block';
                    //document.getElementById('labLink').style.display = 'block';
                    //document.getElementById('clientLink').style.display = 'block';
                    //document.getElementById('monitorLink').style.display = 'block';
                    //document.getElementById('appointLink').style.display = 'block';
                    //document.getElementById('reportLink').style.display = 'block';
                    document.getElementById('invoiceLink').style.display = 'block';
                    
                    document.getElementById('patCount').style.display = 'none';
                    document.getElementById('labCount').style.display = 'none';
                    document.getElementById('cliCount').style.display = 'none';
                    break;
                case 'laboratorist':
                    //document.getElementById('departmentLink').style.display = 'block';
                    //document.getElementById('doctorLink').style.display = 'block';
                    //document.getElementById('patientLink').style.display = 'block';
                    //document.getElementById('nurseLink').style.display = 'block';
                    //document.getElementById('accountLink').style.display = 'block';
                    //document.getElementById('labLink').style.display = 'block';
                    //document.getElementById('clientLink').style.display = 'block';
                    //document.getElementById('monitorLink').style.display = 'block';
                    document.getElementById('bloodBankLink').style.display = 'block';
                    document.getElementById('bloodDonorLink').style.display = 'block';
                    //document.getElementById('appointLink').style.display = 'block';
                    document.getElementById('reportLink').style.display = 'block';
                    //document.getElementById('invoiceLink').style.display = 'block';
                    
                    document.getElementById('deptCount').style.display = 'none';
                    document.getElementById('docCount').style.display = 'none';
                    break;
                case 'client':
                    //document.getElementById('departmentLink').style.display = 'block';
                    document.getElementById('doctorLink').style.display = 'block';
                    //document.getElementById('patientLink').style.display = 'block';
                    //document.getElementById('nurseLink').style.display = 'block';
                    //document.getElementById('accountLink').style.display = 'block';
                    //document.getElementById('labLink').style.display = 'block';
                    //document.getElementById('clientLink').style.display = 'block';
                    //document.getElementById('monitorLink').style.display = 'block';
                    document.getElementById('bloodBankLink').style.display = 'block';
                    document.getElementById('appointLink').style.display = 'block';
                    document.getElementById('reportLink').style.display = 'block';
                    document.getElementById('invoiceLink').style.display = 'block';
                    
                    document.getElementById('patCount').style.display = 'none';
                    document.getElementById('nurCount').style.display = 'none';
                    document.getElementById('labCount').style.display = 'none';
                    document.getElementById('cliCount').style.display = 'none';
                    break;
                
            }
        }
    </script>
    
    <!-- icon that shows when the sidebar is hidden -->
    <a id="show-sidebar" class="btn btn-sm" href="#">
        <i class="fas fa-list"></i>
    </a>

    <!-- sidebar -->
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <!-- logo -->
                <a href="../html/dashboard.php"><img src="../img/logo.png" width="175px"></a>
                <!-- sidebar hidden icon -->
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>

            <div class="sidebar-header">
                <!-- user's picture -->
                <div class="user-pic">
                    <?php
                            switch($_SESSION['role']){
                                case 'admin':
                                    echo '<img class="img-responsive img-rounded" src="../img/admin.png" alt="User picture">';
                                    break;
                                case 'nurse':
                                    echo '<img class="img-responsive img-rounded" src="../img/nurse.png" alt="User picture">';
                                    break;
                                case 'doctor':
                                    echo '<img class="img-responsive img-rounded" src="../img/doctor.png" alt="User picture">';
                                    break;
                                case 'accountant':
                                    echo '<img class="img-responsive img-rounded" src="../img/accountant.png" alt="User picture">';
                                    break;
                                case 'laboratorist':
                                    echo '<img class="img-responsive img-rounded" src="../img/laboratorist.png" alt="User picture">';
                                    break;
                                case 'client':
                                    echo '<img class="img-responsive img-rounded" src="../img/patient.png" alt="User picture">';
                                    break;
                            }
                    ?>

                </div>
                
                <div class="user-info">
                    <!-- display user's name -->
                    <span class="user-name">
                        <?php
                            echo $_SESSION['firstName'];
                        ?>
                        <strong>
                            <?php
                                echo $_SESSION['lastName'];
                            ?>
                        </strong>
                    </span>
                    <!-- display user's role -->
                    <span class="user-role">
                        <?php
                            switch($_SESSION['role']){
                                case 'admin':
                                    echo 'Administrator';
                                    break;
                                case 'nurse':
                                    echo 'Nurse';
                                    break;
                                case 'doctor':
                                    echo 'Doctor';
                                    break;
                                case 'accountant':
                                    echo 'Accountant';
                                    break;
                                case 'laboratorist':
                                    echo 'Laboratorist';
                                    break;
                                case 'client':
                                    echo 'Client';
                                    break;
                            }
                        
                            echo " | ".$_SESSION['id'];
                        
                        ?>                                    
                    </span>
                    <span class="user-status"><i class="fa fa-circle"></i><span>Online</span></span>
                </div>
                
            </div>
            <!-- sidebar-header  -->

            <div class="sidebar-menu">
                <ul>                            
                    <li><a href="dashboard.php"><i class="fa fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="sidebar-dropdown" id="departmentLink" style="display:none;"><a href="#"><i class="fas fa-building"></i><span>Department</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<li><a href='addDepartmet.php'>Add Department</a></li>";
                                    }
                                ?>
                                <li><a href="departmetList.php">Department List</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown" id="doctorLink" style="display:none;"><a href="#"><i class="fas fa-user-md"></i><span>Doctor</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<li><a href='addDoctor.php'>Add Doctor</a></li>";
                                    }
                                ?>
                                <li><a href="doctorList.php">Doctor List</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown" id="patientLink" style="display:none;"><a href="#"><i class="fa fa-wheelchair"></i><span>Patient</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] != ''){
                                        echo "<li><a href='addPatient.php'>Add Patient</a></li>";
                                    }
                                ?>
                                <li><a href="patientList.php">Patient List</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown" id="nurseLink" style="display:none;"><a href="#"><i class="fas fa-user-nurse"></i><span>Nurse</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<li><a href='addNurse.php'>Add Nurse</a></li>";
                                    }
                                ?>
                                <li><a href="nurseList.php">Nurse List</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown" id="accountLink" style="display:none;"><a href="#"><i class="far fa-money-bill-alt"></i><span>Accountant</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<li><a href='addAccountant.php'>Add Accountant</a></li>";
                                    }
                                ?>
                                <li><a href="accountantList.php">Accountant List</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown" id="labLink" style="display:none;"><a href="#"><i class="fas fa-flask"></i><span>Laboratorist</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<li><a href='addLaboratorist.php'>Add Laboratorist</a></li>";
                                    }
                                ?>
                                <li><a href="laboratoristList.php">Laboratorist List</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="sidebar-dropdown" id="clientLink" style="display:none;"><a href="#"><i class="fas fa-user"></i><span>Client</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] == 'admin'){
                                        echo "<li><a href='addClient.php'>Add Client</a></li>";
                                    }
                                ?>
                                <li><a href="clientList.php">Client List</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="sidebar-dropdown" id="monitorLink" style="display:none;"><a href="#"><i class="fas fa-wave-square"></i><span>Monitor Hospital</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="bloodBank.php">Blood Bank</a></li>
                            </ul>
                            <ul>
                                <li><a href="reportList.php">Report List</a></li>
                            </ul>
                            <ul>
                                <li><a href="appointmentList.php">Appointment List</a></li>
                            </ul>
                            <ul>
                                <li><a href="requestedAppointmentList.php">Requested Appointment List</a></li>
                            </ul>
                            <ul>
                                <li><a href="invoiceList.php">Invoice List</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    <li><a href="bloodBank.php" id="bloodBankLink" style="display:none;"><i class="fas fa-tint"></i><span>Blood Bank</span></a></li>
                    
                    <li class="sidebar-dropdown" id="bloodDonorLink" style="display:none;"><a href="#"><i class="fas fa-user"></i><span>Blood Donor</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="addBloodDonor.php">Add Blood Donor</a></li>
                            </ul>
                            <ul>
                                <li><a href="bloodDonor.php">Blood Donor List</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="sidebar-dropdown" id="appointLink" style="display:none;"><a href="#"><i class="far fa-calendar-check"></i><span>Appointment</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] == 'client'){
                                        echo "<li><a href='addAppointment.php'>Apply Appointment List</a></li>";
                                    } else {
                                        echo "<li><a href='addAppointment.php'>Add Appointment List</a></li>";
                                    }
                                ?>
                            </ul>
                            <ul>
                                <li><a href="appointmentList.php">Appointment List</a></li>
                            </ul>
                            <ul>
                                <?php
                                    if($_SESSION['role'] == 'client'){
                                        echo "<li><a href='requestedAppointmentList.php'>Pending Appointment List</a></li>";
                                    } else {
                                        echo "<li><a href='requestedAppointmentList.php'>Requested Appointment List</a></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="sidebar-dropdown" id="reportLink" style="display:none;"><a href="#"><i class="fas fa-file-medical-alt"></i><span>Report</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] != 'client'){
                                        echo "<li><a href='addReport.php'>Add Report</a></li>";
                                    }
                                ?>
                            </ul>
                            <ul>
                                <li><a href="reportList.php">Report List</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="sidebar-dropdown" id="invoiceLink" style="display:none;"><a href="#"><i class="fas fa-file-invoice-dollar"></i><span>Invoice</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <?php
                                    if($_SESSION['role'] != 'client'){
                                        echo "<li><a href='addInvoice.php'>Add Invoice</a></li>";
                                    }
                                ?>
                            </ul>
                            <ul>
                                <li><a href="invoiceList.php">Invoice List</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->


    </nav>
</html>