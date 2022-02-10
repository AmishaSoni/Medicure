<?php
session_start();
include("../partials/dbconnect.php");
if(isset($_GET["id"]))
{
$idd=$_GET["id"];
$query="UPDATE doctors SET status='approved' WHERE id='$idd'";
mysqli_query($conn,$query);
header("location:job_request.php");
}
?>