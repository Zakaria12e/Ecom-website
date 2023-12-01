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
        echo '<h1>' . $productName . '</h1>';
        $Query = "SELECT price FROM `products` WHERE product_name = '$productName'";
        $result = mysqli_query($con, $Query);
        if ($result) {

          $row = mysqli_fetch_assoc($result);
      
          if ($row) {

              $price = $row['price'];
      
              echo "Price : ". $price;
          }
     }

        echo '<form method="POST" action="Panier.php">';
        echo '<input type="hidden" name="productName" value="' . $productName . '">';
        echo '<button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>';
        echo '</form>';

    } 
   
    ?>
    <a href="Products.php">GO BACK</a>
</section>
   
</body>
</html>
