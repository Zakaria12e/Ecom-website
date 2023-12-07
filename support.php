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
        $confirmationMessage = "La ticket a été envoyer avec succès";
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Support Page</title>
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span style="color: black;" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
        </a>
          <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
            <li>
              <a href="home.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
            </li>
            <li>
              <a style="padding-right: 30px;" href="support.php" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Support</a>
            </li>
            
            <li style="display: flex;margin-left:-10px;">
                    <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg></a>
<div style=" color:ghostwhite ;background-color: blue; border-radius:50%; padding:0px 8px;">
<?php
require_once 'config.php';
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
    $totaleQuery = "SELECT SUM(quantity) FROM panier WHERE Id = $user_id;";
    $result = mysqli_query($con,$totaleQuery);
    $row = mysqli_fetch_assoc($result);
        if (!empty($row['SUM(quantity)'])) {
             $totalQuantity = $row['SUM(quantity)'];
              echo $totalQuantity; 
        }
        else{
        echo"0";
    } 
       
 }
?>
</div>

</li>
<li style="padding-top: 1px;">
  <a  href="mes_tickets.php"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
  <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
  <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
</svg></a>
</li>
<li>
            <?php
echo'<a style="display: flex; color:black;" href="Profile.php" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>'.$_SESSION['username'].'</a>';
?>
            </li>
          </ul>
      
      </div>
    </nav>

</head>
<body class="bodysup">
    <div class="container">
                         <?php if (!empty($confirmationMessage)) : ?>
                                 <div id="confMessage" class="confirmationmsg"><?php echo $confirmationMessage; ?></div>
                         <?php endif; ?>
                         <?php if (!empty($erreurMessage)) : ?>  
                                 <div id="errMessage" class="erreurmsg"><?php echo $erreurMessage; ?></div>
                         <?php endif; ?>
                    <div class="titre"><h2 style="font-family: monospace; font-size:50px">Contact Support</h2>
                    <p style="color: #fff;">Fill out the form below to get in touch with our support team</p>
                </div>  
    
                    <form class="support" action="support.php" method="post" id="contactForm" name="contactForm" novalidate="novalidate">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
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