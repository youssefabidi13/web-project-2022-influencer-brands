<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin-admin"]) || $_SESSION["loggedin-admin"] !== true){
    header("location: admin-login.php");
    exit;
}

$id=$_GET['updateid'];
$sql="select * from  `users` where id=$id";
$result=mysqli_query($mysqli,$sql);


$row=mysqli_fetch_assoc($result);
$id=$row['id'];
$username=$row['username'];
$photo=$row['photo'];
$nom=$row['nom'];
$prenom=$row['prenom'];
$email=$row['email'];
$age=$row['age'];
$instagram=$row['instagram'];
$facebook=$row['facebook'];
$youtube=$row['youtube'];


if(isset($_POST['submit'])){
    $photo=$_FILES['image']['name'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $instagram=$_POST['instagram'];
    $facebook=$_POST['facebook'];
    $youtube=$_POST['youtube'];
    $sql="update `users` set nom='$nom',photo='$photo' , prenom='$prenom', email='$email', age='$age', instagram='$instagram', facebook='$facebook', youtube='$youtube' where id=$id";
    move_uploaded_file($_FILES['image']['tmp_name'],"../influenceur/assets/pics/".$username.'-'.$photo);    
    
    $result=mysqli_query($mysqli,$sql);
    if($result){
        // echo "data updated successfuly";
        header("location: dashboard-admin.php");
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/style.css" />
  <link rel="stylesheet" href="./assets/queries.css" />
  <title>Update Profile</title>
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
                <label>nom</label>
                <input type="text" name="nom" placeholder="enter your nom" value="<?php echo $nom;?>">
              </div>
              <div>
                <label>prenom</label>
                <input type="text" name="prenom" placeholder="enter your prenom" value="<?php echo $prenom;?>">
              </div>
              <div>
                <label>Email </label>
                <input type="email" name="email" placeholder="enter your email" value="<?php echo $email;?>">
              </div>
              <div>
                <label>age</label>
                <input type="text" name="age" placeholder="enter your age" value="<?php echo $age;?>">
              </div>
              <div>
                <label>instagram</label>
                <input type="text" name="instagram" placeholder="enter your instagram" value="<?php echo $instagram;?>">
              </div>
              <div>
                <label>facebook</label>
                <input type="text" name="facebook" placeholder="enter your facebook" value="<?php echo $facebook;?>">
              </div>
              <div>
                <label>youtube</label>
                <input type="text" name="youtube" placeholder="enter your youtube" value="<?php echo $youtube;?>">
              </div>
              <div>
                <label>image</label>
                <input type="file" name="image" placeholder="enter your image">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn--form">Modifier</button>
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