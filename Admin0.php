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
    <link rel="stylesheet" href="Admin0.css">
    <title>Admin</title>
</head>
<body>
 
<header class="header">
  <a href="Admin0.php" class="logo">Gravey</a>
  <nav class="navbar">
  <div class="dropdown">
      <a href="#">Product</a>
      <div class="dropdown-content">
      
             <a href="#Add product" >Add Product</a>
             <a href="#Product_list" >Product List</a>
     </div>
  </div>

    <a href="clients.php">Clients</a>
    <a href="tickets.php">Tickets</a>
    <a href="logout.php"><img style="width: 21px; height: 23px; padding-top:4px;" src="images/logout_icon_151219.png"></a>
  </nav>
</header>

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

<?php
    require_once 'config.php';
    $confirmationMessage = "";
    $errmsg = "";
  
    //add product
 if ( isset($_POST['add_product'])) {
   
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_Folder = 'images/'.$image;

    $description = $_POST['description'];
    $caracteristiques = $_POST['caracteristiques'];
    $category = $_POST['category'];
     
    if (empty($product_name) || empty($quantity) || empty($price) || empty($image) || empty($description) || empty($caracteristiques) || empty($category)) {

        $errmsg = "Veuillez remplire tous les champs";
    }
      else{


        $Insertquery = "INSERT INTO products (product_name, quantity, price, image, description, caracteristiques, category) VALUES ('$product_name', $quantity, $price, '$image', '$description', '$caracteristiques', '$category')";
        $result = mysqli_query($con, $Insertquery);
     if ($result) {
        move_uploaded_file($image_tmp_name,$image_Folder);
        $confirmationMessage = "Le produit a été inserer avec succès";
       
        }

      }
       
    }
      //delete product
     if (isset($_GET['delete'])) {
       
      $name = $_GET['delete'];
      $DeleteQuery = "DELETE FROM products WHERE product_name ='$name'";
      mysqli_query($con,$DeleteQuery);
      header('location:Admin0.php');

     }

?>      <?php if (!empty($confirmationMessage)) : ?>
           <div style=" margin-left: 430px ;margin-bottom:-20px; margin-top: -100px; font-size:20px;"  id="Addproduct" class="confirmationmsg"><?php echo $confirmationMessage; ?></div>
        <?php endif; ?>
        <?php if (!empty($errmsg)) : ?>
           <div style=" margin-left: 430px ;margin-bottom:-20px; margin-top: -100px; font-size:20px;"  id="Addproduct" class="erreurmsg"><?php echo $errmsg; ?></div>
        <?php endif; ?>


<div class="container">

<div class="admin-product-form-container">

<form id="Add product" action="" method="POST" enctype="multipart/form-data">
      <h3>ADD PRODUCT</h3>

            <input type="text" name="product_name" class="box" required placeholder="Product Name">
            
            <input type="number" name="quantity" class="box" required placeholder="Quantity" min="1">
            
            <input type="number" name="price" class="box" required placeholder="price" min="1">
            
            <input type="file" accept="image/png,image/jpeg,image/jpg" name="image" class="box" required >
            
            <textarea name="caracteristiques" class="box" required placeholder="caracteristiques"></textarea>
            
            <input type="text" name="description" class="box" required placeholder="description">
            
            <input type="text" name="category" class="box" required placeholder="Category">

            <input type="submit" class="btn"  name="add_product" value="Add Product">
</form>
     
</div>
  <?php
  $selectQuery = "SELECT * FROM products";
  $result = mysqli_query($con,$selectQuery);
  ?>

<div class="product-display" id="Product_list">

     <table id="Product list"  class="product_table">

       <thead>
        <tr>
               <th>Product Image</th>
               <th>Product Name</th>
               <th>Product Price</th>
               <th colspan="2">action</th>
       </tr>
    
      </thead>

      <?php
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
         <tr>
               <td ><img style="width: 100px;  border-radius: 6px;" src="images/<?php echo $row['image'];?>"></td>
               <td><?php echo $row['product_name'];?></td>
               <td><?php echo $row['price'];?>$</td>
               <td>
               <a href="Admin_update_product.php?edit=<?php echo $row['product_name']; ?>" class="btn">Modifier</a>
               <a href="Admin0.php?delete=<?php echo $row['product_name']; ?>" class="btn">Supprimer</a>

               </td>
       </tr>

      <?php } ?>
     </table>
</div>



</div>
<script>
      let AddProductmsg = document.getElementById('Addproduct');
      setTimeout(function() { AddProductmsg.classList.add('hide-message');} , 2000);
</script>
</body>
</html>

<?php
}
?>