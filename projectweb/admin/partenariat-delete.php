<?php
include '../config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `partenariat` where id=$id";
    $result=mysqli_query($mysqli,$sql);
    if($result){
        // echo "deleted successfully";
        header('location:dashboard-admin.php');
    }else
    die(mysqli_error($mysqli));
}
?>