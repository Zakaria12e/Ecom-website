<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin0.css">
    <title>Admin</title>
</head>
<body>
    
<?php
    require_once 'config.php';
    $confirmationMessage = "";
    $errmsg = "";
    $product_name = "";
    $quantity = "";
    $image = "";
    $description = "";
    $caracteristiques = "";
    $category = "";

    
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
    
        

?>     <?php if (!empty($confirmationMessage)) : ?>
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
  
</div>
</body>
</html>