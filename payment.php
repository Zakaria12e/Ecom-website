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
    <link rel="stylesheet" href="style.css">
    <title>Payment</title>
</head>
<body>
<?php
require_once 'config.php';

if (isset($_POST["buynow_btn"])) {

    $userId = $_POST['client_id'];

    $query = "SELECT p.product_name, pr.price, p.quantity
              FROM panier p
              JOIN products pr ON p.product_name = pr.product_name
              WHERE p.Id = $userId";

    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
    
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Product Name: " . $row['product_name'] . "<br>";
                echo "Price: " . $row['price'] . "$<br>";
                echo "Quantity: " . $row['quantity'] . "<br>";
                echo "<br>";
            }
            echo"Totale: ". $_SESSION['totale']."$";
        } 
        mysqli_free_result($result);
    } 
  
}
?>
</body>
</html>
<?php
}
?>  