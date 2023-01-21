<?php 
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

        $username=$_GET['username'];
        $sql="INSERT INTO demende (username,infoubrand) VALUES ('$username', 'inf')";
        $result=mysqli_query($mysqli,$sql);
        if($result){
            // echo 'data executed successfully';
            header("location:dashboard-inf.php");
        }
    
        
?>