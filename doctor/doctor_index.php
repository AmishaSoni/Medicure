<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Doctor's Dashboard</title>
    </head>
    <body>
        <?php include("../partials/header.php");
        include("../partials/dbconnect.php");
        ?>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left:-30px;">
                    <?php include("sidenav.php");?>
                    </div>
                    <div class="col-md-10">
                        <div class="container-fluid">
                            <h2 class="my-4 text-center">Doctor's Dashboard</h2>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 my-2 bg-info" style="height:150px;">
                                      <div class="col-md-12">
                                          <div class="row">
                                              <div class="col-md-8">
                                               <h5 class="text-white my-4">My Profile</h5>
                                               </div>
                                               <div class="col-md-4">
                                               <a href="doctor_profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color:white"></i></a>
                                               </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="col-md-3 my-2 bg-success mx-2" style="height:150px;">
                                      <div class="col-md-12">
                                          <div class="row">
                                              <div class="col-md-8">
<!-----------query for fetching data from patients table for total patient------>
<?php
         $sql3=mysqli_query($conn,"SELECT * FROM patients");
         $row3= mysqli_num_rows($sql3); 
         ?>

                   
                                               <h5 class="text-white my-2" style="font-size:30px;"><?php echo $row3;?></h5>
                                               <h5 class="text-white">Total</h5>
                                               <h5 class="text-white">Patient</h5>
                                               </div>
                                               <div class="col-md-4">
                                               <a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color:white"></i></a>
                                               </div>
                                            </div>
                                        </div>  
                                    </div>
<!-----------query for fetching data from appointment table for total appointment------>
<?php
         $sql2=mysqli_query($conn,"SELECT * FROM appointment WHERE status='pending'");
         $row2= mysqli_num_rows($sql2); 
         ?>



                                    <div class="col-md-3 my-2 bg-danger mx-2" style="height:150px;">
                                      <div class="col-md-12">
                                          <div class="row">
                                              <div class="col-md-8">
                                               <h5 class="text-white my-2" style="font-size:30px;"><?php echo $row2;?></h5>
                                               <h5 class="text-white">Total</h5>
                                               <h5 class="text-white">Appointment</h5>
                                               </div>
                                               <div class="col-md-4">
                                               <a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color:white"></i></a>
                                               </div>
                                            </div>
                                        </div>  
                                    </div>


                                 </div>
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
         </div>
</body>
</html>