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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="nav.css">


</head>
<body>
      <header class="header">
  <a href="home.php" class="logo">Gravey</a>
  <nav class="navbar">
    <a href="home.php">Home</a>
    <a href="Profile.php">Profile</a>
  </nav>
  <button class="mobile-menu-button">&#9776;</button>  
</header>


<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

      <?php
      require_once('config.php');
       $userID =  $_SESSION['id'];
      
         $order_query = mysqli_query($con, "SELECT * FROM orders WHERE user_id = '$userID' ") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($row = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> placed on : <span><?php echo $row['placed_on']; ?></span> </p>
         <p> name : <span><?php echo $row['name']; ?></span> </p>
         <p> number : <span><?php echo $row['phone_number']; ?></span> </p>
         <p> email : <span><?php echo $row['email']; ?></span> </p>
         <p> address : <span><?php echo $row['address']; ?></span> </p>
         <p> payment method : <span><?php echo $row['method']; ?></span> </p>
         <p> your orders : <span><?php echo $row['total_products']; ?></span> </p>
         <p> total price : <span><?php echo $row['total_price']; ?>$</span> </p>
         <p> payment status : <span style="color:<?php if($row['payment_status'] == 'en attente'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $row['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

</section>






<hr style="margin-top: 40px;">

<?php include 'footer.php'; ?>

<script src="script.js"></script>

</body>
</html>

<?php  }?>