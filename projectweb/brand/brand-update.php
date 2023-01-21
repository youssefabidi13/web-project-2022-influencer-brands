<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin-brand"]) || $_SESSION["loggedin-brand"] !== true){
    header("location: brand-login.php");
    exit;
}
$id=$_GET['updateid'];
$sql="select * from  `brand` where id=$id";
$result=mysqli_query($mysqli,$sql);


$row=mysqli_fetch_assoc($result);
$id=$row['id'];
$username=$row['username'];
$photo=$row['photo'];
$email=$row['email'];
$CA=$row['CA'];



if(isset($_POST['submit'])){
    $photo=$_FILES['image']['name'];
    $email=$_POST['email'];
    $CA=$_POST['CA'];
    $sql="update `brand` set photo='$photo', email='$email', CA='$CA' where id=$id";
    move_uploaded_file($_FILES['image']['tmp_name'],"assets/pics/".$username.'-'.$photo);   
    
    
    $result=mysqli_query($mysqli,$sql);
    if($result){
        // echo "data updated successfuly";
        header('location:brand-profile.php');
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



  <title>Update Brand</title>
</head>

<body>


  <section class="section-cta" id="cta">
    <div class="container">
      <div class="cta">
        <div class="cta-text-box">
          <h2 class="heading-secondary">Modifier le profile!</h2>
          <form method="POST" enctype="multipart/form-data">
            <div class="cta-form">
              <div>
                <label>Email </label>
                <input type="email" name="email" placeholder="enter your email" value="<?php echo $email;?>">
            </div>
            <div>
                <label>CA</label>
                <input type="text" name="CA" placeholder="enter your CA" value="<?php echo $CA;?>">
            </div>
              <div>
                <label>image</label>
                <input type="file" name="image" placeholder="enter your image" value="<?php echo $photo;?>">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn--form">Modifier</button>
            </div>

          </form>

        </div>
        <div class="cta-img-box" id="skewed" role="img" ></div>
      </div>
    </div>
  </section>
  </main>

</body>

</html>