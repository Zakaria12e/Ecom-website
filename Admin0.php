<?php
session_start();
if (!isset($_SESSION['username'])) {
   header('location:login.php');
} else {

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

                  <a href="#Add product">Add Product</a>
                  <a href="#Product_list">Product List</a>
               </div>
            </div>

            <a href="users.php">Users</a>
            <a href="Orders.php">Orders</a>
            <a href="tickets.php">Tickets</a>
            <a href="logout.php"><img style="width: 21px; height: 23px; padding-top:4px;" src="images/logout_icon_151219.png"></a>
         </nav>
         <button class="mobile-menu-button">&#9776;</button>
      </header>


      <section class="dashboard">

         <h1 class="title">dashboard</h1>

         <div class="box-container">

            <div class="box">
               <?php
               require_once('config.php');
               $total_completed = 0;
               $select_completed = mysqli_query($con, "SELECT total_price FROM orders WHERE payment_status = 'completed'") or die('query failed');
               if (mysqli_num_rows($select_completed) > 0) {
                  while ($row = mysqli_fetch_assoc($select_completed)) {
                     $total_price = $row['total_price'];
                     $total_completed += $total_price;
                  };
               };
               ?>
               <h3><?php echo $total_completed; ?>$</h3>
               <p>completed payments</p>
            </div>
            <div class="box">
               <?php
               $select_orders = mysqli_query($con, "SELECT * FROM orders") or die('query failed');
               $number_of_orders = mysqli_num_rows($select_orders);
               ?>
               <h3><?php echo $number_of_orders; ?></h3>
               <p>orders</p>
            </div>
            <div class="box">
               <?php

               $select_products = mysqli_query($con, "SELECT * FROM products") or die('query failed');
               $number_of_products = mysqli_num_rows($select_products);
               ?>
               <h3><?php echo $number_of_products; ?></h3>
               <p>products added</p>
            </div>

            <div class="box">
               <?php
               $select_users = mysqli_query($con, "SELECT * FROM clients WHERE user_type = 'normal user'") or die('query failed');
               $number_of_users = mysqli_num_rows($select_users);
               ?>
               <h3><?php echo $number_of_users; ?></h3>
               <p>normal users</p>
            </div>

            <div class="box">
               <?php
               $select_admins = mysqli_query($con, "SELECT * FROM clients WHERE user_type = 'admin'") or die('query failed');
               $number_of_admins = mysqli_num_rows($select_admins);
               ?>
               <h3><?php echo $number_of_admins; ?></h3>
               <p>admin users</p>
            </div>



            <div class="box">
               <?php
               $select_messages = mysqli_query($con, "SELECT * FROM tickets") or die('query failed');
               $number_of_messages = mysqli_num_rows($select_messages);
               ?>
               <h3><?php echo $number_of_messages; ?></h3>
               <p>messages</p>
            </div>


         </div>

      </section>

      <?php
      require_once 'config.php';

      //add product
      if (isset($_POST['add_product'])) {

         $product_name = $_POST['product_name'];
         $quantity = $_POST['quantity'];
         $price = $_POST['price'];

         $image = $_FILES['image']['name'];
         $image_tmp_name = $_FILES['image']['tmp_name'];
         $image_Folder = 'images/' . $image;

         $description = $_POST['description'];
         $caracteristiques = $_POST['caracteristiques'];
         $category = $_POST['category'];

         if (empty($product_name) || empty($quantity) || empty($price) || empty($image) || empty($description) || empty($caracteristiques) || empty($category)) {

            $Messages[]  = "Veuillez remplire tous les champs";
         } else {


            $Insertquery = "INSERT INTO products (product_name, quantity, price, image, description, caracteristiques, category) VALUES ('$product_name', $quantity, $price, '$image', '$description', '$caracteristiques', '$category')";
            $result = mysqli_query($con, $Insertquery);
            if ($result) {
               move_uploaded_file($image_tmp_name, $image_Folder);
               $Messages[] = "Le produit a été inserer avec succès";
            }
         }
      }
      //delete product
      if (isset($_GET['delete'])) {

         $name = $_GET['delete'];
         $DeleteQuery = "DELETE FROM products WHERE product_name ='$name'";
         mysqli_query($con, $DeleteQuery);
         if (mysqli_query($con, $DeleteQuery)) {

            $Messages[] = "Le produit a été supprimer avec succès";
         }
         header('location:Admin0.php');
      }

      ?>

      <?php
      if (isset($Messages)) {
         foreach ($Messages as $Message) {
            echo '
      <div class="message">
         <span>' . $Message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
         }
      }
      ?>

      <div class="container">

         <div class="admin-product-form-container">

            <form id="Add product" action="" method="POST" enctype="multipart/form-data">
               <h3>ADD PRODUCT</h3>

               <input type="text" name="product_name" class="box" required placeholder="Product Name">

               <input type="number" name="quantity" class="box" required placeholder="Quantity" min="1">

               <input type="number" name="price" class="box" required placeholder="price" min="1">

               <input type="file" accept="image/png,image/jpeg,image/jpg" name="image" class="box" required>

               <textarea name="caracteristiques" class="box" required placeholder="caracteristiques"></textarea>

               <input type="text" name="description" class="box" required placeholder="description">

               <input type="text" name="category" class="box" required placeholder="Category">

               <input type="submit" class="btn" name="add_product" value="Add Product">
            </form>

         </div>
         <?php
         $selectQuery = "SELECT * FROM products";
         $result = mysqli_query($con, $selectQuery);
         ?>

         <div class="product-display" id="Product_list">

            <table id="Product list" class="product_table">

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
                     <td><img style="width: 100px;  border-radius: 6px;" src="images/<?php echo $row['image']; ?>"></td>
                     <td><?php echo $row['product_name']; ?></td>
                     <td><?php echo $row['price']; ?>$</td>
                     <td>
                        <a href="Admin_update_product.php?edit=<?php echo $row['product_name']; ?>" class="btn">Modifier</a>
                        <a href="Admin0.php?delete=<?php echo $row['product_name']; ?>" class="btn">Supprimer</a>

                     </td>
                  </tr>

               <?php } ?>
            </table>
         </div>

      </div>
      <script src="script.js"></script>
   </body>

   </html>

<?php
}
?>