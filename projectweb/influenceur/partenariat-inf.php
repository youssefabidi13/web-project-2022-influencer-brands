<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$inf_username=$_GET['infusername'];
$brand_username=$_GET['brandusername'];
// echo $inf_username.''.$brand_username;
if(isset($_POST['submit'])){
    
    $contratname=$_POST['contratname'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $montant=$_POST['montant'];
    $status="non";
    $sql1="insert into `partenariat` (sender, receiver, contratname, from_date, to_date, montant, status) values ('$inf_username', '$brand_username', '$contratname', '$from_date', '$to_date', '$montant', '$status') ";
    $result=mysqli_query($mysqli,$sql1);
    if($result){
        // echo "data updated successfuly";
        header('location:dashboard-inf.php');
    }else{
        die(mysqli_error($mysqli));
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Always include this line of code!!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="./assets/style.css" />
  <link rel="stylesheet" href="./assets/queries.css" />



  <title>My Brand</title>
</head>

<body>


  <section class="section-cta" id="cta">
    <div class="container">
      <div class="cta">
        <div class="cta-text-box">
          <h2 class="heading-secondary">Partenariat</h2>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="cta-form">
              <div>
                <label>contrat_name</label>
                <input type="text" name="contratname" placeholder="enter your contrat name" value="">
              </div>
              <div>
                <label>from date</label>
                <input type="date" name="from_date" placeholder="enter start date" value="">
              </div>
              <div>
                <label>to date </label>
                <input type="date" name="to_date" placeholder="enter end date" value="">
              </div>
              <div>
                <label>montant</label>
                <input type="int" name="montant" placeholder="enter montant" value="">
              </div>

            </div>
            <div class="form-group">

              <button type="submit" name="submit" class="btn btn--form" value="submit">submit</button>
            </div>

          </form>
        </div>
        <div class="cta-img-box" id="skewed" role="img"></div>
      </div>
    </div>
  </section>
  </main>

</body>

</html>