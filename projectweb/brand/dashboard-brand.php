<?php 
require_once "../config.php";
?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin-brand"]) || $_SESSION["loggedin-brand"] !== true){
    header("location: brand-login.php");
    exit;
}

$user = $_SESSION['username'];
$sql = "SELECT COUNT(id) AS 'Total Partenariat' FROM partenariat where sender='$user' or receiver='$user'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$Total_partenariat = $row['Total Partenariat'];


$sql = "SELECT COUNT(id) AS 'Total Influencer' FROM users";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$Totale_influenceur = $row['Total Influencer'];


$id=$_SESSION['id'];
$sql="SELECT * FROM `brand` where id=$id";
$result=mysqli_query($mysqli,$sql);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
      $photo=$row['photo'];
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="./assets/styles-dashboard.css" />
    <title>Dashboard Brand</title>
</head>

    



<body>


    <div class="side-menu">
      <div class="brand-name">
        <h1 class="rec">Hello <?= $user;?></h1>
        <?= '<img style="width:3em;height:3em;border-radius: 50%; margin:0 10px; " src="assets/pics/'.$user.'-'.$photo.'">';?>
      </div>
      <ul>

        <li><img src="./assets/imgs/2.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="http:brand-profile.php">Mon profile</a></span></li>
        <li><img src="./assets/imgs/selfie (2).png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="#inf">Influenceurs</a></span></li>
        <li><img src="./assets/imgs/4.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="#prt">Mes partenariat</a></span></li>
        <li><img src="./assets/imgs/6.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="brand-logout.php">Deconnexion</a></span></li>
      </ul>
    </div>


    <div class="container">
      <div class="header">
        <div class="nav">
          <div class="user">
            <div class="img-case">
              <img src="./assets/imgs/brand-image.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="cards">
          <div class="card">
            <div class="box">
              <h1 class="rec1">+<?= $Totale_influenceur;?></h1>
              <h3 class="rec1">Influenceurs</h3>
            </div>
            <div class="icon-case">
              <img src="assets/imgs/selfie (1).png" alt="" />
            </div>
          </div>

          <div class="card">
            <div class="box">
              <h1 class="rec1">+<?=$Total_partenariat?></h1>
              <h3 class="rec1">Partenariat</h3>
            </div>
            <div class="icon-case">
              <img src="./assets/imgs/8.png" alt="" />
            </div>
          </div>
          <div class="card" id="inf"><a href="./reset-pwd-brand.php">
            <div class="box">
              <h1 class="rec1">Modifier</h1>
              <h3 class="rec1">Password</h3>
            </div>
            <div class="icon-case">
              <img src="./assets/imgs/img.jpeg" alt="" />
            </div>
          </div></a>
        </div>
        <div class="content-2">
          <div class="recent-payments">
          <hr>
            <div class="title" >
              <h2 class="rec">Influenceurs</h2>
            </div>
            <table class="rec">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">profile</th>
                <th scope="col">username</th>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">email</th>
                <th scope="col">age</th>
                <th scope="col">operation</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $id=$_SESSION['id'];
              $sql="SELECT * FROM `users`";
              $result=mysqli_query($mysqli,$sql);
                  if($result){
                      while($row=mysqli_fetch_assoc($result)){
                          $id=$row['id'];
                          $username=$row['username'];
                          $photo=$row['photo'];
                          $nom=$row['nom'];
                          $prenom=$row['prenom'];
                         $email=$row['email'];
                          $age=$row['age'];
                          echo '
                          <th scope="row">'.$id.'</th>
                              <td><img src="../influenceur/assets/pics/'.$username.'-'.$photo.'" width="50" height="50" style="border-radius:50%;"></td>
                              <td>'.$username.'</td>
                              <td>'.$nom.'</td>
                              <td>'.$prenom.'</td>
                              <td>'.$email.'</td>
                              <td>'.$age.'</td>
                              <td><button ><a class="btn" href="message-brand.php?influencerusername='.$username.'#down">contacter</a></button></td>
                              </tr>
                          ';
                      }
                  }
              ?>
            </tbody>
            </tbody>
            </table>
            <hr id="prt">

    
            <div class="title">
              <h2 class="rec">Partenariat</h2>
              
            </div>

            <table class="rec">
              <tr>
                <th>Numero-Contrat</th>
                <th>Contrat Name</th>
                <th>sender</th>
                <th>receiver</th>
                <th>Date-Debut</th>
                <th>Date-Fin</th>
                <th>Montant</th>
                <th>Status</th>
                <th>Operation</th>


              </tr>
              <tbody>
              <?php
              $userid=$_SESSION['username'];
              $sql="SELECT * FROM `partenariat` where sender='$userid'or receiver='$userid' order by status asc";
              $result=mysqli_query($mysqli,$sql);
                  if($result){
                      while($row=mysqli_fetch_assoc($result)){
                          $id=$row['id'];
                          $contratname=$row['contratname'];
                          $sender=$row['sender'];
                          $receiver=$row['receiver'];
                          $from_date=$row['from_date'];
                          $to_date=$row['to_date'];
                          $montant=$row['montant'];
                          $status=$row['status'];
                          echo '
                          <th scope="row">'.$id.'</th>
                              <td>'.$contratname.'</td>
                              <td>'.$sender.'</td>
                              <td>'.$receiver.'</td>
                              <td>'.$from_date.'</td>
                              <td>'.$to_date.'</td>
                              <td>'.$montant.'</td>
                              <td>'.$status.'</td>
                              <td><button type="submit"><a class="btn" href="confirm-brand.php?partenariatid='.$id.'">confirmer</a></button></td>
                              </tr>
                          ';
                      }
                  }
              ?>
              </tbody>


</body>

</html>