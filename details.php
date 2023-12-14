<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Products.css">
        <link rel="stylesheet" href="nav.css">
        <title>Product Details</title>

    </head>

    <body>


        <header class="header">


            <a class="logo" href="home.php">Gravey</a>
            <nav class="navbar">
                <a href="home.php">Home</a>


                <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg></a>
                <span style=" color:white ;background-color: black; border-radius:50%; padding:0 6px; font-size:14px; font-weight: 600;">
                    <?php
                    require_once 'config.php';
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



        <section class="details">
            <?php
            require_once 'config.php';


            if (isset($_GET['name'])) {

                $productName = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
                //image
                echo '<div class="details-container">';
                $Query = "SELECT image FROM `products` WHERE product_name = '$productName'";
                $result = mysqli_query($con, $Query);
                if ($result) {

                    $row = mysqli_fetch_assoc($result);

                    if ($row) {

                        $img = $row['image'];
                        echo "<div class='details_img'>";
                        echo "<img src='images/{$img}'>";
                        echo "</div>";
                    }
                }
            }
            echo '<h1>' . $productName . '</h1>';
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
                        echo '.';
                        $caracteristiques = $row['Caracteristiques'];
                        echo '<p>';
                        echo '<b>Caracteristiques</b><br>';
                        echo nl2br($caracteristiques);
                        echo '</p>';
                        echo '.';
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
              <p style='display: inline;font-size: 20px;'>Price: </p>
              <p class='price' style='display: inline; margin: 0;'>$price</p>
              <p style='display: inline;' class='price'> MAD</p>
              </div>";
                    }
                }
            }
            echo '<form id="form_add_to_cart" method="POST" action="Panier.php">';
            echo '<input type="hidden" name="productName" value="' . $productName . '">';
            echo '<button type="submit" class="add-to-cart" id="add-to-cart-btn" name="addToCart">AJOUTER AU PANIER</button>';
            echo '</form>';

            echo '<a id="goback" href="home.php">RETOURNER</a>';

            echo '</div>';
            ?>



            <?php

            $TotalQuantityQuery = "SELECT SUM(quantity) as totalQuantity FROM panier WHERE product_name = '$productName'";
            $result = mysqli_query($con, $TotalQuantityQuery);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $totalQuantityEnPanier = !empty($row['totalQuantity']) ? $row['totalQuantity'] : 0;


                $QuantityLimitQuery = "SELECT quantity FROM products WHERE product_name = '$productName'";
                $result = mysqli_query($con, $QuantityLimitQuery);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $quantityLimit = !empty($row['quantity']) ? $row['quantity'] : 0;


                    if ($totalQuantityEnPanier >= $quantityLimit) {

                        echo '<script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var addButton = document.getElementById("add-to-cart-btn");
                        addButton.disabled = true;
                        addButton.style.backgroundColor = "rgb(231, 67, 67)";
                        addButton.innerHTML = "Out of Stock";
                    });
                  </script>';
                    }
                }
            }
            ?>

        </section>
        <script src="script.js"></script>
    </body>

    </html>

<?php
}
?>