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
    <link rel="stylesheet" href="admin.css">
    <title>Admin Dashboard</title>
  
</head>
<body>

<div class="sidebar">
    <div class="side-header">
       <a style="text-decoration: none;" href="admin.php"> <h5 style="margin-top:10px; color:white; font-size:30px;">Hello Admin</h5></a>
    </div>
    <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">

    <a class="links" href="#products"> Products</a>
    <a class="links" href="#clients"> Clients</a>
    <a class="links" href="#commandes"> Commandes</a>
    <a class="links" href="#Tickets"> Tickets</a>
    <a id="logout" class="links" href="logout.php">logout</a>

</div>




<div id="main">

  <section  id="dashboard">
   <?php
   
   include('config.php');
  // number of clients
   $query = "SELECT COUNT(*) AS total_clients FROM clients WHERE user_type = 'normal user'";
   $result = mysqli_query($con,$query);
   if ($result) {
      $row = mysqli_fetch_assoc($result);
      echo'<div class="total">';
      echo'<h3>Clients</h3>';
      echo '<h3>'. $row['total_clients'].'</h3>';
      echo'</div>';
   }
     // number of products
   $productsquery = "SELECT COUNT(*) AS total_products FROM products";
   $productsresult = mysqli_query($con,$productsquery);
   if ($productsresult) {
      $row = mysqli_fetch_assoc($productsresult);
      echo'<div class="total">';
      echo'<h3>Products</h3>';
      echo '<h3>'. $row['total_products'].'</h3>';
      echo'</div>';
   }
     // number of tickts
     $ticketsquery = "SELECT COUNT(*) AS total_tickets FROM tickets";
     $ticketsresult = mysqli_query($con, $ticketsquery);
       // number of tickts en attente
     $en_attente_query = "SELECT COUNT(*) AS tickets_en_attente FROM tickets WHERE status = 'en attente'";
     $tickets_en_attente = mysqli_query($con, $en_attente_query);
     // number of tickts en cours
     $en_cours_query = "SELECT COUNT(*) AS tickets_en_cours FROM tickets WHERE status = 'en cours'";
     $tickets_en_cours = mysqli_query($con, $en_cours_query);
     //number of tickets termine
     $termine_query = "SELECT COUNT(*) AS tickets_termine FROM tickets WHERE status = 'termine'";
     $tickets_termine = mysqli_query($con, $termine_query); 

   if ($ticketsresult) {
      $row = mysqli_fetch_assoc($ticketsresult);

      echo'<div class="total">';
      echo'<h3>Tickets</h3>';
      echo '<h3>'. $row['total_tickets'].'</h3>';

        echo'<span id="tickets_container">';
        if ( $tickets_en_attente) {
            $row = mysqli_fetch_assoc($tickets_en_attente);
            echo '<span class="tickets" style="color:red;">'. $row['tickets_en_attente'].'</span>';
        }
        
        if ($tickets_en_cours) {
            $row = mysqli_fetch_assoc($tickets_en_cours);
            echo '<span class="tickets" style="color:orange;">'. $row['tickets_en_cours'].'</span>';
        }
    
        if ($tickets_termine) {
            $row = mysqli_fetch_assoc($tickets_termine);
            echo '<span class="tickets"  style="color:green;">'. $row['tickets_termine'].'</span>';
        }
       
         
        echo'</span>';

      echo'</div>';
   }


   ?>
  </section>


<hr>

     <h2 class="title">products</h2>
    <section id="products">
      
    <?php
    require_once 'config.php';
    $confirmationMessage = "";
    
if ( isset($_POST['add_product'])) {
   
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $caracteristiques = $_POST['caracteristiques'];
    $category = $_POST['category'];

    $Insertquery = "INSERT INTO products (product_name, quantity, price, image, description, caracteristiques, category) VALUES ('$product_name', $quantity, $price, '$image', '$description', '$caracteristiques', '$category')";
    $result = mysqli_query($con, $Insertquery);
     if ($result) {

        $confirmationMessage = "Le produit a été inserer avec succès";
       
        }
        
}
?>     <?php if (!empty($confirmationMessage)) : ?>
           <div id="addproduct" class="confirmationmsg"><?php echo $confirmationMessage; ?></div>
        <?php endif; ?>
        <div id="product-interface">

        

     
        
        <form class="addProduct_Form" action="admin.php"  method="post">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required>
            
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required>
            
            <label for="price">Price:</label>
            <input type="number" name="price" required>
            
            <label for="image">Image URL:</label>
            <input type="text" name="image" required>
            
            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
            
            <label for="caracteristiques">Caracteristiques:</label>
            <input type="text" name="caracteristiques" required>
            
            <label for="category">Category:</label>
            <input type="text" name="category" required>
            
            <button type="submit" name="add_product">Add Product</button>
        </form>
    </div>
  
    <div id="delete_container">

      <?php
    require_once 'config.php';
    $dropMsg ="";
    if(isset($_POST['deletebtn']))
    {  
        //delete product
        $product = $_POST['product_name'];
      $query = "DELETE FROM products WHERE product_name = '$product'";
      $result = mysqli_query($con, $query);
      if($result)
      {
          $dropMsg = "'$product' deleted successfully.";
      }
    }
  
      ?> 
         <?php if (!empty($dropMsg)) : ?>
        <div id="deleteproduct" class="confirmationmsg"><?php echo $dropMsg ; ?></div>
        <?php endif; ?>

       <form method="post" action= "admin.php">
            <input type="text" name="product_name" placeholder="Product name" required>
            <button type="submit" name="deletebtn">Delete</button>
        </form>
    </div>

    </section>
 <hr>
    <section id="clients">
        <h2 class="title">Clients</h2>
    </section>

<hr>
    <section id="commandes">
        <h2 class="title">Commandes</h2>
        
    </section>
<hr>
    <section id="Tickets">
        <h2 class="title">Tickets</h2>
        
    </section>



</div>

<script src="script.js"></script>
</body>
</html>

<?php
}
?>