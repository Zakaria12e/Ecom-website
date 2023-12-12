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
     body {
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .verification-form {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        margin-top: 50px;
        margin-bottom: 20px;
        padding: 20px;
        max-width: 100%;
        background-color: rgba(255, 255, 255, 0.987);
        border-radius: 20px;
        z-index: 10000;
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

        $Query = "SELECT token FROM orders WHERE user_id = '$user_id'";
        $result = mysqli_query($con, $Query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $Order_token = $row['token'];
        }
        $token_input = $_POST['verification-code'];

        if ($Order_token == $token_input) {

            $Messages[] = ' payment valid  !';
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
            $result = mysqli_query($con, $Query);

            if ($result) {
                $DeleteQuery = "DELETE FROM panier WHERE Id = '$user_id'";
                mysqli_query($con, $DeleteQuery);
                if (mysqli_query($con, $DeleteQuery)) {

                  echo '
               <script>
                    setTimeout(function(){window.location.href = "home.php";}, 3000);
               </script>';
                   
                }
            }
        }
    }

    if (isset($Messages)) {
        foreach ($Messages as $Message) {
            echo '
       <div class="message">
          <span>' . $Message . '</span>
          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
       </div>
       ';
        }
    }

    echo '
    <form  method="POST" action="email.php" class="verification-form">
    <label for="verification-code">Verification Code:</label>
    <input type="text" id="verification-code" name="verification-code" placeholder="Enter code" required >
    <button name="verify_token" type="submit">Verify</button>
    </form>';
}

    ?>