<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Patient's Dashboard</title>
</head>
<body>
<?php include('../partials/header.php');
      include('../partials/dbconnect.php');
?>
<div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left:-30px;">
                    <?php include("sidenav.php");?>
                    </div>
                    <div class="col-md-10">
                        <div class="container-fluid">
                            <h2 class="my-4 text-center">Patient's Dashboard</h2>

                            <div class="col-md-12">
                                <div class="row">
                                       <div class="col-md-3 bg-info my-2 mx-2" style="height:150px;">
                                       <div class="col-md-12">
                                           <div class="row">
                                               <div class="col-md-8">
                                                   <h5 class="text-white my-4">My Profile</h5>
                                               </div>
                                               <div class="col-md-4">
                                                   <a href="patient_profile.php"><i class="fa fa-user-circle fa-3x my-4"
                                                   style="color:white;"></i></a>
                                    
                                               </div>
                                           </div>
                                       </div>
                                       </div>
                                       <div class="col-md-3 bg-success my-2 mx-2" style="height:150px;">
                                       <div class="col-md-12">
                                           <div class="row">
                                               <div class="col-md-8">
                                                   <h5 class="text-white my-4">Book Appointment</h5>
                                               </div>
                                               <div class="col-md-4">
                                                   <a href="appointment.php"><i class="fa fa-calendar fa-3x my-4"
                                                   style="color:white;"></i></a>
                                    
                                               </div>
                                           </div>
                                       </div>
                                       </div>
                                       <div class="col-md-3 bg-danger my-2 mx-2" style="height:150px;">
                                       <div class="col-md-12">
                                           <div class="row">
                                               <div class="col-md-8">
                                                   <h5 class="text-white my-4">My Invoice</h5>
                                               </div>
                                               <div class="col-md-4">
                                                   <a href="invoice.php"><i class="fa fa-file-invoice-dollar fa-3x my-4"
                                                   style="color:white;"></i></a>
                                    
                                               </div>
                                           </div>
                                       </div>
                                       </div>
                                </div>
                            </div>
             <!--------query for inserting data into report table--->
             <?php
             
             if(isset($_POST['send']))
             {
                 $title=$_POST['title'];
                 $message=$_POST['message'];

                 if(empty($title))
                 {}
                 else if(empty($message))
                 {}
                 else
                 {
                     $user=$_SESSION['patient'];
                     $query="INSERT INTO report(title,message,username,date_send)
                     VALUES ('$title','$message','$user',Now())";
                     $res=mysqli_query($conn,$query);

                     if($res)
                     {
                         echo "<script>alert('Report send successfully');</script>";
                     }
                     else
                     {
                        echo "<script>alert('Report not send');</script>"; 
                     }
                 }
             }
               
            
             ?>
        
             <!------------form for sending invoice------>
                           <div class="col-md-12">
                               <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6 jumbotron my-5">
                                       <h5 class="text-center my-2">Send a Report</h5>
                                       <form method="post">
                                           <label>Title</label>
                                           <input type="text" name="title" autocomplete="off"
                                           class="form-control" placeholder="Enter title of the report">

                                           <label>Message</label>
                                           <input type="text" name="message" autocomplete="off"
                                           class="form-control" placeholder="Enter Message">

                                           <input type="submit" name="send" value="Send Report"
                                           class="btn btn-success my-2">
                                       </form>
                                   </div>
                                   <div class="col-md-3"></div>

                               </div>
                           </div>               


                        </div>
                    </div> 
                </div>
            </div>               
</div>
</body>
    </html> 