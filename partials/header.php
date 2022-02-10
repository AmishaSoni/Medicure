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
  
  
  <title>Medicure</title>
  </head>
  <body>
<?php

echo '<nav class="navbar navbar-expand-lg navbar-info bg-info">
    <h5 class="text-white">Hospital Management System</h5>
    <div class="mr-auto"></div>
    <ul class="navbar-nav">';

//if session set then show username and logout button

if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true)
{
  
      $user=$_SESSION['username'];
      echo '<li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
      <li class="nav-item"><a href="../admin/admin_logout.php" class="nav-link text-white">Logout</a></li>
  </ul> ';
  

}

else if(isset($_SESSION['doctor']))
{
  $user=$_SESSION['doctor'];
  echo '<li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
  <li class="nav-item"><a href="../doctor/doctor_logout.php" class="nav-link text-white">Logout</a></li>
</ul> ';


}
else if(isset($_SESSION['patient']))
{
  $username=$_SESSION['patient'];
  echo '<li class="nav-item"><a href="" class="nav-link text-white">'.$username.'</a></li>
  <li class="nav-item"><a href="../patient/patient_logout.php" class="nav-link text-white">Logout</a></li>
</ul> ';


}

else{

  
  echo '<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
  <li class="nav-item"><a href="admin_login.php" class="nav-link text-white">Admin</a></li>
      <li class="nav-item"><a href="doctor_login.php" class="nav-link text-white">Doctor</a></li>
      <li class="nav-item"><a href="patient_login.php" class="nav-link text-white">Patient</a></li>
  ';


}
    
echo '
</ul> </nav>';




 ?> 
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