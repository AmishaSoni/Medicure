<?php
include("partials/dbconnect.php");


if(isset($_POST['create']))
{
    $firstname=$_POST['fname'];
    $surname=$_POST['sname'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $password=$_POST['pass'];
    $con_password=$_POST['con_pass'];


    $error=array();

    if(empty($firstname))
    {
        $error['ac']="Enter Firstname";
    }
    else if(empty($surname))
    {
        $error['ac']="Enter Surname";
    }
    else if(empty($username))
    {
        $error['ac']="Enter Username";
    }
    else if(empty($email))
    {
        $error['ac']="Enter Your Email";
    }
    else if($gender=="")
    {
        $error['ac']="Select Your Gender";
    }
    else if(empty($phone))
    {
        $error['ac']="Enter Phone Number";
    }
    else if($country=="")
    {
        $error['ac']="Select Country";
    }
    else if(empty($password))
    {
        $error['ac']="Enter Password";
    }
    else if(empty($con_password))
    {
        $error['ac']="Both Password do not match";
    }

    if(count($error)==0)
{
    if($password==$con_password)
    {
        $pass=password_hash($password,PASSWORD_DEFAULT);
        $query="INSERT INTO patients(firstname,surname,username,email,gender,phone,country,password,data_reg,profile)
        VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$country','$pass',NOW(),'doctor.jpg')";
       $result=mysqli_query($conn,$query);


    if($result)
    {
        echo "<script>alert('You have Successfully Applied')</script>";
        header("Location:patient_login.php");
        exit();
    }
    else
    {
        echo "<script>alert('Failed')</script>";
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
  
  
  <title>Patient  Apply</title>
  </head>
  <body style="background-image:url('images/Admin_bg.jpg'); background-repeat:no repeat; background-size:cover;">
      <?php include("partials/header.php");?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 my-3 jumbotron">
                <h5 class="text-center">Create Account</h5>
            
 <!-----------form for application--------------->               
                <form method="post">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" name="fname" class="form-control"
                        autocomplete="off" placeholder="Enter Your Firstname">

                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="sname" class="form-control"
                        autocomplete="off" placeholder="Enter Your Surname">

                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter Your Username">

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"
                        autocomplete="off" placeholder="Enter Your Email Address">

                    </div>
                    <div class="form-group">
                        <label>Select  Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Your Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control"
                        autocomplete="off" placeholder="Enter Your Phone Number">
                    </div>
                    <div class="form-group">
                        <label>Select Country</label>
                        <select name="country" class="form-control">
                            <option value="">Select Your Country</option>
                            <option value="India">India</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Srilanka">SriLanka</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control"
                        autocomplete="off" placeholder="Enter Your Password">

                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" name="con_pass" class="form-control"
                        autocomplete="off" placeholder="Confirm Your Password">

                    </div>
                    <input type="submit" name="create" class="btn btn-success text-center" value="Create Account">
                        <p>Already have an account ? <a href="patient_login.php"> Click here </a></p>
                </form>
                </div>
                <div class="col-md-3"></div>
                </div>
                </div>
            </div>

    </body>
</html>