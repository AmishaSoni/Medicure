<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Doctor's Profile</title>
        </head>
        <body>
            <?php include("../partials/header.php");
            include("../partials/dbconnect.php");?>
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2" style="margin-left:-30px;">
                        <?php
                        include('sidenav.php');
                    
                        ?>
                        </div>
                        <div class="col-md-10">
                            <div class="container-fluid">
                                <div class="col-md-12">
                                 <div class="row">
                                     <div class="col-md-6">
<!-------------query for profile updation of data from doctor table--->
<?php

$doc=$_SESSION['doctor'];
$query="SELECT * FROM doctors WHERE username='$doc'";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($res);



if(isset($_POST['upload']))
{
    $img=($_FILES['img']['name']);

    if(empty($img))
    {}
    else
    {
        $query="UPDATE doctors SET profile='$img' WHERE username='$doc'";
        $res=mysqli_query($conn,$query);

        if($res)
        {
            move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
        }

    }
}


?>
<h2 class="text-center my-4"><?php echo $doc;?> Profile</h5>
<form method="post" enctype="multipart/form-data">
    <?php
      echo "<img src='img/".$row['profile']."' style='height:250px;' class='col-md-12 my-4'>";

    
    ?>

     <!------------form to update profile picture------------->   
    <input type="file" name="img" class="form-control">
    <input type="submit" name="upload" class="btn btn-success my-2" value="Update Profile">
</form>
                              <div class="my-3">
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

                                      <tr>
                                          <td>Salary</td>
                                          <td><?php echo $row['salary'];?></td>
                                          
                                      </tr>
                                  </table>
                              </div>

                                     </div>
                                     <div class="col-md-6">
                                       
                                         <h5 class="text-center my-2">Change Username</h5>
<!-------------query for updating username------>
                                        <?php
                                         
                                         if(isset($_POST['change_uname']))
                                         {
                                             $uname=$_POST['uname'];

                                             if(empty($uname))
                                             {}
                                             else
                                             {
                                                 $query="UPDATE doctors SET username='$uname'
                                                 WHERE username='$doc'";
                                                 $res=mysqli_query($conn,$query);

                                                 if($res)
                                                 {
                                                     $_SESSION['doctor']=$uname;
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
                                             <input type="submit" name="change_uname" class="btn btn-success"
                                             value="Update Username">
                                         </form>
                                         <br><br>

                                         <h5 class="text-center my-2">Change Password</h5>
<!------------query for updating password---------->
                                 <?php
                                 if(isset($_POST['change_pass']))
                                 {
                                     $old=$_POST['old_pass'];
                                     $new=$_POST['new_pass'];
                                     $con=$_POST['con_pass'];

                                     $sql="SELECT * FROM doctors WHERE username='$doc'";
                                     $result=mysqli_query($conn,$sql);
                                     $row=mysqli_fetch_array($result);

                                    
                                     $pass=password_hash($new,PASSWORD_DEFAULT);
                                      
                                     if(!password_verify($old,$row['password']))
                                     {
                                        echo "<script>alert('Password do not match !!');</script>";
                                     }
                                     else if(empty($new))
                                     {
                                        echo "<script>alert('Password is empty !!');</script>";
                                     }
                                     else if($con!=$new)
                                     {
                                        echo "<script>alert('Both password do not match !!');</script>";
                                     }
                                     else
                                     {
                                         $query1="UPDATE doctors SET password='$pass'
                                         WHERE username='$doc'";
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
                                             <input type="submit" name="change_pass" class="btn btn-info" 
                                             value="Update Password">
                                         </form>
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