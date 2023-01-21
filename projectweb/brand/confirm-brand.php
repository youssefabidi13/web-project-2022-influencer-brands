<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin-brand"]) || $_SESSION["loggedin-brand"] !== true){
    header("location: brand-login.php");
    exit;
}
$username=$_SESSION['username'];
$idpartenariat=$_GET['partenariatid'];
$sql0="select * from `partenariat` where id=$idpartenariat";
$result0=mysqli_query($mysqli,$sql0);
    if($result0){
        while($row=mysqli_fetch_assoc($result0)){
            $id=$row['id'];
            $sender=$row['sender'];
            $receiver=$row['receiver'];
        }
    }else{
        die(mysqli_error($mysqli));
    }



    $sql="update `partenariat` set status='oui' where id=$idpartenariat and receiver='$username'";
    $result=mysqli_query($mysqli,$sql);
        if($result){
            // echo "data updated successfuly";
            header('location:dashboard-brand.php');
        }else{
            die(mysqli_error($mysqli));
        }





?>
 