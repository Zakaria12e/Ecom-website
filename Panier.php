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

 <body>
 <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="images/gaming-pad-alt-1-svgrepo-com.svg" class="h-8" alt="Gravey Logo" />
            <span style="color: black;" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
        </a>
        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
            <li>
            <a href="home.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
            </li>
            <li>
                <a href="Products.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
            </li>
            <li>
                <a href="support.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Support</a>
            </li>
            <li>
            <a id="profile" href="profile.php" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
 </svg></a> 
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

 if ($cartResult) 
 {
    while ($cartRow = mysqli_fetch_assoc($cartResult)) {
    echo '<section class="panier">';
        $productName = $cartRow['product_name'];

        $productDetailsQuery = "SELECT * FROM products WHERE product_name = '$productName'";
        $productDetailsResult = mysqli_query($con, $productDetailsQuery);

        if ($productDetailsResult) {
            $productDetails = mysqli_fetch_assoc($productDetailsResult);
          
           echo '<div class="prod_panier">';
              echo '<div class="img_container_panier"><img  id="panier_img" src="' . $productDetails['image'] . '"></div>';
              echo '<p class="pp">Product Name: ' . $productDetails['product_name'] . '</p>';
              echo '<p class="pp">Price: $' . $productDetails['price'] . '</p>';
              echo '<p class="pp">Quantity: ' . $cartRow['quantity'] . '</p>';

    echo '<form   method="POST" action="Panier.php">';
        echo '<input type="hidden" name="productName" value="' . $productName . '">';
        echo '<button type="submit" class="pp"  name="SUPPRIMER"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
      </svg></button>';
        echo '</form>';
           echo '</div>';
     echo '</section>';
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


 $totalQuery = "SELECT SUM(panier.quantity * products.price) AS total FROM panier
 JOIN products ON panier.product_name = products.product_name
 WHERE panier.Id = '$userId'"; 
 $totalResult = mysqli_query($con, $totalQuery);


 if ($totalResult) {
    $totalRow = mysqli_fetch_assoc($totalResult);
    $total = $totalRow['total'];
   if( $total != 0){
    echo'<hr>';
     echo '<div id="panier-total">';
    echo '<p>Total: $' . $total . '</p>';
    echo '</div>';
    echo'<hr>';
   }
   else{
    echo'<div id="empty_panier">No products yet</div>';
   }
   
 } 


?>

</body>
</html>

<?php
}
?>  