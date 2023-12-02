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

       // Execution de la requete
        $result = mysqli_query($con, $query);

        if ($result) {
        $confirmationMessage = "Les données ont été insérées avec succès";
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
            <img src="images/gaming-pad-alt-1-svgrepo-com.svg" class="h-8" alt="Gravey Logo" />
            <span style="color: black;" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
        </a>
          <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
            <li>
              <a href="home.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
            </li>
            <li>
               <a href="Products.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
            </li>
            <li>
              <a href="support.php" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Support</a>
            </li>
            <li>
            <?php
echo'<a style="display: flex;" href="Profile.php" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
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