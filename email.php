<?php
session_start();
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION['email'])) {
    header('location:login.php');
    exit();
} else {
?>

    <?php

    require_once('config.php');

    $user_id =  $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buynow_btn'])) {
        try {
            $mail = new PHPMailer(true); // Créer une instance de PHPMailer

            // Génération d'un code de vérification
            $token = substr(md5(uniqid(mt_rand(), true)), 0, 8);

            $email = $_SESSION['email'];

            // Insertion du code de vérification et email dans la base de données

            $InsertQuery = "INSERT INTO orders (user_id,token, email) VALUES ('$user_id','$token' , '$email')";
            mysqli_query($con, $InsertQuery);

            // Configuration et envoi de l'e-mail
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'virusox899@gmail.com';
            $mail->Password   = 'dxbvrrrgzntfmsbu';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('virusox899@gmail.com', 'Gravey');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            $subject = 'Confirmation de votre achat';
            $body = '
    <html>
    <head>
        <title>Confirmation de votre achat</title>
    </head>
    <body>
        <p>Bonjour ' . $_SESSION['username'] . ',</p>

                <p>Votre code de vérification est : ' . $token . '</p>
                <p>Nous vous remercions de votre confiance et restons à votre disposition pour toute question.</p>
                <p>Cordialement,<br>Gravey Company</p>
            </body>
            </html>';

            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = 'Pour voir ce message, veuillez utiliser un client de messagerie compatible HTML.';
            $mail->isHTML(true);

            $mail->send();
        } catch (Exception $e) {
            echo "L'envoi de l'e-mail a échoué. Erreur : {$mail->ErrorInfo}";
        }
    }
    echo '<style>
     @import url("https://fonts.googleapis.com/css?family=Poppins");
*{
    
    text-decoration: none;
    box-sizing: border-box;
    outline: none;
    font-family: Poppins;
}

    .verification-form {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 200px auto;
    }

    label {
        display: block;
        font-size: 14px;
        margin-bottom: 8px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    button {
        background-color: black;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    .message {
        text-align: center;
        margin: 20px;
        padding: 20px;
        max-width: 100%;
        background-color: rgba(255, 255, 255, 0.987);
        border-radius: 20px;
        gap: 1.5rem;
    }

    .message span {
        font-size: 2rem;
        color: black;
    }

    @media (max-width: 600px) {
        .verification-form {
            max-width: 100%;
        }
    }
     </style>';




    if (isset($_POST['verify_token'])) {

        $Query = "SELECT token FROM orders WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($con, $Query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $Order_token = $row['token'];
        }
        $token_input = $_POST['verification-code'];

        if ($Order_token === $token_input) {

            $Messages[] = ' payment valid ';
            $query = "SELECT products.product_name, products.price, panier.quantity
                        FROM products
                        JOIN panier ON products.product_name = panier.product_name
                        WHERE panier.Id = '$user_id'";

            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                    $products[] = [
                        'product_name' => $row['product_name'],
                        'price' => $row['price'],
                        'quantity' => $row['quantity']
                    ];
                }
            }

            $totalProducts = "";

            foreach ($products as $product) {
                $totalProducts .= "{$product['product_name']} ({$product['quantity']}), ";
            }

            $totalProducts = rtrim($totalProducts, ', ');

            $totale =  $_SESSION['totale'];
            $name = $_SESSION['username'];
            $phone_number = $_SESSION['PhoneNumber'];
            $Address = $_SESSION['Address'];

            $Query = "UPDATE orders SET name = '$name', phone_number = '$phone_number', address = ' $Address'  ,  total_price = '$totale' ,total_products = '$totalProducts'  WHERE token = '$Order_token'";
            mysqli_query($con, $Query);

            foreach ($products as $product) {
                $productName = $product['product_name'];
                $quantityPurchased = $product['quantity'];

                $queryUpdateQuantity = "UPDATE products 
                        SET quantity = quantity - '$quantityPurchased'
                        WHERE product_name = '$productName'";

                mysqli_query($con, $queryUpdateQuantity);
            }

            //insert info into order history table
            $query = "SELECT * FROM orders WHERE token = '$Order_token'  ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    $order_id = $row['id'];
                    $user_id = $row['user_id'];
                    $date = $row['placed_on'];
                    $products = $row['total_products'];
                    $totalPrice = $row['total_price'];
                    $orderStatus = $row['payment_status'];
                    $paymentMethod = $row['method'];
                    $address = $row['address'];

                    $queryinsert = "INSERT INTO  order_history VALUES ($order_id,'$user_id','$date', ' $products', '$totalPrice', '$orderStatus', '$paymentMethod', '$address')";

                    mysqli_query($con, $queryinsert);
                }
            }



            //facture email

            $userid = $_SESSION['id'];

            $query = "SELECT products.product_name, products.price, panier.quantity
                            FROM products
                            JOIN panier ON products.product_name = panier.product_name
                            WHERE panier.Id = '$userid'";

            $result = mysqli_query($con, $query);

            $products = [];

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $products[] = [
                        'product_name' => $row['product_name'],
                        'price' => $row['price'],
                        'quantity' => $row['quantity']
                    ];
                }
            }
            
            $email = $_SESSION['email'];
            $Query = "SELECT * FROM clients where Id = $userid";
            $result = mysqli_query($con, $Query);
            if ($result) {
                $clientrow = mysqli_fetch_assoc($result);
            }


            try {
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'virusox899@gmail.com';
                $mail->Password   = 'dxbvrrrgzntfmsbu';
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;

                $mail->setFrom('virusox899@gmail.com', 'Gravey');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->CharSet = "UTF-8";

                $subject = 'Facture d\'achat';
                $body = '
    <html>
    <head>
        <title>Facture de votre achat</title>
        <style>
      body{
        font-family: Arial, sans-serif;
          }


            .container {
                background-color: white;
                padding: 20px;
                border-radius: 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                padding: 10px;
                border: 1px solid black;
            }

            th {
                background-color: #000;
                color: white;
            }

            tfoot {
                background-color: white;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Bonjour Mr ' . $_SESSION['username'] . ',</h3>

    
               <p>Numéro de téléphone <b>' . $clientrow['PhoneNumber'] . '</b></p>
               <p>Adresse de livraison <b>' . $clientrow['Address'] . '</b></p>
               <p>Mode de paiement <b>payment à laivraison</b></p> 
               <p>Acheté le <b>' . $date . '</b></p>
            
            <p>Nous vous remercions d\'avoir choisi notre boutique, Gravey, pour votre achat.</p>
            <p>Voici votre commande :</p>
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                    </tr>
                </thead>
                <tbody>';

                foreach ($products as $product) {
                    $body .= '
        <tr>
            <td>' . $product['product_name'] . '</td>
            <td>' . $product['price']  . ' MAD</td>
            <td>' . $product['quantity']  . '</td>
        </tr>';
                }

        $body .= '
                </tbody>
                <tfoot>
                    <tr>
                        <td >Total</td>
                        <td style=" text-align: center;" colspan="2">' . $totale . ' MAD</td>
                    </tr>
                </tfoot>
            </table>
            <p>Nous vous exprimons notre gratitude pour la confiance que vous nous avez accordée. N\'hésitez pas à nous solliciter si vous avez des interrogations.</p>
            <h3><b>Gravey Company</b></h3>
        </div>
    </body>
    </html>';


                $mail->Subject = $subject;
                $mail->Body = $body;
                $mail->AltBody = 'Pour voir ce message, veuillez utiliser un client de messagerie compatible HTML.';
                $mail->isHTML(true);

                $mail->send();
            } catch (Exception $e) {
                echo "L'envoi de l'e-mail a échoué. Erreur : {$mail->ErrorInfo}";
            }

            // end



            $DeleteQuery = "DELETE FROM panier WHERE Id = '$user_id'";
            mysqli_query($con, $DeleteQuery);

            echo '
                   <script>
                        setTimeout(function(){window.location.href = "home.php";}, 3000);
                   </script>';
        } else {
            $Messages[] = 'Token code is invalid !!';
        }
    }


    if (isset($Messages)) {
        foreach ($Messages as $Message) {
            echo '
       <div class="message">
          <span>' . $Message . '</span>
       </div>
       ';
        }
    }

    echo '
    <form  method="POST" action="email.php" class="verification-form">
    <label for="verification-code">Verification Code:</label>
    <input type="text" id="verification-code" name="verification-code" placeholder="Enter code" required autocomplete="off" >
    <button name="verify_token" type="submit">Verify</button>
    </form>';
}

    ?>