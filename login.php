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

<body>


    <style>
        form {
            width: 400px;
        }

        #input_container {
            text-align: center;
        }

        .form-control {
            width: 100%;
        }

        @media only screen and (max-width: 768px) {

            .container {
                margin-left: 25px;

            }

        }
    </style>


    <?php
    session_start();
    include("config.php");

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $result = mysqli_query($con, "SELECT * FROM clients WHERE Email='$email'") or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $hashpass = $row['Password'];

            if (password_verify($password, $hashpass)) {
                if ($row['user_type'] == 'admin') {

                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['email'] = $row['Email'];
                    
                    header("Location: Admin0.php");
                } else {

                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['id'] = $row['Id'];
                    $_SESSION['PhoneNumber'] = $row['PhoneNumber'];
                    $_SESSION['Address'] = $row['Address'];

                    header("Location: home.php");
                }
            } else {
                $Messages[] = 'Identifiant ou mot de passe incorrect !';
            }
        } else {
            $Messages[] = 'Identifiant ou mot de passe incorrect !';
        }
    }


    if (isset($Messages)) {
        foreach ($Messages as $Message) {
            echo '
      <div class="message">
         <span>' . $Message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
        }
    }

    ?>
    <div class="container">
        <div>
            <div>
                <form action="" method="post">
                    <h1 class="title">CONNEXION</h1>
                    <div id="input_container">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" autocomplete="off" required placeholder="E-mail">
                            <small style="padding-right: -30px;" id="emailCondition"></small>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off" required placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                        </div>
                    </div>

                    <button class="btn" type="submit" name="submit">connexion</button>

                    <div class="form-group">
                        Pas encore de compte ? <a href="signup.php">Inscrivez-vous</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var emailInput = document.getElementById('email');
        var emailCondition = document.getElementById('emailCondition');


        emailInput.addEventListener('input', function() {
            var Email = emailInput.value;

            if (/^[a-zA-Z0-9._%+-]+@gmail\.com$/.test(Email)) {
                emailCondition.textContent = 'valid';
                emailCondition.style.color = 'green';
            } else {
                emailCondition.textContent = 'exemple@gmail.com';
                emailCondition.style.color = 'red';
            }
        });
    </script>

</body>

</html>