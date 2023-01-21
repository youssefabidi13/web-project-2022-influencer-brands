<?php
require_once "../config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin-brand"]) || $_SESSION["loggedin-brand"] !== true){
    header("location: brand-login.php");
    exit;
}

if(isset($_POST['submit'])){
    $msg=$_POST['msg'];
    $receiver=$_GET['influencerusername'];
    $sender=$_SESSION['username'];
    if(!empty($msg)){
        $sql4="insert into `message` (sender,receiver,msg) values (?,?,?) ";
        if($stmt = $mysqli->prepare($sql4)){
            $stmt->bind_param("sss", $sender, $receiver, $msg);
        }
        if($stmt->execute()){
        //    echo 'executed successfully';
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }  
}


            $influencerid=$_GET['influencerusername'];
            $sql1="select * from  `users` where username='$influencerid'";
            $result=mysqli_query($mysqli,$sql1);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $influencerid=$row['username'];
                        $influencerphoto=$row['photo'];
                      
                    }
                }

            $id=$_SESSION['id'];
            $sql2="select * from  `brand` where id=$id ";
            $result1=mysqli_query($mysqli,$sql2);
                if($result1){                       
                     while($row1=mysqli_fetch_assoc($result1)){
                        $id=$row1['id'];
                        $brandusername=$row1['username'];
                      
                    }
                }


   

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Message</title>
  <link rel="stylesheet" href="../influenceur/assets/style-msg.css" />
  <link rel="stylesheet" href="../assets/style.css" />
  <link rel="stylesheet" href="../assets/queries.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>
<header class="header">
  <a href="#">
    <img class="logo" alt="Site logo" src="../assets/img/logo.jpg" />
  </a>

  <nav class="main-nav">
    <ul class="main-nav-list">
      <li><a class="main-nav-link" href="dashboard-brand.php">Dashboard</a></li>
      <li><a class="main-nav-link" href="brand-profile.php">Profile</a></li>
      <li><a class="main-nav-link nav-cta" href="brand-logout.php">Deconnexion</a></li>
    </ul>
  </nav>

  <button class="btn-mobile-nav">
    <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
    <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
  </button>
</header>

<body>
  <div class="container">
    <div class="chat">
      <div class="chat-header">
        <div class="profile">
          <div class="left">
            <?php
              echo '<img style="width:5em;height:5em;border-radius: 50%;" src="../influenceur/assets/pics/'.$influencerid.'-'.$influencerphoto.'">
              
              <h2>'.$influencerid.'</h2>';
              ?>
          </div>
        </div>
      </div>
      <div class="chat-box">

        <?php
                $sql3="select * from message where (sender='$brandusername' AND receiver='$influencerid') OR (sender='$influencerid' AND receiver='$brandusername') order by date  ";
                $result2=mysqli_query($mysqli,$sql3);
                if($result2){
                    while($row2=mysqli_fetch_assoc($result2)){
                            $date=$row2['date'];
                            $msg=$row2['msg'];
                            $senderX=$row2['sender'];
                            if($senderX==$brandusername){
                                echo '
                                <div class="chat-r">
                                    <div class="sp"></div>
                                    <div class="mess mess-r">
                                    <p>'.$msg.'</p>
                                    <div class="check">
                                        <span>'.$date.'</span>
                                    </div>
                                    </div>
                                </div>';

                            }else{
                                echo '
                                <div class="chat-l">
                                    <div class="mess">
                                    <p>'.$msg.'</p>
                                    <div class="check">
                                        <span>'.$date.'</span>
                                    </div>
                                </div>
                                <div class="sp"></div>
                                </div>
                                 ';
                            }
                    }
                } 
                ?>

        <div class="" style="margin-top: 10px;margin-bottom: 20px;">
          <form action="" method="post">
            <div id="down"></div>
            <input placeholder="Message" type="text" name="msg"
              style=" padding:6px;  font-size: 15px; font-family: inherit; color: inherit; border: 4px solid black; background-color: #fdf2e9; border-radius: 9px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);">
            <button style="border: 3px solid black;" class="button button1" type="submit" name="submit">Envoyer</button>
            <?php echo '<button style=" border: 3px solid black;background-color: #00e0fdde;;"class="button button1"><a style="color:#ffff; text-decoration:none;font-family: sans-serif;"  href="partenariat-brand.php?brandusername='.$brandusername.'&&infusername='.$influencerid.'">Partenariat</a></button>';?>
          </form>
        </div>
      </div>
    </div>
</body>

</html>