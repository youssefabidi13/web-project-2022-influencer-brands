<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = $email  = $password = $confirm_password = "";
$nom = $prenom = $age = "";
$instagram = $facebook = $youtube = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
$nom_err = $prenom_err = $age_err = "";
$instagram_err = $facebook_err = $youtube_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom=$_POST['nom'];
    $photo=$_FILES['image']['name'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $instagram=$_POST['instagram'];
    $facebook=$_POST['facebook'];
    $youtube=$_POST['youtube'];
    $photo=$_FILES['image']['name'];
    
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql="insert into `users` (username,password,nom, prenom, email, age, instagram, facebook, youtube, photo) values (?,?,'$nom','$prenom','$email','$age','$instagram','$facebook','$youtube', '$photo') ";
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            move_uploaded_file($_FILES['image']['tmp_name'],"assets/pics/".$username.'-'.$photo);   
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
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
  <link rel="stylesheet" href="queries.css" />
  <title>Register Influencer</title>
</head>

<body>


  <section class="section-cta" id="cta">
    <div class="container">
      <div class="cta">
        <div class="cta-text-box">
          <h2 class="heading-secondary">S'inscrire!</h2>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="cta-form">
              <div>
                <label>Nom</label>
                <input type="text" name="nom" class="form-control <?php echo (!empty($nom_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $nom; ?>">
                <span class="invalid-feedback"><?php echo $nom_err; ?></span>
              </div>
              <div>
                <label>Prenom</label>
                <input type="text" name="prenom"
                  class="form-control <?php echo (!empty($prenom_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $prenom; ?>">
                <span class="invalid-feedback"><?php echo $prenom_err; ?></span>
              </div>
              <div>
                <label>Email</label>
                <input type="email" name="email"
                  class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
              </div>
              <div>
                <label>Age</label>
                <input type="number" name="age"
                  class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $age; ?>">
                <span class="invalid-feedback"><?php echo $age_err; ?></span>
              </div>
              <div>
                <label>Instagram</label>
                <input type="text" name="instagram"
                  class="form-control <?php echo (!empty($instagram_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $instagram; ?>">
                <span class="invalid-feedback"><?php echo $instagram_err; ?></span>
              </div>
              <div>
                <div class="form-group">
                  <label>Facebook</label>
                  <input type="text" name="facebook"
                    class="form-control <?php echo (!empty($facebook_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $facebook; ?>">
                  <span class="invalid-feedback"><?php echo $facebook_err; ?></span>
                </div>
              </div>

              <div class="fa">
                <label>Youtube</label>
                <input type="text" name="youtube"
                  class="form-control <?php echo (!empty($youtube_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $youtube; ?>">
                <span class="invalid-feedback"><?php echo $youtube_err; ?></span>
              </div>
              <div class="fa">
                <label>Username</label>
                <input type="text" name="username"
                  class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
              </div>
              <div class="fa">
                <label>Password</label>
                <input type="password" name="password"
                  class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
              </div>
              <div class="fa">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password"
                  class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
              </div>
              <div>
                <label>Image</label>
                <input type="file" name="image" <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>"
                  value="<?php echo $image; ?>">
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" class="btn btn--form" value="Submit">
              <input type="reset" class="btn btn--form" value="Reset">
            </div>

          </form>
          <p class="app">Already have an account? <a href="login.php">Login here</a></p>
        </div>
        <div class="cta-img-box" id="skewed" role="img" ></div>
      </div>
    </div>
  </section>
  </main>

</body>

</html>