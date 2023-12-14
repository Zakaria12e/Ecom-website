<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {

?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="nav.css">
        <link rel="stylesheet" href="Admin0.css">
        <title>Panier</title>
    </head>

    <body>

        <header class="header">

            <a class="logo" href="home.php">Gravey</a>
            <nav class="navbar">

                <a href="home.php">Accueil</a>
                <a href="#Payment">Paiement</a>
                <a href="support.php">Support</a>
                <a href="Profile.php"> <?php echo $_SESSION['username']; ?></a>

            </nav>
            <button class="mobile-menu-button">&#9776;</button>
        </header>

        <?php
        require_once 'config.php';

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["addToCart"])) {
            $productName = $_POST["productName"];
            $userId = isset($_SESSION['id']) ? $_SESSION['id'] : 0;

            $checkQuery = "SELECT * FROM panier WHERE Id = '$userId' AND product_name = '$productName'";
            $checkResult = mysqli_query($con, $checkQuery);

            if ($checkResult) {
                if (mysqli_num_rows($checkResult) > 0) {
                    $updateQuery = "UPDATE panier SET quantity = quantity + 1 WHERE Id = '$userId' AND product_name = '$productName'";
                    if (mysqli_query($con, $updateQuery)) {
                        header("Location: details.php?name=" . urlencode($productName));
                    } else {
                        echo "Error updating record: " . mysqli_error($con);
                    }
                } else {
                    $insertQuery = "INSERT INTO panier (Id, product_name, quantity) VALUES ('$userId', '$productName', 1)";
                    if (mysqli_query($con, $insertQuery)) {
                        header("Location: details.php?name=" . urlencode($productName));
                    } else {
                        echo "Error inserting record: " . mysqli_error($con);
                    }
                }
            } else {
                echo "Error checking record: " . mysqli_error($con);
            }
        }

        $userId = isset($_SESSION['id']) ? $_SESSION['id'] : 0;

        $Query = "SELECT * FROM panier WHERE Id = '$userId'";
        $Result = mysqli_query($con, $Query);

        ?>

        <div class="container">


            <div style="margin-top: -100px;" class="ticket-display" id="tickets">

                <table id="table" class="ticket_table">

                    <thead>
                        <tr>
                            <th>Image du produit</th>
                            <th>Nom du produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                        </tr>

                    </thead>

                    <?php
                    while ($row = mysqli_fetch_assoc($Result)) {
                        $productName = $row['product_name'];
                        $productDetailsQuery = "SELECT * FROM products WHERE product_name = '$productName'";
                        $productDetailsResult = mysqli_query($con, $productDetailsQuery);

                        if ($productDetailsResult) {
                            $productDetails = mysqli_fetch_assoc($productDetailsResult);
                    ?>
                            <tr>
                                <td> <img id="Product_img_panier" style="width: 160px;  border-radius: 6px;" src="images/<?php echo  $productDetails['image']; ?>"></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $productDetails['price']; ?> MAD</td>
                                <td>

                                    <form id="quantity_panier" method="POST" action="panier.php">
                                        <div class="quantity-controls">
                                            <input type="hidden" name="productName" value="<?php echo $row['product_name']; ?>">
                                            <button class="BtnsQuantity" type="submit" name="plus"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                                </svg></button>

                                            <span class="spanquantity"> <?php echo $row['quantity']; ?></span>
                                            <button class="BtnsQuantity" type="submit" name="less"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
                                                </svg></button>
                                    </form>

                                </td>
            </div>


        <?php


                            if (isset($_POST['plus'])) {
                                $productName = $_POST['productName'];

                                $currentQuantityQuery = "SELECT SUM(quantity) AS total_quantity FROM panier WHERE product_name = '$productName'";
                                $currentQuantityResult = mysqli_query($con, $currentQuantityQuery);
                                $currentQuantityRow = mysqli_fetch_assoc($currentQuantityResult);
                                $currentQuantity = $currentQuantityRow['total_quantity'];

                                $Query = "SELECT * FROM products WHERE product_name = '$productName'";
                                $Result = mysqli_query($con, $Query);
                                $QuantityRow = mysqli_fetch_assoc($Result);
                                $MaxQuantity = $QuantityRow['quantity'];


                                if ($currentQuantity < $MaxQuantity) {

                                    $updateQuery = "UPDATE panier SET quantity = (quantity + 1) WHERE product_name = '$productName' AND Id = '$userId'";
                                    $updateResult = mysqli_query($con, $updateQuery);

                                    if ($updateResult) {
                                        header("Location: panier.php");
                                        exit();
                                    }
                                } else if ($currentQuantity == $MaxQuantity) {

                                    $updateQuery = "UPDATE panier SET quantity = quantity WHERE product_name = '$productName' AND Id = '$userId'";
                                    $updateResult = mysqli_query($con, $updateQuery);

                                    if ($updateResult) {
                                        header("Location: panier.php");
                                        exit();
                                    }
                                }
                            }

                            if (isset($_POST['less'])) {
                                $productName = $_POST['productName'];

                                $currentQuantityQuery = "SELECT quantity AS total_quantity FROM panier WHERE product_name =  '$productName' and Id = '$userId'";
                                $currentQuantityResult = mysqli_query($con, $currentQuantityQuery);
                                $currentQuantityRow = mysqli_fetch_assoc($currentQuantityResult);
                                $currentQuantity = $currentQuantityRow['total_quantity'];

                                if ($currentQuantity > 1) {

                                    $updateQuery = "UPDATE panier SET quantity = (quantity - 1) WHERE product_name = '$productName' and Id = '$userId'";
                                    $updateResult = mysqli_query($con, $updateQuery);

                                    if ($updateResult) {
                                        header("Location: panier.php");
                                        exit();
                                    }
                                } else {
                                    $productName = $_POST["productName"];
                                    $deleteQuery = "DELETE FROM panier WHERE Id = '$userId' AND product_name = '$productName'";
                                    $Result = mysqli_query($con, $deleteQuery);
                                    if ($Result) {
                                        header('location: Panier.php');
                                    }
                                }
                            }
                        }

        ?>

        </tr>

    <?php } ?>
    </table>


        </div>
        <?php
        $totalQuery = "SELECT SUM(panier.quantity * products.price) AS total FROM panier
 JOIN products ON panier.product_name = products.product_name
 WHERE panier.Id = '$userId'";
        $totalResult = mysqli_query($con, $totalQuery);
        if ($totalResult) {
            $totalRow = mysqli_fetch_assoc($totalResult);
            $_SESSION['totale'] = $total = $totalRow['total'];
            if ($total != 0) {
                echo '<div id="Payment">';

                echo '<div style="text-align: center; margin-top:40px;"><h1><b>Informations d\'expédition</h1></b><br></div>';

                echo '<div style="display:flex">';
                echo '<h2 style="padding-right:70px;"><b> Nom du client</h2>';
                echo ' <h2>' . $_SESSION['username'] . '</h2>';
                echo '</div>';

                $username = $_SESSION['username'];

                $Query = "SELECT * FROM clients where Id = $userId";
                $result = mysqli_query($con, $Query);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    echo '<div style="display:flex">';
                    echo '<h2 style="padding-right:50px;"><b> E-mail du client</h2>';
                    echo '<h2 id="phone_number">' . $row['Email'] . '</h2>';
                    echo '</div>';

                    echo '<div style="display:flex">';
                    echo '<h2 style="padding-right:50px;"><b>Numéro de téléphone</h2>';
                    echo '<h2 id="phone_number">' . $row['PhoneNumber'] . '</h2>';
                    echo '</div>';


                    echo '</div>';


                    echo '<h2><b>Adresse du client</h2>';
                    echo '<h2>' . $row['Address'] . '</h2><br>';
                }
                echo '<div style=" display:flex; justify-content: space-between; align-items: center;">';
                echo '<b><h1>Expédition totale</h1></b>';
                echo '<b><h1>gratuite</h1></b>';
                echo '</div>';

                echo '<hr>';

                echo '<div style=" display:flex; justify-content: space-between; align-items: center;">';
                echo '<b><h1 style="margin-top:-40px;">Total</h1></b>';
                echo '<b><h1>' . $total . ' MAD</h1><br><br><br></b>';
                echo '</div>';
                //buy now btn
                echo '<form id="form_buy_now"  method="POST" action="email.php">';
                echo '<input type="hidden" name="client_id" value="' . $userId . '">';

                echo '<button id="buy_now_btn"  type="submit" name="buynow_btn">ACHETER MAINTENANT</button>';
                echo '</form>';

                echo '</div>';
            } else {
                echo "
    <script>
        var section = document.getElementById('table');
        section.classList.add('hidden-section');
    </script>";

                echo '<div id="empty_panier" ><h1>Aucun produit pour l\'instant</h1></div>';
            }
        }
        ?>

        <hr style=" margin: 100px  0 ">
        <div><?php include 'footer.php'; ?></div>
        <script src="script.js"></script>
    </body>

    </html>

<?php
}
?>