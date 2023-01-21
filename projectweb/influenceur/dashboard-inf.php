
<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



$id = $_SESSION['id'];
$user=$_SESSION['username'];
$sql = "SELECT COUNT(id) AS 'Total Partenariat' FROM partenariat where sender='$user' or receiver='$user'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$Total_partenariat = $row['Total Partenariat'];


$sql = "SELECT COUNT(id) AS 'Total Marque' FROM brand";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$Totale_marque = $row['Total Marque'];

$id=$_SESSION['id'];
$sql="SELECT * FROM `users` where id=$id";
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="./assets/styles-dashboard.css" />
    <title>Dashboard influenceur</title>
  </head>

  <body>
    <div class="side-menu">
      <div class="brand-name">
        <h1 class="rec">Hello <?= $user;?></h1>
        <?= '<img style="width:3em;height:3em;border-radius: 50%; margin:0 10px; " src="assets/pics/'.$user.'-'.$photo.'">';?>
      </div>
      <ul>

        <li><img src="./assets/imgs/2.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="http:profile.php">Mon profile</a></span></li>
        <li><img src="./assets/imgs/3.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="#brand">Marques</a></span></li>
        <li><img src="./assets/imgs/4.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="#ptr">Mes partenariat</a></span></li>
        <li><img src="./assets/imgs/6.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="logout.php">Deconnexion</a></span></li>
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
              <h1 class="rec1">+<?= $Totale_marque;?></h1>
              <h3 class="rec1">Marques</h3>
            </div>
            <div class="icon-case">
              <img src="./assets/imgs/7.png" alt="" />
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
          <div class="card" id="brand"><a href="./reset-pwd.php">
            <div class="box">
              <h1 class="rec1">Modifier</h1>
              <h3 class="rec1">Password</h3>
            </div>
            <div class="icon-case">
              <img src="./assets/imgs/img.jpeg" alt="" />
            </div>
          </div></a>
        </div>
        <div class="content-2" >
          <div class="recent-payments">
          <hr>
            <div class="title">
              <h2 class="rec" >Marque</h2>
            </div>
            <table class="rec">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Profile</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Montant</th>
            <th scope="col">Operation</th>     
            </tr>
            <tbody>
              <?php
              $id=$_SESSION['id'];
              $sql="SELECT * FROM `brand`";
              $result=mysqli_query($mysqli,$sql);
                  if($result){
                      while($row=mysqli_fetch_assoc($result)){
                          $id=$row['id'];
                          $photo=$row['photo'];
                          $username=$row['username'];
                          $email=$row['email'];
                          $CA=$row['CA'];
                          echo '
                          <th scope="row">'.$id.'</th>
                              <td><img src="../brand/assets/pics/'.$username.'-'.$photo.'" width="50" height="50" style="border-radius:50%;"></td>
                              <td>'.$username.'</td>
                              <td>'.$email.'</td>
                              <td>'.$CA.'</td>
                              <td><button ><a class="btn" href="msg.php?brandusername='.$username.'#down">contacter</a></button></td>
                              </tr>
                          ';
                      }
                  }
              ?>
            </tbody>
            </table>
            <hr>
            <div class="title" id="ptr">
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
              $user=$_SESSION['username'];
              echo $user;
              $sql="SELECT * FROM `partenariat` where sender='$user'or receiver='$user'";
              $result=mysqli_query($mysqli,$sql);
                  if($result){
                      while($row=mysqli_fetch_assoc($result)){
                          $id=$row['id'];
                          $contrat=$row['contratname'];
                          $sender=$row['sender'];
                          $receiver=$row['receiver'];
                          $from_date=$row['from_date'];
                          $to_date=$row['to_date'];
                          $montant=$row['montant'];
                          $status=$row['status'];
                          echo '
                          <th scope="row">'.$id.'</th>
                              <td>'.$contrat.'</td>
                              <td>'.$sender.'</td>
                              <td>'.$receiver.'</td>
                              <td>'.$from_date.'</td>
                              <td>'.$to_date.'</td>
                              <td>'.$montant.'</td>
                              <td>'.$status.'</td>
                              <td><button type="submit"><a class="btn" href="confirm-inf.php?partenariatid='.$id.'">confirmer</a></button></td>
                              </tr>
                          ';
                      }
                  }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
