<?php 
require_once "../config.php";
?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin-admin"]) || $_SESSION["loggedin-admin"] !== true){
    header("location: admin-login.php");
    exit;
}


$id = $_SESSION['id'];

$sql = "SELECT COUNT(id) AS 'Total Partenariat' FROM partenariat ";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$Totale_partenariat = $row['Total Partenariat'];


$sql = "SELECT COUNT(id) AS 'Total Marque' FROM brand";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$Totale_marque = $row['Total Marque'];


$sql = "SELECT COUNT(id) AS 'Total Influenceur' FROM users";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$Totale_influenceur = $row['Total Influenceur'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="assets/styles-dashboard.css" />
  <title>Dashboard Admin</title>
</head>

<body>
  <div class="side-menu">
    <div class="brand-name">
      <h1 class="rec">Administrateur</h1>
    </div>
    <ul>
      <li><img src="./assets/imgs/selfie (2).png" alt="" />&nbsp;<span><a style="color:#19c8fa;"
            href="#inf">Influenceur</a></span>
      </li>
      <li><img src="./assets/imgs/3.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="#ma">Marques</a></span>
      </li>
      <li><img src="./assets/imgs/4.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="#pa">Mes
            partenariat</a></span></li>
      <li><img src="./assets/imgs/12.png" alt="" />&nbsp;<span><a style="color:#19c8fa;"
            href="reset-pwd-admin.php">Modifier Password</a></span></li>
      <li><img src="./assets/imgs/6.png" alt="" />&nbsp;<span><a style="color:#19c8fa;"
            href="logout-admin.php">Deconnexion</a></span></li>
    </ul>
  </div>
  <div class="container">
    <div class="header">
      <div class="nav">
        <div class="user">
          <div class="img-case">
            <img src="assets/imgs/brand-image.png" alt="" />
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
            <img src="assets/imgs/7.png" alt="" />
          </div>
        </div>

        <div class="card">
          <div class="box">
            <h1 class="rec1">+<?= $Totale_influenceur;?></h1>
            <h3 class="rec1">Influenceur</h3>
          </div>
          <div class="icon-case">
            <img src="assets/imgs/selfie (1).png" alt="" />
          </div>
        </div>
        <div class="card">
          <div class="box">
            <h1 class="rec1">+<?= $Totale_partenariat;?></h1>
            <h3 class="rec1">Partenariat</h3>
          </div>
          <div class="icon-case">
            <img src="assets/imgs/8.png" alt="" />
          </div>
        </div>


        <div class="icon-case">
          <img src="./assets/imgs/img.jpeg" alt="" />
        </div>

      </div>
      <div class="content-2">
        <div class="recent-payments">
          <hr>
          <div id="inf" class="title">
            <h2 class=" rec">Demende suppression</h2>


          </div>
          <table class="rec">

            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">username</th>
                <th scope="col">influenceur ou marque</th>
                <th scope="col">status</th>
                <th scope="col">operation</th>
                
              </tr>
            </thead>
            <tbody>
              <?php
                      $id=$_SESSION['id'];
                      $sql="SELECT * FROM `demende` order by status desc";
                      $result=mysqli_query($mysqli,$sql);
                          if($result){
                              while($row=mysqli_fetch_assoc($result)){
                                  $id=$row['id'];
                                  $username=$row['username'];
                                  $infoubrand=$row['infoubrand'];
                                  $status=$row['status'];
                                  echo '
                                  <th scope="row">'.$id.'</th>
                                      <td>'.$username.'</td>
                                      <td>'.$infoubrand.'</td>
                                      <td>'.$status.'</td>
                                      <td>
                                          <button><a class="btn" href="confirm-supp.php?partenariatid='.$id.'&&username='.$username.'">check</a></button>
                                      </td>
                                      </tr>
                                  ';
                              }
                          }
                      ?>
            </tbody>
          </table>
          <hr>
          <div id="inf" class="title">
            <h2 class=" rec">Influenceur</h2>

          
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
                                      <td>
                                          <button><a class="btn" href="user-update.php?updateid='.$id.'">update</a></button>
                                          <button><a class="btn"  href="user-delete.php?deleteid='.$id.'">delete</a></button>
                                      </td>
                                      </tr>
                                  ';
                              }
                          }
                      ?>
            </tbody>
          </table>
          <hr>
          <div id="ma" class="title">
            <h2 class="rec">Marque</h2>


          </div>

          <table id="ma" class=" rec">

            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">profile</th>
                <th scope="col">username</th>
                <th scope="col">email</th>
                <th scope="col">CA</th>
                <th scope="col">operation</th>
              </tr>
            </thead>
            <tbody>
              <?php
                      $id=$_SESSION['id'];
                      $sql="SELECT * FROM `brand`";
                      $result=mysqli_query($mysqli,$sql);
                          if($result){
                              while($row=mysqli_fetch_assoc($result)){
                                  $id=$row['id'];
                                  $username=$row['username'];
                                  $photo=$row['photo'];
                                  $email=$row['email'];
                                  $CA=$row['CA'];
                                  echo '
                                  <th scope="row">'.$id.'</th>
                                      <td><img src="../brand/assets/pics/'.$username.'-'.$photo.'" width="50" height="50" style="border-radius:50%;"></td>
                                      <td>'.$username.'</td>
                                      <td>'.$email.'</td>
                                      <td>'.$CA.'</td>
                                      <td>
                                          <button><a class="btn"  href="brand-update.php?updateid='.$id.'">update</a></button>
                                          <button><a class="btn"  href="brand-delete.php?deleteid='.$id.'">delete</a></button>
                                      </td>
                                      </tr>
                                  ';
                              }
                          }
                      
                      ?>
            </tbody>
          </table>
          
          
          <hr>
          
          
          <div id="pa" class="title">
            <h2 class="rec">Partenariat</h2>


          </div>
          <table class="rec">

            <thead>
              <tr>
                <th>contrat-id</th>
                <th>contrat-name</th>
                <th>sender</th>
                <th>receiver</th>
                <th>Date-Debut</th>
                <th>Date-Fin</th>
                <th>Montant</th>
                <th>Status</th>
                <th>Operation</th>
              </tr>
            </thead>
            <tbody>
              <?php
                        $userid=$_SESSION['id'];
                        $sql="SELECT * FROM `partenariat` order by status asc";
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
                                        <td>
                                          <button><a class="btn"  href="partenariat-delete.php?deleteid='.$id.'">delete</a></button>
                                        </td>
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