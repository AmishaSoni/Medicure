<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Book Appointment</title>
    </head>
    <body>
       <?php
       include("../partials/header.php");
       include("../partials/dbconnect.php");
       ?>
       <div class="container-fluid">
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-2" style="margin-left:-30px;">
                     <?php
                     include("sidenav.php");
                     ?>
                   </div>
                   <div class="col-md-10">
                       <h2 class="text-center my-4">Book Appointment</h2>
                       <?php
                       
                       $pat=$_SESSION['patient'];
                       $sel=mysqli_query($conn,"SELECT * FROM patients WHERE username='$pat'");
                       $row=mysqli_fetch_array($sel);

                       $firstname=$row['firstname'];
                       $surname=$row['surname'];
                       $gender=$row['gender'];
                       $phone=$row['phone'];
                       
                       if(isset($_POST['book']))
                       {
                           $date=$_POST['date'];
                           $sym=$_POST['sym'];

                           if(empty($sym))
                           {}
                           else
                           {
                               $query="INSERT INTO `appointment`(firstname,surname,gender,appointment_date,symptoms,status,date_booked,phone) VALUES 
                               ('$firstname','$surname','$gender','$date','$sym','pending',NOW(),'$phone')";
                               

                               $res=mysqli_query($conn,$query);

                               if($res)
                               {
                                   echo "<script>alert('You have booked an appointment')</script>";
                               }
                           }
                       }
                       ?>
                       <div class="col-md-12">
                           <div class="row">
                               <div class="col-md-3"></div>
                               <div class="col-md-6">
                                   <form method="post" class="jumbotron">
                                       <label>Appointment Date</label>
                                       <input type="date" name="date" class="form-control">

                                       <label>Symptoms</label>
                                       <input type="text" name="sym" class="form-control my-1"
                                       autocomplete="off" placeholder="Enter Symptoms">

                                       <input type="submit" name="book" class="btn btn-info my-2"
                                       value="Book Appointment">
                                   </form>

                               </div>
                               <div class="col-md=3"></div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </body>
    </html>
