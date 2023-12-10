<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="authentification.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Register</title>
</head>
<body >

  <?php 
                  session_start();
                  include("config.php");
                  if(isset($_POST['submit'])){
                     
                      $_SESSION['email'] =  $email = $_POST['email'];
                      $password = password_hash($_POST['password'],PASSWORD_DEFAULT) ;
                     
                      $confPassword = password_hash($_POST['confpassword'],PASSWORD_DEFAULT) ;
          
                      // Vérification de l'adresse e-mail unique
                      $verify_query = mysqli_query($con,"SELECT Email FROM clients WHERE Email='$email'");
          
                      if(mysqli_num_rows($verify_query) != 0){
                         
                        $Messages[] =  'Cet e-mail est déjà utilisé veuillez en choisir un autre !';
  
                      } 
                      else {
                        if($_POST['password'] === $_POST['confpassword'])
                        {

                            $username = $_POST['username'];
                            $PhoneNumber = $_POST['Numberhone'];
                            $Address = $_POST['Address'];

                             mysqli_query($con,"INSERT INTO clients(Username,Email,Password,Address,PhoneNumber) VALUES('$username','$email','$password','$Address','$PhoneNumber')") or die("Erreur");

                          $Messages[] = 'Inscription réussie !';
                        }
                        else{
                          
                            $Messages[] = 'Probleme de confirmation de mot de passe !';
                       
                        }
                         
                      }
                  } 
                ?>
                <?php
            if(isset($Messages)){
                    foreach($Messages as $Message){
                echo '
                   <div class="message">
                   <span>'.$Message.'</span>
                     <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                   </div>
                       ';
                  }
                }
                ?>
    <div class="container">
        <div >
            <div>
              
             
                <form action="" method="post">
                    
                     <h1 class="title">INSCRIPTION</h1>
                     <div style="display: flex;  justify-content: space-between;">
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" autocomplete="off" required placeholder="Nom d'utilisateur">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control"  autocomplete="off" required placeholder="E-mail">
                    </div>
                    </div>
                    <div style="display: flex;  justify-content: space-between;">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off" required placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confpassword" id="confpassword" class="form-control" autocomplete="off" required placeholder="Confirmer Mot de passe">
                    </div>
                    </div>
                    <div style="display: flex;  justify-content: space-between;">
                         <span class="form-group">
                        <input type="text" name="Numberhone" id="numphone" class="form-control" autocomplete="off" required placeholder="Number Phone">
                    </span>
                    <span class="form-group">
                        <input type="text" name="Address" id="address" class="form-control" autocomplete="off" required placeholder="Address">
                    </span>
                    </div>
                   
                    <div class="form-group">
                        <button class="btn" type="submit" name="submit">S'inscrire</button>
                    </div>
                    <div class="form-group">
                        Deja un compte? <a href="login.php">Connectez-vous</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <script>
     //sign up msgs
     let signuperr = document.getElementById('signuperr');
     let signupconf = document.getElementById('signupconf');
     setTimeout(function() { signuperr.classList.add('hide-message');} , 2500);
     setTimeout(function() { signupconf.classList.add('hide-message');} , 2500);
  
     let confPassworderr = document.getElementById('passwordconferr');
     setTimeout(function() { confPassworderr.classList.add('hide-message');} , 2500);

   </script>
</body>
</html>
