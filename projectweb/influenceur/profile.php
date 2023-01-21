<?php 
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} 
$user=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="./assets/styleprofil.css" />
  <title>Influenceur Profile</title>
</head>

<body>
  <div class="side-menu">
    <div class="brand-name">
      <h1 class="rec"><?=$user?> Profile</h1>
    </div>
    <ul>

      <li><img src="./assets/imgs/1.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="dashboard-inf.php">Tableau de bord</a></span></li>
      <li><img src="./assets/imgs/3.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="dashboard-inf.php#brand">Marques</a></span></li>
      <li><img src="./assets/imgs/4.png" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="dashboard-inf.php#ptr">Mes partenariat</a></span></li>
      <li><img src="./assets/imgs/resetpswd.jpeg" style="border-radius: 50%;" alt="" />&nbsp;<span><a style="color:#19c8fa;" href="reset-pwd.php">Modifier password</a></span></li>
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
        <div>


        </div></a>
      </div>
      <div class="content-2">
        <div class="recent-payments">
          <hr>
          <div class="title">
            <h2 class="rec">Mon Profile</h2>


          </div>
          <table class="rec">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">photo</th>
                <th scope="col">username</th>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">email</th>
                <th scope="col">age</th>
                <th scope="col">instagram</th>
                <th scope="col">facebook</th>
                <th scope="col">youtube</th>
                <th scope="col">operation</th>
              </tr>
            </thead>
            <tbody>
              <?php
                    $id=$_SESSION['id'];
                    $sql="SELECT * FROM `users` where id=$id";
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
                                $instagram=$row['instagram'];
                                $facebook=$row['facebook'];
                                $youtube=$row['youtube'];
                                echo '
                                <th scope="row">'.$id.'</th>
                                    <td><img style="width:3em;height:3em;border-radius: 50%;" src="assets/pics/'.$username.'-'.$photo.'"></td>
                                    <td>'.$username.'</td>
                                    <td>'.$nom.'</td>
                                    <td>'.$prenom.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$age.'</td>
                                    <td>'.$instagram.'</td>
                                    <td>'.$facebook.'</td>
                                    <td>'.$youtube.'</td>
                                    <td>
                                        <button><a   style="border-radius: 10%;"class="btn"  href="update.php?updateid='.$id.'">Modifier</a></button>
                                        <button><a   style="border-radius: 10%;"class="btn"  href="demende-supp.php?username='.$username.'">supprimer</a></button>
                                    </td>
                                    </tr>
                                ';
                            }
                        }
                    ?>

            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>