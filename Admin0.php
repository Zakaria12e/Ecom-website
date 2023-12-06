
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin0.css">
    <link rel="stylesheet" href="navbar.css">
    <title>Admin</title>
</head>
<body>
 
<header class="header">
  <a href="Admin0.php" class="logo">Gravey</a>
  <nav class="navbar">
    <a href="#Product_list">Product List</a>
    <a href="#">Clients</a>
    <a href="#">Orders</a> 
    <a href="logout.php">Log out</a>
  </nav>
</header>

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
           <div id="addproduct" class="confirmationmsg"><?php echo $confirmationMessage; ?></div>
        <?php endif; ?>
        <?php if (!empty($errmsg)) : ?>
           <div id="addproduct" class="erreurmsg"><?php echo $errmsg; ?></div>
        <?php endif; ?>


       
        <div id="product-interface">

<div class="container">

<div class="admin-product-form-container">

<form action="" method="POST" enctype="multipart/form-data">
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

     <table class="product_table">

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
               <td ><img style="width: 100px;" src="images/<?php echo $row['image'];?>"></td>
               <td><?php echo $row['product_name'];?></td>
               <td><?php echo $row['price'];?></td>
               <td>
               <a href="Admin_update_product.php?edit=<?php echo $row['product_name']; ?>" class="btn">Modifier</a>
               <a href="Admin0.php?delete=<?php echo $row['product_name']; ?>" class="btn">Supprimer</a>

               </td>
       </tr>

      <?php } ?>
     </table>
</div>


</div>
</body>
</html>