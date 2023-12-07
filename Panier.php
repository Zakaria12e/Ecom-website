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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Panier</title>
 </head>

 <body style=" background-color: #f8f4f4;">
 <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span style="color: black;" id="logo" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
        </a>
        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
            <li>
            <a href="home.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
            </li>
            <li>
                <a href="support.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Support</a>
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

 $cartQuery = "SELECT * FROM panier WHERE Id = '$userId'";
 $cartResult = mysqli_query($con, $cartQuery);
 echo'<div class="panier_payment">';
 echo '<section id="panier">';
 if ($cartResult) 
 {  
    while ($cartRow = mysqli_fetch_assoc($cartResult)) {
   
        $productName = $cartRow['product_name'];

        $productDetailsQuery = "SELECT * FROM products WHERE product_name = '$productName'";
        $productDetailsResult = mysqli_query($con, $productDetailsQuery);

        if ($productDetailsResult) {
            $productDetails = mysqli_fetch_assoc($productDetailsResult);
          
    echo '<div>';
    
      echo '<form  style="margin-left:675px; margin-top:5px"  method="POST" action="Panier.php">';
      echo '<input type="hidden" name="productName" value="' . $productName . '">';
      echo '<button  type="submit"  id="supprimerpro_btn" name="SUPPRIMER"><svg style="color:red;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
         <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
         </svg></button>';
       echo '</form>';

            echo'<div id="pname-pimg-p">';
              echo '<div class="img_container_panier"><img  id="panier_img" src="images/' . $productDetails['image'] . '"></div>';
              echo '<p>Product Name: ' . $productDetails['product_name'] . '</p>';
          
           echo'</div>';
                echo '<p id=pr_price_panier>' . $productDetails['price'] . '$</p>';
          
              echo '<form id="quantity_panier" method="POST" action="Panier.php">';
              echo '<input type="hidden" name="productName" value="' . $productName . '">';
              echo '<p id="quantity_title">Quantity</p>';
              echo '<input  type="number" name="quantity" value="' . $cartRow['quantity'] . '" min="1" max="10">';
              echo '<button id="quantity_update_btn" type="submit"  name="updateQuantity">Update Quantity</button>';
              echo '</form>';
          

         echo"<div>";
              if (isset($_POST["updateQuantity"])) {
                $productName = $_POST["productName"];
                $newQuantity = $_POST["quantity"];
            
                $updateQuantityQuery = "UPDATE panier SET quantity = '$newQuantity' WHERE Id = '$userId' AND product_name = '$productName'";
                if (mysqli_query($con, $updateQuantityQuery)) {
                    header('location: Panier.php');
                } else {
                    echo "Error updating quantity: " . mysqli_error($con);
                }
             }
            
            echo'<hr>';
 echo '</div>';      
    
    }
 
    if (isset($_POST["SUPPRIMER"])) {

        $productName = $_POST["productName"];
        $deleteQuery = "DELETE FROM panier WHERE Id = '$userId' AND product_name = '$productName'";
        $Result = mysqli_query($con, $deleteQuery);
        if ($Result) {
            header('location: Panier.php');
        } 
    }

 }
}
echo '</section>';
 $totalQuery = "SELECT SUM(panier.quantity * products.price) AS total FROM panier
 JOIN products ON panier.product_name = products.product_name
 WHERE panier.Id = '$userId'"; 
 $totalResult = mysqli_query($con, $totalQuery);

 if ($totalResult) {
    $totalRow = mysqli_fetch_assoc($totalResult);
   $_SESSION['totale'] = $total = $totalRow['total'];
   if( $total != 0){
   echo '<div id="panier-total">';
        echo'<h1><b>Shipping Address<h1></b><br>';
        echo'<div id="name_phone_num">';
         echo' <h2>'.$_SESSION['username'].'</h2>';
           $username = $_SESSION['username'];

        $phoneQuery = "SELECT PhoneNumber FROM clients where Id = $userId";
         $resultphone = mysqli_query($con, $phoneQuery);
         
          if ($resultphone) {
           $rowphone = mysqli_fetch_assoc($resultphone);
            echo'<h2 id="phone_number">+212'.$rowphone['PhoneNumber'].'</h2>';
          }
        echo'</div>';
        $AddressQuery = "SELECT Address FROM clients where Id = $userId";
        $resultAddress = mysqli_query($con, $AddressQuery);
        if ($resultAddress) {
            $rowAddress = mysqli_fetch_assoc($resultAddress);
             echo'<h2>'.$rowAddress['Address'].'</h2><br>';
           }
      
        
      echo'<div id="shipping">';
           echo'<b><h1>Total shipping<h1></b>';
           echo'<b><h1 id="shipping_price">free<h1></b>';
      echo'</div>';
     
       echo'<hr>';
    
      echo'<div class="price">';
        echo '<b><p>Totale</p></b>';
         echo'<b><p style=" padding-left:150px; font-family:Arial, sans-serif;">' . $total. '$</p><br><br><br></b>';
      echo'</div>';
        //buy now btn
        echo '<form id="form_buynow" method="POST" action="Panier.php">';
        echo '<input type="hidden" name="client_id" value="' . $userId . '">';
        echo '<button id="buynow_btn" type="submit" name="buynow_btn">BUY NOW</button>';
        echo '</form>';
  
    echo'</div>';
   }
  else{
    echo"
    <script>
        var section = document.getElementById('panier');
        section.classList.add('hidden-section');
    </script>";

    echo'<div id="empty_panier" >No products yet</div>';


   }
  }
   
?>

</body>
</html>

<?php
}
?>