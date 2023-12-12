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


    $userid = $_SESSION['id'];

    $query = "SELECT products.product_name, products.price, panier.quantity
                FROM products
                JOIN panier ON products.product_name = panier.product_name
                WHERE panier.Id = '$userid'";

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

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buynow_btn'])) {
        try {
            $mail = new PHPMailer(true); // Créer une instance de PHPMailer

            // Génération d'un code de vérification
            $token = substr(md5(uniqid(mt_rand(), true)), 0, 8);

            $email = $_SESSION['email'];

            // Insertion du code de vérification et email dans la base de données

           $InsertQuery = "INSERT INTO orders (token, email) VALUES ('$token' , '$email')";
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
        <p>Bonjour ' . $_SESSION['Username'] . ',</p>
        <p>Merci pour votre achat sur notre boutique Gravey.</p>
        <p>Voici un récapitulatif de votre commande :</p>
        <table cellspacing="0" style="width:100%; border: 1px solid #ccc;">
            <thead>
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 10px; border: 1px solid #ccc;">Produit</th>
                    <th style="padding: 10px; border: 1px solid #ccc;">Prix</th>
                    
                </tr>
            </thead>
            <tbody>';

            foreach ($products as $product) {
                $body .= '
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ccc;">' . $product['product_name'] . '(' . $product['quantity'] . ')</td>
                        <td style="padding: 10px; border: 1px solid #ccc;">' . $product['price'] * $product['quantity'] . '</td>

                    </tr>';
            }
            

            $body .= '
            </tbody>
                </table>
                
                <p>Nous vous remercions de votre confiance et restons à votre disposition pour toute question.</p>
                <p>Cordialement,<br>Gravey Company</p>
            </body>
            </html>';

            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = 'Pour voir ce message, veuillez utiliser un client de messagerie compatible HTML.';
            $mail->isHTML(true);

   

            $mail->send();

            // Reste du traitement après l'envoi de l'e-mail
            // ...

        } catch (Exception $e) {
            echo "L'envoi de l'e-mail a échoué. Erreur : {$mail->ErrorInfo}";
        }
    }
    header('location:panier.php');
} ?>