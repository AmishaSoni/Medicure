<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title></title>
</head>
<body>
                                <?php include("../partials/header.php");?>
                                <?php include("../partials/dbconnect.php");?>
                            <?php
                            $ad=$_SESSION['username'];
                            $query="SELECT * FROM `admin` WHERE username='$ad'";
                            $res=mysqli_query($conn,$query);

                            while($row=mysqli_fetch_assoc($res))
                            {
                                $username=$row['username'];
                                $profile=$row['profile'];
                            }

                            ?>
                            <div class="container-fluid">
                                    <div class="col-md-12">
                                    <div class="row">
                                    <div class="col-md-2" style="margin-left:-30px;">
                                    <?php include("sidenav.php");?>
                            </div>
                            <div class="col-md-10">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <h2 class="text-center my-5"><?php echo $username;?> Profile</h2>
                                        <hr>

<!----- query For updating profile picture--------->
<?php
if(isset($_POST['update']))
{
    $profile=($_FILES['profile']['name']);

    if(empty($profile))
    {

    }
    else{
        $query="UPDATE admin SET profile='$profile' WHERE username='$ad'";
        $result=mysqli_query($conn,$query);    
        if($result)
        {
            move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
        } 
    
    }
}
?>
<!----------form for profile pic updation---->
                                        <form method="POST" enctype="multipart/form-data" class="jumbotron">
                                        <?php
                                        echo "<img src='img/$profile' class='col-md-12' class='img-circle' style='width:304px; height:226px;'>";
                                        ?>
                                        <br><br>
                                        <div class="form-group">
                                        <h5 class="text-center my-4 ">UPDATE PROFILE</h5>
                                         <hr>
                                            <label>UPDATE PROFILE</label>
                                            <input type="file" name="profile" class="form-control">

                                        </div>
                                        <input type="submit" name="update" value="UPDATE PROFILE" class="btn btn-success">
                                        </form>
                                </div>
 <!----------- query for Changing Username---->                               
                                <div class="col-md-6">
                                    <?php 
                                    if(isset($_POST['change']))
                                    {
                                        $uname=$_POST['uname'];
                                        if(empty($uname))
                                        {

                                        }
                                        else{
                                            $query= "UPDATE admin SET username='$uname' WHERE username='$ad'";
                                            $res=mysqli_query($conn,$query);

                                            if($res)
                                            {
                                                $_SESSION['username']=$uname;
                                            }
                                        }
                                        
                                    }
                                    ?>
 <!----------form for name updation----->                                   
                                    <form method="post" class="jumbotron">
                                    <h5 class="text-center my-4 ">UPDATE NAME</h5>
                                         <hr>
                                        <label>UPDATE USERNAME</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                        <br>
                                        <input type="submit" name="change" class="btn btn-success" value="UPDATE NAME">


                                    </form>
                                    <br>
                                     <br>
<!-------query for password updation------->
                                      <?php
                                      if(isset($_POST['update_pass']))
                                      {
                                          $old_pass=$_POST['old_pass'];
                                          $new_pass=$_POST['new_pass'];
                                          $con_pass=$_POST['con_pass'];



                                          $error=array();
                                        
                                        
                                            $sql="SELECT * FROM admin WHERE username='$ad'";
                                            $result=mysqli_query($conn,$sql);
                                            $row=mysqli_fetch_assoc($result);
                                            $pass=$row['password'];
                                        

                                            if(empty($old_pass))
                                            {
                                                $error['p']="Enter Old Password!!";
                                            }
                                            else if(empty($new_pass))
                                            {
                                                $error['p']="Enter New Password!!";
                                            }
                                            else if(empty($con_pass))
                                            {
                                                $error['p']="Enter Confirm Password!!";
                                            }
                                            else if(password_verify($old_pass,$row['password']))
                                            {
                                                $error['p']="Invalid Old Password!!";
                                            }
                                            else if($new_pass!=$con_pass)
                                            {
                                                $error['p']="Confirm Password Do Not Match!!";
                                            }

                                            if(count($error)==0)
                                            {
                                                $pass_hash=password_hash($new_pass,PASSWORD_DEFAULT);
                                                $query="UPDATE admin SET password='$pass_hash' WHERE username='$ad'";
                                                mysqli_query($conn,$query);
                                            }
                                      }
                                      if(isset($error['p']))
                                      {
                                          $e=$error['p'];
                                          $show="<h5 class='text-center alert alert-primary'>$e</h5>";

                                      }
                                      else{$show="";}
                                      ?>
                                
<!--------------form for password updation-------->
                                    
                                     <form method="post" class="jumbotron">
                                         <h5 class="text-center my-4 ">UPDATE PASSWORD</h5>
                                         <hr>
                                         <div><?php echo $show;?></div>
                                         <div class="form-group">
                                             <label>OLD PASSWORD</label>
                                             <input type="password" name="old_pass" class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <label>NEW PASSWORD</label>
                                             <input type="password" name="new_pass" class="form-control">
                                          </div>
                                          <div class="form-group">
                                             <label>CONFIRM PASSWORD</label>
                                             <input type="password" name="con_pass" class="form-control">
                                          </div>
                                          <br>
                                        <input type="submit" name="update_pass" class="btn btn-success" value="UPDATE PASSWORD">
                                                
        
                                    </form>
                                </div>
                            </div>
                            </div>
                            </div>

                                </div>

                            </div>
                            </div>
 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>