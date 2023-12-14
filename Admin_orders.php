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
    <link rel="icon" href="images/logogravey.jpg" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="css/Admin0.css">
    <title>Orders</title>
  </head>

  <body>
    <header class="header">
      <a href="Admin0.php" class="logo">Gravey</a>
      <nav class="navbar">
        <a href="Admin0.php">Home</a>
        <a href="tickets.php">Tickets</a>
        <a href="users.php">Users</a>
        <a href="logout.php"><img style="width: 21px; height: 23px; padding-top:4px;" src="images/logout_icon_151219.png"></a>
      </nav>
      <button class="mobile-menu-button">&#9776;</button>
    </header>

    <?php
    require_once 'config.php';
    //orders
    $selectQuery = "SELECT * FROM orders";
    $result = mysqli_query($con, $selectQuery);
    ?>

    <div class="container">

      <?php
      //delete order

      if (isset($_POST['Delete_order'])) {

        $id = $_POST['order_id'];
        $DeleteQuery = "DELETE FROM orders WHERE id ='$id'";

        mysqli_query($con, $DeleteQuery);
        if (mysqli_query($con, $DeleteQuery)) {
          header('location: Admin_orders.php');
        };
      }

      if (isset($_POST['Update_order'])) {

        $orderId = $_POST['order_id'];
        $newStatus = $_POST['new_status'];

     $selectquery = "SELECT * FROM orders WHERE id =  $orderId";
        mysqli_query($con,$selectquery);
        if ( mysqli_query($con,$selectquery) ) {
           $row = mysqli_fetch_assoc( mysqli_query($con,$selectquery));
           if ($row) {
            $userid =  $row['user_id'];
           }
        }
         
        $Query = "UPDATE orders SET payment_status = '$newStatus' WHERE  user_id = '$userid' AND id = '$orderId' ";
         mysqli_query($con, $Query);

        $HistoryQuery = "UPDATE order_history SET order_status = '$newStatus' WHERE user_id = '$userid' AND order_id = '$orderId '";
        mysqli_query($con, $HistoryQuery);

        if (mysqli_query($con, $Query) && mysqli_query($con, $HistoryQuery)) {
          header('location: Admin_orders.php');
      }
      }
      ?>

    </div>

    </div>

    <section class="orders">

      <h1 class="title">COMMANDES</h1>

      <div class="box-container">
        <?php
        $select_orders = mysqli_query($con, "SELECT * FROM orders") or die('query failed');
        if (mysqli_num_rows($select_orders) > 0) {
          while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
        ?>
            <div class="box">
              <p> commande id : <span><?php echo $fetch_orders['id']; ?></span> </p>
              <p> id de utilisateur : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
              <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
              <p> nom : <span><?php echo $fetch_orders['name']; ?></span> </p>
              <p> number : <span><?php echo $fetch_orders['phone_number']; ?></span> </p>
              <p> E-mail : <span><?php echo $fetch_orders['email']; ?></span> </p>
              <p> Adresse : <span><?php echo $fetch_orders['address']; ?></span> </p>
              <p> produits : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
              <p> prix total  : <span><?php echo "{$fetch_orders['total_price']} MAD";?></span> </p>
              <p> methode de payment  : <span><?php echo $fetch_orders['method']; ?></span> </p>
              <p> status : <span><?php

                                  $status = $fetch_orders['payment_status'];

                                  switch ($status) {
                                    case 'Termine':
                                      echo '<span style="color:green;">Termine</span>';
                                      break;
                                    case 'En cours':
                                      echo '<span style="color:orange;">En cours</span>';
                                      break;

                                    default:
                                      echo '<span style="color:red;">En attente</span>';
                                      break;
                                  }
                                  ?></span> </p>

                
             
              <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                <select name="new_status"> 
                  <?php
                  echo '<option value="En attente" ' . ($row['payment_status'] == 'En attente' ? 'selected' : '') . '>En attente</option>
                        <option value="En cours" ' . ($row['payment_status'] == 'En cours' ? 'selected' : '') . '>En cours</option>
                        <option value="Termine" ' . ($row['payment_status'] == 'Termine' ? 'selected' : '') . '>Termine</option>  ';
                  ?>
                </select>
                <button class="btn" type="submit" name="Update_order">Mise à jour</button>
                <button class="btn" type="submit" name="Delete_order">Supprimer</button>
              </form>

              
            </div>



        <?php
          }
        } else {
          echo '<p class="empty">no orders placed yet!</p>';
        }
        ?>
      </div>

    </section>

    <script src="script.js"></script>
  </body>

  </html>
<?php
}
?>