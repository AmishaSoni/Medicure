<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Income</title>
    </head>
    <body>
        <?php
        include("../partials/header.php");
        include("../partials/dbconnect.php");
        ?>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-d-2" style="margin-left:-30px;">
                      <?php
                        include("sidenav.php");
                      ?>
                    </div>
                    <div class="col-md-10">
                        <h2 class="text-center my-4">Total Report</h2>
                    
                     <?php
                     
                     $query="SELECT * FROM income";

                     $res=mysqli_query($conn,$query);
                     $output ="";
                     $output .="
                     <table class='table table-bordered'>
                     <tr>
                     <td>ID</td>
                     <td>Doctor</td>
                     <td>Patient</td>
                     <td>Date Discharge</td>
                     <td>Fee</td>
                     </tr>
                     ";
                    if(mysqli_num_rows($res)<1)
                    {
                        $output .="
                        <tr>
                        <td class='text-center' colspan='5'>No Patient Discharge Yet</td>
                        </tr>";  
                    } 
                    while($row=mysqli_fetch_array($res))
                    {
                        $output .="
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['doctor']."</td>
                        <td>".$row['patient']."</td>
                        <td>".$row['date_discharge']."</td>
                        <td>".$row['amount_paid']."</td>

                        ";
                        
                    }
                      $output .="</tr></table>";

                     
                     echo $output;
                     
                     
                     ?>
                        
                </div>
            </div>
        </div>
    </body>
    </html>