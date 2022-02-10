<?php 
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Admin dashboard</title>
  </head>
  <body>
      <?php include('../partials/header.php');?>
      <?php include('../partials/dbconnect.php');?>

      <div class="container-fluid">
          <div class="col-md-12">
              <div class="row">
                  <!----side nav bar---->
                  <div class="col-md-2" style="margin-left:-30px; height:90vh;">
                  <?php include('sidenav.php');?>
                  </div>
                  <div class="col-md-10">
                      <h1 class="my-2 text-center">Admin Dashboard</h1>
                      <div class="col-md-12">
                          <div class="row text-center ">
                              <div class="col-md-3 bg-success mx-2 my-2" style="height:130px;">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-8">
 <!-----------query for fetching data from admin table------>
         <?php
         $sql=mysqli_query($conn,"SELECT * FROM `admin`");
         $row= mysqli_num_rows($sql); 
         ?>

                                          <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $row;?></h5>
                                          <h5 class="text-white">Total</h5>
                                          <h5 class="text-white">Admin</h5>
                                     </div>
                                 <div class="col-md-4">
                                 <a href="admin_fun.php"><i class="fas fa-users-cog fa-3x my-4" style="color:white;"></i></a>
                              </div>
                              </div>
                              </div>
                               </div>
<!-----------query for fetching data from doctors table for total doctor------>
<?php
         $sql1=mysqli_query($conn,"SELECT * FROM doctors WHERE status='approved'");
         $row1= mysqli_num_rows($sql1); 
         ?>

                              <div class="col-md-3 bg-secondary mx-2 my-2" style="height:130px;">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-8">
                                          <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $row1; ?></h5>
                                          <h5 class="text-white">Total</h5>
                                          <h5 class="text-white">Doctor</h5>
                                     </div>
                                 <div class="col-md-4">
                                 <a href="doctor.php"><i class="fas fa-user-md fa-3x my-4" style="color:white;"></i></a>
                              </div>
                              </div>
                              </div></div>
<!-----------query for fetching data from doctors table for total doctor------>
<?php
         $sql3=mysqli_query($conn,"SELECT * FROM patients");
         $row3= mysqli_num_rows($sql3); 
         ?>

                              <div class="col-md-3 bg-info mx-2 my-2" style="height:130px;">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-8">
                                          <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $row3;?></h5>
                                          <h5 class="text-white">Total</h5>
                                          <h5 class="text-white">Patient</h5>
                                     </div>
                                 <div class="col-md-4">
                                 <a href="patient.php"><i class="fas fa-procedures fa-3x my-4" style="color:white;"></i></a>
                              </div>
                              </div>
                              </div></div>
<!-----------query for fetching data from doctors table for total doctor------>
<?php
         $sql4=mysqli_query($conn,"SELECT * FROM report");
         $row4= mysqli_num_rows($sql4); 
         ?>

                              <div class="col-md-3 bg-danger mx-2 my-2" style="height:130px;">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-8">
                                          <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $row4;?></h5>
                                          <h5 class="text-white">Total</h5>
                                          <h5 class="text-white">Report</h5>
                                     </div>
                                 <div class="col-md-4">
                                 <a href="report.php"><i class="far fa-flag fa-3x my-4" style="color:white;"></i></a>
                              </div>
                              </div>
                              </div></div>
<!-----------query for fetching data from doctors table for job request------>
<?php
         $sql2=mysqli_query($conn,"SELECT * FROM `doctors`WHERE status='pending'");
         $row2= mysqli_num_rows($sql2); 
         ?>

                              <div class="col-md-3 bg-primary mx-2 my-2" style="height:130px;">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-8">
                                          <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $row2;?></h5>
                                          <h5 class="text-white">Total</h5>
                                          <h5 class="text-white">Job Request</h5>
                                     </div>
                                 <div class="col-md-4">
                                 <a href="job_request.php"><i class="fas fa-users fa-3x my-4" style="color:white;"></i></a>
                              </div>
                              </div>
                              </div>
                            </div>
<!-----------query for fetching data from doctors table for job request------>
<?php
         $sql5=mysqli_query($conn,"SELECT sum(amount_paid) as profit FROM income");
         $row5= mysqli_fetch_assoc($sql5);
         $inc =$row5['profit'];
         ?>                            

                              <div class="col-md-3 bg-warning mx-2 my-2" style="height:130px;"><div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-8">
                                          <h5 class="my-2 text-white" style="font-size:30px;"><?php echo "$$inc";?></h5>
                                          <h5 class="text-white">Total</h5>
                                          <h5 class="text-white">Income</h5>
                                     </div>
                                 <div class="col-md-4">
                                 <a href="income.php"><i class="fas fa-money-check-alt fa-3x my-4" style="color:white;"></i></a>
                              </div>
                              </div>
                              </div></div>
</div>

</div>
</div>
</div>
</div>
</div>
</div> 
      </body>
      </html>