<?php
session_start();
include 'partials/dbconnect.php';
if(isset($_POST['login']))
{
    
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];

    $error=array();

    if(empty($uname))
    {
        echo "<script>alert('Enter Username')</script>";
    }
    else if(empty($pass))
    {
        echo "<script>alert('Enter Password')</script>";
    }
    else
    {
        $query="SELECT * FROM patients WHERE `username`='$uname'";
        $res=mysqli_query($conn,$query);
        $numrows=mysqli_num_rows($res);
        if($numrows==1)
        {
            $row=mysqli_fetch_assoc($res);
            if(password_verify($pass,$row['password']))
            {
                session_start();
                $_SESSION['patient']=$uname;
                header("Location:patient/patient_index.php");
                exit();
            }
            else
            {
                echo "<script>alert('Invalid Account')</script>";
            }
           
        }
    }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
<script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  </script>
  
  
  <title>Patient Login</title>
  </head>
  <body style="background-image:url('images/Admin_bg.jpg'); background-repeat:no repeat; background-size:cover;">
    <?php include('partials/header.php')?>
     

    <div class="container" style="margin-top:50px">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                <img src="images/patient_logo.png" style="width:100%;height:190px;" class="my-2">
<!-----------form for doctor login---------------->
                    <form action="" method="POST" >
                    <div class="form-group">
                            <label>Username</label>
                            <input type="text" placeholder="Enter your username"
                            name="uname" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control"
                            placeholder="Enter Your password">
                        </div>
                        
                        <input type="submit" name="login" class="btn btn-success text-center" value="Login">
                        <p>Don't have an account ? <a href="patient_apply.php"> Click here</a></p>
                        </form>
                </div>
                <div class="col-md-3"></div>
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