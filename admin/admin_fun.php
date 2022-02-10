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

    <title>Medicure</title>
  </head>
  <body>
      <?php
      include('../partials/header.php');
      ?>
      <div class="container-fluid">
          <div class="col-md-12">
              <div class="row">
                  <div class="col-md-2" style="margin-left:-30px;">
                  <?php 
                  include("sidenav.php");
                  include("../partials/dbconnect.php");
                  ?>
                  </div>
                  <div class="col-md-10">
                      <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-6">
                                  <h5 class="text-center my-4">All Admin</h5>
                                  <hr>
     <!---Fetching data from admin----->
                 <?php
                 $name=$_SESSION['username'];
                 $query="SELECT * FROM admin WHERE username !='$name'";
                 $result=mysqli_query($conn,$query);
                   
                 $output="";
                 $output .="
                                   <table class='table table-bordered'>
                                   <tr> 
                                   <th>ID</th>
                                    <th>USERNAME</th>
                                    <th style='width:10%;'>ACTION</th>
                                    </tr>";
                                  
                if(mysqli_num_rows($result)<1)
                {
                    $output .="
                    <tr>
                    <td colspan='3' class='text-center'>No New Admin</td>
                    </tr>";
                }          
                while($row=mysqli_fetch_assoc($result))
                {
                    $id=$row['id'];
                    $username=$row['username'];

                    $output .="
                    <tr>
                    <td>$id</td>
                    <td>$username</td>
                    <td>
                    <a href='admin_fun.php?id=$id' style='text-decoration:none;'><button id='$id' class='btn btn-danger text-white'>REMOVE
                    </a></button>
                    </td>";
                }        
                $output .="
                </tr>
                </table>";
                
                echo $output;

            

//Deleting data from admin table--->
                 if(isset($_GET['id']))
                 {
                     $id=$_GET['id'];
                     $query="DELETE FROM `admin` WHERE id='$id'";
                     mysqli_query($conn,$query);
                 }







                ?>
                
                    



                </div>
                <!---------form for adding new member---------->
                                <div class="col-md-6">
                                   
                <!---Query for inserting into admin table---->
                <?php 
                if(isset($_POST['add']))
                {
                    $username=$_POST['uname'];
                    $pass=$_POST['pass'];
                    $pass_hash=password_hash($pass,PASSWORD_DEFAULT);
                    $image=($_FILES['img']['name']);

                    $error = array();

                    if(empty($username))
                    {
                        $error['u']="Enter Admin Username";
                    }
                    else if(empty($pass))
                    {
                        $error['u']="Enter Admin Password";
                    }
                    else if(empty($image))
                    {
                        $error['u']="Add Admin Profile";
                    }

                    if(count($error)==0)
                    {
                        $sql="INSERT INTO `admin`(`username`,`password`,`profile`) 
                          VALUES ('$username','$pass_hash','$image')";
                        $result=mysqli_query($conn,$sql);

                        if($result)
                        {
                            move_uploaded_file($_FILES['img']['tmp_name'],'img/$image');

                        }
                
                    }
                }
                       if(isset($error['u']))
                       {
                           $er=$error['u'];

                           $show="<h5 class='text-center alert alert-secondary'>$er</h5>";
                       }
                       else{
                           $show="";
                       }

                ?>                  
                                     <h5 class="text-center my-4">Add Admin</h5>
                                    <hr>
                                    <form method="POST" action="" enctype="multipart/form-data" class="jumbotron">
                                       <div>
                                           <?php echo $show;?>
                                       </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="uname" class="form-control"
                                            autocomplete="off"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="pass" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                        <label>Add Profile Picture</label>
                                            <input type="file" name="img" class="form-control" />
                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-success" name="add" value="Add New Admin"/>
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