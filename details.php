<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="Products.css">
</head>
<body>

<section class="details">
    <?php
     require_once 'config.php';

    if (isset($_GET['name'])) {

        $productName = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
        //image
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
   
     
    echo '<h1 id="pname">' . $productName . '</h1>';
      //description
     $Query = "SELECT description FROM `products` WHERE product_name = '$productName'";
     $result = mysqli_query($con, $Query);
     if ($result) {

       $row = mysqli_fetch_assoc($result);
   
       if ($row) {

           $description = $row['description'];
           echo "<p id='description'>$description </p>";
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
   
</body>
</html>