<?php
session_start();
require_once("config.php");
if(!isset($_SESSION['username'])){
  header('location:login.php');
}
else{


$id = "";
$name = "";
$email = "";
$message ="";

if(isset($_POST['submit'])){
   
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $erreurMessage = "Veuillez remplir tous les champs";
    }
    else{
         $query = "INSERT INTO tickets (name, email, message) VALUES ('$name', '$email', '$message')";

        $result = mysqli_query($con, $query);

        if ($result) {
        $Messages[] = "La ticket a été envoyer avec succès";
        } 
        else {
        echo "Erreur lors de l'insertion des données : " . mysqli_error($con);
        }  
     }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Products.css">
    <link rel="stylesheet" href="nav.css">
    <title>Support Page</title>


</head>
<body class="bodysup">
  

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
<header class="header">

         
<a class="logo" href="home.php">Gravey</a>
     
<nav class="navbar">

     <a href="home.php">Home</a>
     <a href="support.php">Support</a>
     <a href="mes_tickets.php">Tickets</a>
     <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
        </svg>
    </a>
<span style=" color:white ;background-color: black; border-radius:50%; padding:0 6px; font-size:14px; font-weight: 600;">
<?php
require_once 'config.php';
if(isset($_SESSION['id'])){
$user_id = $_SESSION['id'];
$totaleQuery = "SELECT SUM(quantity) FROM panier WHERE Id = $user_id;";
$result = mysqli_query($con,$totaleQuery);
if ($result) {
$row = mysqli_fetch_assoc($result);
if (!empty($row['SUM(quantity)'])) {
$totalQuantity = $row['SUM(quantity)'];
echo $totalQuantity; 
}
else{
echo"0";
} 

}
}
?>
</span>
<a style="margin-top: 10px;" href="Profile.php"> <?php echo $_SESSION['username'];?></a>
 
  


</nav>
<button class="mobile-menu-button">&#9776;</button>  
</header>

    <div class="container">
                        
                    <div class="titre"><h2 style=" font-size:50px; margin-top:70px;">Contact Support</h2>
                    <p>Fill out the form below to get in touch with our support team</p>
                </div>  
    
                    <form class="support" action="support.php" method="post" id="contactForm" name="contactForm" novalidate="novalidate">
                        <div class="form-group">
 
                           <?php 
                                 $name =  $_SESSION['username'];
                                 
                                  $email =  $_SESSION['email'];     
                           ?>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Your Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn" name="submit">Submit</button>
                        </div>
                    </form>
         </div>
    
        <script src="script.js"></script>
</body>
</html>
<?php
}
?>