<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('location:login.php');
} else {
  include("config.php");
  $newname = "";
  $newemail = "";
  $newAddress = "";
  $id = $_SESSION['id'];
  $newPhoneNumber = "";

  if (!isset($_SESSION['Address'])) {
    $query = "SELECT Address FROM clients WHERE Id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['Address'] = $row['Address'];
  }
  if (!isset($_SESSION['PhoneNumber']) &&  !isset($_SESSION['email'])) {
    $query = "SELECT PhoneNumber FROM clients WHERE Id = $id";

    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['PhoneNumber'] = $row['PhoneNumber'];

    $query = "SELECT email FROM clients WHERE Id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
  }


 $errorMsg = "";
  if (isset($_POST['submit'])) {
    $newname = $_POST['username'];
    $newemail = $_POST['email'];
    $newAddress = $_POST['Address'];
    $newPhoneNumber = $_POST['NumberPhone'];

    // Check if the new email is unique
    $checkEmailQuery = "SELECT Id FROM clients WHERE Email = '$newemail' AND Id != $id";
    $checkEmailResult = mysqli_query($con, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // Email is not unique
        $errorMsg = "This email is already in use";
    } else {
        // Update Username, Email,PhoneNumber and Address
        $updateQuery = "UPDATE clients SET Username='$newname', Email='$newemail', Address='$newAddress', PhoneNumber='$newPhoneNumber' WHERE Id = $id";
        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
            // Update session variables
            $_SESSION['username'] = $newname;
            $_SESSION['email'] = $newemail;
            $_SESSION['Address'] = $newAddress;
            $_SESSION['PhoneNumber'] = $newPhoneNumber;
            
            
        }
    }
}


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Profile.css">
    <link rel="stylesheet" href="nav.css">
    <title>Profile</title>

  </head>

  <body>
    <style>
      @media only screen and (max-width: 768px) {
        #logout_para {
          margin-bottom: 20px;
        }

        #logout-btn {

          margin-left: 2px;
        }

        .form-control {
          padding: 5px;
        }
      }
    </style>
    <header class="header">


      <a class="logo" href="home.php">Gravey</a>
      <nav class="navbar">

        <a href="home.php">Home</a>
        <a href="support.php">Support</a>


        <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
          </svg></a>
        <span style=" color:white ;background-color: black; border-radius:50%; padding:0 6px; font-size:14px; font-weight: 600;">
          <?php
          if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];
            $totaleQuery = "SELECT SUM(quantity) FROM panier WHERE Id = $user_id;";
            $result = mysqli_query($con, $totaleQuery);
            if ($result) {
              $row = mysqli_fetch_assoc($result);
              if (!empty($row['SUM(quantity)'])) {
                $totalQuantity = $row['SUM(quantity)'];
                echo $totalQuantity;
              } else {
                echo "0";
              }
            }
          }
          ?>
        </span>




      </nav>
      <button class="mobile-menu-button">&#9776;</button>
    </header>


    <div id="profile-container">

      <section class="section-info">
        <form action="" method="post">

          <h1 class="title">PROFIL</h1>
          <div style="display: flex;  justify-content: space-between;">
            <div class="form-group">
              <label>Nom d'utilisateur:</label>
              <input type="text" name="username" id="username" class="form-control" autocomplete="off" placeholder="Nom d'utilisateur" value="<?php echo $_SESSION['username']; ?>">
            </div>

            <div class="form-group">
              <label> E-mail:</label>
              <input type="text" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
              <?php echo "<p style='color: red;'>$errorMsg</p>";?>
            </div>
          </div>
          <div style="display: flex;  justify-content: space-between;">

          </div>
          <div style="display: flex;  justify-content: space-between;">
            <span class="form-group">
              <label>Numéro de téléphone:</label>
              <input type="number" name="NumberPhone" id="numphone" class="form-control" autocomplete="off" placeholder="Number Phone" value="<?php echo $_SESSION['PhoneNumber']; ?>">
            </span>
            <span class="form-group">
              <label>Adresse:</label>
              <input type="text" name="Address" id="address" class="form-control" autocomplete="off" placeholder="Address" value="<?php echo $_SESSION['Address']; ?>">
            </span>
          </div>
          <div>
            <div class="form-group">
              <button id="btnModifier" type="submit" name="submit">Modifier</button>
            </div>
        </form>

        <span>
          <span id="logout_para">Appuyez ici pour vous déconnecter</span><a id="logout-btn" href="logout.php">Se déconnecter</a>
        </span>
    </div>


    </section>




    <section class="placed-orders">

      <h1 class="title">COMMANDES PASSÉES</h1>

      <div class="box-container">

        <?php
        require_once('config.php');
        $userID =  $_SESSION['id'];

        $order_query = mysqli_query($con, "SELECT * FROM order_history WHERE user_id = '$userID' ") or die('query failed');
        if (mysqli_num_rows($order_query) > 0) {
          while ($row = mysqli_fetch_assoc($order_query)) {
        ?>
            <div class="box">
              <p> Mode de paiement : <span><?php echo $row['payment_method']; ?></span> </p>
              <p> Produits : <span><?php echo $row['products']; ?></span> </p>
              <p> Acheté le : <span><?php echo $row['placed_on']; ?></span> </p>
              <p> Adresse : <span><?php echo $row['address']; ?></span> </p>
              <p> Prix total  : <span><?php echo $row['total_price']; ?>$</span> </p>
              <p> Statut de paiement : <span style="color:<?php if ($row['order_status'] == 'En attente') {
                                                        echo 'red';
                                                      }
                                                      else if($row['order_status'] == 'En cours'){
                                                        echo 'orange';
                                                      }
                                                      else {
                                                        echo 'green';
                                                      } ?>;"><?php echo $row['order_status']; ?></span> </p>
            </div>
        <?php
          }
        } else {
          echo '<p class="empty">Aucune commande passée pour l\'instant !</p>';
        }
        ?>
      </div>

    </section>

    </div>
    <hr style="margin-top: 40px;">

    <?php include 'footer.php'; ?>
    <script src="script.js"></script>
  </body>

  </html>

<?php
}
?>