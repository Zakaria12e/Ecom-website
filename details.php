<?php
session_start();
if(!isset($_SESSION['username'])){
   header('location:login.php');
}
else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="Products.css">
</head>
<body>
<header>
<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="images/gaming-pad-alt-1-svgrepo-com.svg" class="h-8" alt="Gravey Logo" />
                    <span style="color: black;" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
                </a>
                <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li style="display: flex;">
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
</div>

</li>
                </ul>
            </div>
        </nav>
</header>
<section class="details">
    <?php
     require_once 'config.php';
      echo'<h2 id="caract_titre"><b>Caracteristiques: </b></h2>';
    if (isset($_GET['name'])) {

        $productName = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
        //image
        echo'<div class="details-container">';
        $Query = "SELECT image FROM `products` WHERE product_name = '$productName'";
        $result = mysqli_query($con, $Query);
        if ($result) {

          $row = mysqli_fetch_assoc($result);
      
          if ($row) {

              $img = $row['image'];
               echo"<div class='details_img'>";
               echo"<img src='{$img}'>";
               echo"</div>";
          }
     }

}
 //caracteristique
 $Query = "SELECT Caracteristiques FROM `products` WHERE product_name = '$productName'";
 $result = mysqli_query($con, $Query);
 if ($result) {

   $row = mysqli_fetch_assoc($result);

  
   if ($row) {

    $caracteristiques = $row['Caracteristiques'];
    echo'<p id="caracteristiques">';
    echo nl2br($caracteristiques);
    echo'</p>';
   }
} 
   
echo'</div>'; 
    echo '<h1 style="font-family: cursive; font-size:30px">' . $productName . '</h1>';
      //description
     $Query = "SELECT description FROM `products` WHERE product_name = '$productName'";
     $result = mysqli_query($con, $Query);
     if ($result) {

       $row = mysqli_fetch_assoc($result);
   
       if ($row) {

           $description = $row['description'];
           echo "<p id='description'>$description </p>";
       }
       
       
       //price
       $Query = "SELECT price FROM `products` WHERE product_name = '$productName'";
        $result = mysqli_query($con, $Query);
        if ($result) {

          $row = mysqli_fetch_assoc($result);
      
          if ($row) {

              $price = $row['price'];
              echo "<div id='price_container' style='display: inline-block;'>
              <p style='display: inline;font-family: Verdana, Geneva, Tahoma, sans-serif;font-weight: 200;font-size: 20px;'>Price: </p>
              <p class='price' style='display: inline; margin: 0;'>$price</p>
              <p style='display: inline;' class='price'>$</p>
              </div>";

          }
     }
  }     
        echo '<form id="form_add_to_cart" method="POST" action="Panier.php">';
        echo '<input type="hidden" name="productName" value="' . $productName . '">';
        echo '<button type="submit" class="add-to-cart" name="addToCart">ADD TO CART</button>';
        echo '</form>';
    
          echo'<a id="goback" href="Products.php">GO BACK</a>';
    ?> 
</section>
<script src="script.js"></script>
</body>
</html>

<?php
}
?>