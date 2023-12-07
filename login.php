<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="authentification.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body >

    <div class="container">
        <div>
            <div>

<?php
session_start();
include("config.php");

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $result = mysqli_query($con, "SELECT * FROM clients WHERE Email='$email'") or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    if ($row) 
    {
        $hashpass = $row['Password'];

        if (password_verify($password, $hashpass)) 
        {
            if($row['user_type'] == 'admin'){

            $_SESSION['username'] = $row['Username'];
                header("Location: Admin0.php");
            }
            else{

            $_SESSION['valid'] = $row['Email'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['id'] = $row['Id'];

                header("Location: home.php");
            }
          
          
        } 
        else 
          {
            echo "<div id='errMessage1' class='erreurmsg'>>
                    <p>Identifiant ou mot de passe incorrect</p>
                  </div>";
          }
     }
     else
      {
        echo "<div id='errMessage2' class='erreurmsg'>
                <p>Identifiant ou mot de passe incorrect</p>
              </div>";
     }
}
?>
              
                <form  action="" method="post">
                     <h1 class="title">CONNEXION</h1>
                    <div class="form-group">
                        <label for="email" >Email</label>
                        <input type="text" name="email" id="email" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="password" >Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                    <button class="btn" type="submit" name="submit">connexion</button>

                    </div>
                    <div class="form-group">
                    Pas encore de compte ? <a href="signup.php">Inscrivez-vous</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
         //login msgs
  let errlogin1 = document.getElementById('errMessage1');
  setTimeout(function() { errlogin1.classList.add('hide-message');} , 3000);
  let errlogin2 = document.getElementById('errMessage2');
  setTimeout(function() { errlogin2.classList.add('hide-message');} , 3000);
    </script>
</body>
</html>
