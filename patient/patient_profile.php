<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Patient's Profile</title>
    </head>
    <body>
        <?php
        include('../partials/header.php');
        include('../partials/dbconnect.php');
        ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left:-30px;">
                      <?php include('sidenav.php');
                      
                      $patient=$_SESSION['patient'];
                      $query="SELECT * FROM patients WHERE username='$patient'";
                      $res=mysqli_query($conn,$query);
                      $row=mysqli_fetch_array($res);
                      
                      ?>
                    </div>
                    <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
<!-----------query for updating profile picture----->
                                           <?php
                                           
                                           if(isset($_POST['upload']))
                                           {
                                               $img=$_FILES['img']['name'];


                                               if(empty($img))
                                               {}
                                               else{
                                                   $query="UPDATE patients SET profile='$img' WHERE username='$patient'";
                                                   $res=mysqli_query($conn,$query);

                                                   if($res)
                                                   {
                                                       move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                                   }
                                               }
                                           }

                                              ?>

                                    <h2 class="text-center my-4"><?php echo $patient;?> Profile</h5>
                                    <form method="post" enctype="multipart/form-data">
                                        <?php
                                        echo "<img src='img/".$row['profile']."' class='col-md-12' 
                                        style='height:250px;'>";
                                        ?>
                                        
                                        <input type="file" name="img" class="form-control my-2">
                                        <input type="submit" name="upload" class="btn btn-info" 
                                        value="Update Profile">
                                        </form>
  <!----------------Details of patient----------------->
  <table class="table table-bordered">
                                      <tr>
                                          <th colspan="2" class="text-center">Details</th>

                                      </tr>
                                      <tr>
                                          <td>Firstname</td>
                                          <td><?php echo $row['firstname'];?></td>

                                      </tr>

                                      <tr>
                                          <td>Surname</td>
                                          <td><?php echo $row['surname'];?></td>
                                          
                                      </tr>

                                      <tr>
                                          <td>Username</td>
                                          <td><?php echo $row['username'];?></td>
                                          
                                      </tr>

                                      <tr>
                                          <td>Email</td>
                                          <td><?php echo $row['email'];?></td>
                                          
                                      </tr>

                                      <tr>
                                          <td>Phone No.</td>
                                          <td><?php echo $row['phone'];?></td>
                                          
                                      </tr>

                                      <tr>
                                          <td>Gender</td>
                                          <td><?php echo $row['gender'];?></td>
                                          
                                      </tr>

                                      <tr>
                                          <td>Country</td>
                                          <td><?php echo $row['country'];?></td>
                                          
                                      </tr>

                                      
                                  </table>                                      

                                </div>
                                <div class="col-md-6">
                                <h5 class="text-center my-4">Change Username</h5>
<!-------------query for updating username------>
                                        <?php
                                         
                                         if(isset($_POST['update']))
                                         {
                                             $uname=$_POST['uname'];

                                             if(empty($uname))
                                             {}
                                             else
                                             {
                                                 $query="UPDATE patients SET username='$uname'
                                                 WHERE username='$patient'";
                                                 $res=mysqli_query($conn,$query);

                                                 if($res)
                                                 {
                                                     $_SESSION['patient']=$uname;
                                                 }
                                             }
                                            }
                                         
                                         ?>
<!--------------form for updating username-------->
                                            <form method="post" class="jumbotron">
                                             <label>Change Username</label>
                                             <input type="text" name="uname" class="form-control"
                                             autocomplete="off" placeholder="Enter Username">
                                             <br>
                                             <input type="submit" name="update" class="btn btn-success"
                                             value="Update Username">
                                         </form>
                                         <br><br>
                                         <h5 class="text-center my-2">Change Password</h5>
<!------------query for updating password---------->
                                 <?php
                                 if(isset($_POST['change']))
                                 {
                                     $old=$_POST['old_pass'];
                                     $new=$_POST['new_pass'];
                                     $con=$_POST['con_pass'];

                                     $sql="SELECT * FROM patients WHERE username='$patient'";
                                     $result=mysqli_query($conn,$sql);
                                     $row=mysqli_fetch_array($result);

                                     $pass=password_hash($new,PASSWORD_DEFAULT);
                                      
                                    if($con!=$new)
                                     {
                                        echo "<script>alert('Both password do not match !!');</script>";
                                     }
                                     else if(!password_verify($old,$row['password']))
                                     {
                                         echo "<script>alert('Password do not match !!');</script>";
                                     }
                                     else if(empty($new))
                                     {
                                        echo "<script>alert('Password is empty !!');</script>";
                                     }
                                     
                                     else
                                     {
                                         $query1="UPDATE patients SET password='$pass'
                                         WHERE username='$patient'";
                                         mysqli_query($conn,$query1);
                                     }
                                 }
                                 ?>
<!------------form for updating password----------->
                                         <form method="post" class="jumbotron">
                                             <div class="form-group">
                                                 <label>Old Password</label>
                                                 <input type="password" name="old_pass" class="form-control"
                                                 autocomplete="off" placeholder="Enter Old Password">
                                             </div>
                                             <div class="form-group">
                                                 <label>New Password</label>
                                                 <input type="password" name="new_pass" class="form-control"
                                                 autocomplete="off" placeholder="Enter New Password">
                                             </div>
                                             <div class="form-group">
                                                 <label>Confirm Password</label>
                                                 <input type="password" name="con_pass" class="form-control"
                                                 autocomplete="off" placeholder="Enter Confirm Password">
                                             </div>
                                             <input type="submit" name="change" class="btn btn-info" 
                                             value="Update Password">
                                         </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>