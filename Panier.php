<?php
 session_start();
 if(!isset($_SESSION['username'])){
   header('location:login.php');
 }
 else{

?>



 <!DOCTYPE html>
 <html lang="fr">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="nav.css">
     <link rel="stylesheet" href="Admin0.css">
    <title>Panier</title>
 </head>

 <body>


 <header class="header">

         
<a class="logo" href="home.php">Gravey</a>
<nav class="navbar">

     <a href="home.php">Home</a>
     <a href="#Payment">Payment</a>
     <a href="support.php">Support</a>
     <a href="Profile.php"> <?php echo $_SESSION['username'];?></a>

</nav>
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


<div style="margin-top: -200px;" class="ticket-display" id="tickets">

     <table id="table" class="ticket_table">

       <thead>
        <tr>
               <th>Product Image</th>
               <th>Product Name</th>
               <th>Price</th>
               <th colspan="2">Quantity</th>
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
               <td > <img style="width: 160px;  border-radius: 6px;" src="images/<?php  echo  $productDetails['image'];?>"></td>
               <td><?php echo $row['product_name'];?></td>
               <td><?php echo $productDetails['price'];?></td>
               <td>

                    <form id="quantity_panier" method="POST" action="panier.php">
                      <input type="hidden" name="productName" value="<?php echo $row['product_name'];?>">
                      <input id="quantity"  type="number" name="quantity" value="<?php echo $row['quantity'];?>" min="1" max="10">
                      <button id="quantity_update_btn" type="submit"  name="updateQuantity">Update Quantity</button>
                      <button id="delete_from_panier" type="submit" name="SUPPRIMER" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg></button>
                   </form>
               </td>

               <td></td>
                <?php

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

                if (isset($_POST["SUPPRIMER"])) {

                    $productName = $_POST["productName"];
                    $deleteQuery = "DELETE FROM panier WHERE Id = '$userId' AND product_name = '$productName'";
                    $Result = mysqli_query($con, $deleteQuery);
                    if ($Result) {
                        header('location: Panier.php');
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
   if( $total != 0){
   echo '<div id="Payment">';
         
        echo'<div style="text-align: center; margin-top:40px;"><h1><b>Shipping Address</h1></b><br></div>';

        echo'<div style="display:flex">';
         echo'<h2 style="padding-right:70px;"><b>Client Name </h2>';
         echo' <h2>'.$_SESSION['username'].'</h2>';
        echo'</div>';
       
           $username = $_SESSION['username'];

        $phoneQuery = "SELECT PhoneNumber FROM clients where Id = $userId";
         $resultphone = mysqli_query($con, $phoneQuery);
         
          if ($resultphone) {
           $rowphone = mysqli_fetch_assoc($resultphone);
           echo'<div style="display:flex">';
            echo'<h2 style="padding-right:50px;"><b>Phone Number </h2>';
            echo'<h2 id="phone_number">+212'.$rowphone['PhoneNumber'].'</h2>';
           echo'</div>';
           
          }
        echo'</div>';
        $AddressQuery = "SELECT Address FROM clients where Id = $userId";
        $resultAddress = mysqli_query($con, $AddressQuery);
        if ($resultAddress) {
            $rowAddress = mysqli_fetch_assoc($resultAddress);
        
              echo'<h2><b>Client Address</h2>';
              echo'<h2>'.$rowAddress['Address'].'</h2><br>';
             
            
           }
      
        
      echo'<div style=" display:flex; justify-content: space-between; align-items: center;">';
           echo'<b><h1>Total shipping</h1></b>';
           echo'<b><h1>free</h1></b>';
      echo'</div>';
     
       echo'<hr>';
    
      echo'<div style=" display:flex; justify-content: space-between; align-items: center;">';
        echo '<b><h1 style="margin-top:-40px;">Totale</h1></b>';
         echo'<b><h1>' . $total. '$</h1><br><br><br></b>';
      echo'</div>';
        //buy now btn
        echo '<form id="form_buy_now"  method="POST" action="Panier.php">';
        echo '<input type="hidden" name="client_id" value="' . $userId . '">';
          
        echo '<button id="buy_now_btn"  type="submit" name="buynow_btn">BUY NOW</button>';
        echo '</form>';
  
    echo'</div>';
   }
  else{
    echo"
    <script>
        var section = document.getElementById('table');
        section.classList.add('hidden-section');
    </script>";

    echo'<div id="empty_panier" ><h1>No products yet</h1></div>';


   }
  }
      ?>

</body>
</html>

<?php
}
?>