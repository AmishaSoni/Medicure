<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  
  <title>Job Request</title>
  </head>
  <body>
      <?php include('../partials/header.php');?>
      <?php include('../partials/dbconnect.php');?>


      <div class="container-fluid">
          <div class="col-md-12">
              <div class="row">
                  <div class="col-md-2" style="margin-left:-30px;">
                      <?php include("sidenav.php");?>

                   </div>
                   <div class="col-md-10">
                       <h2 class="text-center my-4">Job Request</h2>
                       
                       
    <?php
                    $query="SELECT * FROM doctors WHERE status='pending' ORDER BY data_reg ASC";
                    $res=mysqli_query($conn,$query);


            $output="";

            $output .="
            <table class='table table-bordered'>
            <tr>
                <th>ID</th>
                <th>FirstName</th>
                <th>SurName</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Data Registered</th>
                <th>Action</th>
            </tr>";

            if(mysqli_num_rows($res)<1)
            {
                $output .="
                <tr>
                <td colspan='10' class='text-center'>No Job Request Yet</td>
                </tr>";
            }

            while($row=mysqli_fetch_array($res))
            {
                $output .="
                <tr>
                <td>".$row['id']."</td>
                <td>".$row['firstname']."</td>
                <td>".$row['surname']."</td>
                <td>".$row['username']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['country']."</td>
                <td>".$row['data_reg']."</td>
                <td>
                    <div class='col-md-12'>
                    <div class='row'>
                    <div class='col-md-6'>
                    <a href='approve.php?id=".$row['id']."'><button class='btn btn-success approve' style='text-decoration:none';>Approve</buttton></a>
                    </div>
                    <div class='col-md-6'>
                    <a href='reject.php?id=".$row['id']."'><button class='btn btn-danger reject' style='text-decoration:none';>Reject</buttton></a>
                    </div>
                    </div>
                    </div>
                </td>";
               
            }
            $output .="
            </tr>
            </table>";

            echo $output;
                
            
            ?>
                    </div>
                </div>
            </div>
         </div>

         
  </body>
</html>