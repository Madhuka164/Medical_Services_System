<?php
    /* start the session */
	session_start();

    /* database connection page include */
    require_once('../connection/connection.php');

    /* if session is not set, redirect to login page */
    if(!isset($_SESSION['username'])) {
	    header("location:login.php");
	}

?>

<?php

    if(isset($_GET['id'])) {
	    
        $id =  mysqli_real_escape_string($con,$_GET['id']);
        
        if($_SESSION['username'] == $id){
            //should not be delete current user
            header("location:blooddonor.php");
        } else {
            //deleting record
            $query = "UPDATE `blooddonor` SET is_deleted = 1 WHERE id = '{$id}' LIMIT 1";

            $result = mysqli_query($con,$query);
            
            if($result) {

                $result = mysqli_query($con,$query);
                header("location:blooddonor.php");
                
            }

        }
        
	} 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blood Donor</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--title icon-->
        <link rel="icon" type="image/ico" href="../images/logoc.png"/>
        
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
                    
                    
                    <div class="row topic">
                        <div class="col-md-1 topic-logo">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <div class="col-md-11">
                            <span class="font-weight-bold"><big>Blood Donor List</big><br><small>Blood Donor</small></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="addBloodDonor.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-plus"></i>  Add Blood Donor</button></a>
                                </div>
                                <div class="col-md-4">
                                    <form action="bloodDonor.php" method="get">
                                        <div class="input-group">
                                            <input type="search" name="searchTxt" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit" name="search"><i class="fas fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <!-- Table -->
                            <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">id</th>
                                      <th scope="col">First Name</th>
                                      <th scope="col">Last Name</th>
                                      <th scope="col">Gender</th>
                                      <th scope="col">Age</th>
                                      <th scope="col">Address</th>
                                      <th scope="col">Mobile No</th>
                                      <th scope="col">Blood Group</th>
                                      <?php
                                        if($_SESSION['role'] != ''){
                                            echo "<th scope='col'>Action</th>";
                                        }
                                    ?>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  
                                    if(isset($_GET['search'])){
                                        $search =  mysqli_real_escape_string($con,$_GET['searchTxt']);
                                        
                                        $query = "SELECT * FROM `blooddonor` WHERE `is_deleted` = 0 AND `id` LIKE '{$search}%' OR `firstName` LIKE '{$search}%' OR `lastName` LIKE '{$search}%' OR `bloodGroup` LIKE '{$search}%' ORDER BY `id`";
                                    } else {
                                        $query = "SELECT * FROM `blooddonor` WHERE `is_deleted` = 0 ORDER BY `id`";
                                    }

                                    $result_set = mysqli_query($con,$query);

                                    if (mysqli_num_rows($result_set) >= 1) {

                                        while($bld = mysqli_fetch_assoc($result_set)){
                                            
                                            echo "<tr>";
                                            echo "<th scope='row'>".$bld['id']."</th>";
                                            echo "<td>".$bld['firstName']."</td>";
                                            echo "<td>".$bld['lastName']."</td>";
                                            echo "<td>".$bld['gender']."</td>";
                                            echo "<td>".$bld['age']."</td>";
                                            echo "<td>".$bld['address']."</td>";
                                            echo "<td>".$bld['mobile']."</td>";
                                            echo "<td>".$bld['bloodGroup']."</td>";
                                            if($_SESSION['role'] != ''){
                                                echo "<td><a href=\"#\"><i class='fas fa-edit mr-3' data-toggle='tooltip' title='Edit'></i></a><a href='blooddonor.php?id={$bld['id']}' onclick=\"return confirm('Are you sure to delete this information ?');\"><i class='fas fa-trash-alt' data-toggle='tooltip' title='Delete' style='color:red;'></i></a></td>";
                                            }                                              
                                            echo "</tr>";
                                            
                                        }

                                    } else {
                                        echo "<tr><td><h4 class='text-danger'>No records</h4></td></tr>";
                                    }
                                  ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        
    </body>

    </html>