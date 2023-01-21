<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin-admin"]) || $_SESSION["loggedin-admin"] !== true){
    header("location: login.php");
    exit;
}


    $idpartenariat=$_GET['partenariatid'];
    $username=$_GET['username'];
    $sql="update `demende` set status='done' where id=$idpartenariat and username='$username'";
    $result=mysqli_query($mysqli,$sql);
        if($result){
            // echo "data updated successfuly";
            header('location:dashboard-admin.php');
        }else{
            die(mysqli_error($mysqli));
        }



?>
 