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
    <title>Update Products</title>
    <link rel="stylesheet" href="Admin0.css">
</head>
<body>
    
<?php
    require_once 'config.php';
    $PRname = $_GET['edit'];
    $confirmationMessage = "";
    $errmsg = "";
    $product_name = "";
    $quantity = "";
    $image = "";
    $description = "";
    $caracteristiques = "";
    $category = "";

    //update product
 if ( isset($_POST['update_product'])) {
   
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_Folder = 'images/'.$image;

    $description = $_POST['description'];
    $caracteristiques = $_POST['caracteristiques'];
    $category = $_POST['category'];
     
    if (!empty($product_name) && !empty($quantity) && !empty($price) && !empty($image) && !empty($description) && !empty($caracteristiques) && !empty($category)) {

        $Insertquery = "UPDATE products  SET product_name = '$product_name', quantity = '$quantity', price = '$price' , image = '$image', description = '$description', caracteristiques = '$caracteristiques', category ='$category'
        WHERE product_name = '$PRname'";
        $result = mysqli_query($con, $Insertquery);
     if ($result) {
        move_uploaded_file($image_tmp_name,$image_Folder);
        $confirmationMessage = "Le produit a été mise ajourer avec succès";
       
        }
    }
      else{

     $errmsg = "Veuillez remplire tous les champs";

      }
       
    }

?>

<div class="container">
<?php if (!empty($confirmationMessage)) : ?>
           <div style=" margin-left: 220px ;margin-bottom:15px; margin-top: -100px; font-size:20px;" id="updateproduct" class="confirmationmsg"><?php echo $confirmationMessage; ?></div>
        <?php endif; ?>
<div class="admin-product-form-container">
  
<form action="" method="POST" enctype="multipart/form-data">
      <h3>UPDATE PRODUCT</h3>
               
      <?php
 
          if (isset($_GET['edit'])) {
             
            $Product_N = $_GET['edit'];
             $selectQuery = "SELECT * FROM products WHERE product_name = '$Product_N'";
             $result = mysqli_query($con,$selectQuery);
             $rowinfo = mysqli_fetch_assoc($result);
             if ($rowinfo) {
                
       ?>

            <input type="text" name="product_name" class="box" required  value="<?php echo $rowinfo['product_name']; ?>">
            
            <input type="number" name="quantity" class="box" required  min="1" value="<?php echo $rowinfo['quantity']; ?>">
            
            <input type="number" name="price" class="box" required  min="1" value="<?php echo $rowinfo['price']; ?>">
            
            <input type="file" accept="image/png,image/jpeg,image/jpg" name="image" class="box" required >
            
            <input type="text" name="caracteristiques" class="box" required  value="<?php echo $rowinfo['Caracteristiques']; ?>">
            
            <input type="text" name="description" class="box" required  value="<?php echo $rowinfo['description']; ?>">
            
            <input type="text" name="category" class="box" required  value="<?php echo $rowinfo['category']; ?>">

            <input type="submit" class="btn"  name="update_product" value="Update">
            <a style="background-color: black; width:150px;" href="Admin0.php" class="btn">GO BACK</a>
</form> 

<?php } }; ?>
     
</div>
</div>
<script>
      let UpdateProductmsg = document.getElementById('updateproduct');
      setTimeout(function() { UpdateProductmsg.classList.add('hide-message');} , 2000);
</script>
</body>
</html>
<?php } ?>