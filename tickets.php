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
    <title>Tickets</title>
  </head>

  <body>
  <style>
  @media only screen and (max-width: 600px) {
   
    .product-display table,
    .ticket-display table {
        margin: 20px;

    }

    .product-display td,
    .ticket-display td,
    .product-display th,
    .ticket-display th {
        font-size: 1rem;
        padding: 0.34rem;
    }

    .product-display,
    .ticket-display {
        margin: 0.5rem 0;
    }
    .btn {
        font-size: 1rem;
        padding: 0.8rem; 
        width: 100px;
    }
    textarea{
      padding: -1rem; 
    }
}
 </style>

    <header class="header">
      <a href="Admin0.php" class="logo">Gravey</a>
      <nav class="navbar">
        <a href="Admin0.php">Home</a>
        <a href="Admin_orders.php">Orders</a>
        <a href="users.php">Users</a>
        <a href="logout.php"><img style="width: 21px; height: 23px; padding-top:4px;" src="images/logout_icon_151219.png"></a>
      </nav>
      <button class="mobile-menu-button">&#9776;</button>
    </header>

    <?php
    require_once 'config.php';
    //tickets
    $selectQuery = "SELECT * FROM tickets";
    $result = mysqli_query($con, $selectQuery);
    ?>

    <div class="container">


      <div style="margin-top: -100px;" class="ticket-display" id="tickets">

        <table class="ticket_table">

          <thead>
            <tr>
              <th>Ticket Id</th>
              <th>Client Name</th>
              <th>Client Email</th>
              <th>Message</th>
              <th>Created At</th>
              <th>Ticket status</th>
              <th colspan="2">action</th>
            </tr>

          </thead>

          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['message']; ?></td>
              <td><?php echo $row['created_at']; ?></td>

              <td>
                <?php

                $status = $row['status'];

                switch ($status) {
                  case 'termine':
                    echo '<p style="color:green;" >Termine</p>';
                    break;
                  case 'en cours':
                    echo '<p style="color:orange;" >En cours</p>';
                    break;

                  default:
                    echo '<p style="color:red;" >En attente</p>';
                    break;
                }

                ?>
              </td>


              <?php
              echo '<td>
                                <form action="tickets.php" method="post">
                                <input type="hidden" name="ticket_id" value="' . $row['id'] . '">
                                    <select name="new_status">
                                        <option value="En attente" ' . ($row['status'] == 'En attente' ? 'selected' : '') . '>En attente</option>
                                        <option value="en cours" ' . ($row['status'] == 'en cours' ? 'selected' : '') . '>en cours</option>
                                        <option value="termine" ' . ($row['status'] == 'termine' ? 'selected' : '') . '>termine</option>
                                    </select>
                                    <textarea name="solution"  placeholder="Saisissez la solution du problème">' . htmlspecialchars($row['solution']) . '</textarea>
                                    <button class="btn" type="submit" name="Update_ticket">Update</button>
                                    <button class="btn" type="submit" name="Delete_ticket">Delete</button>
                                    
                                </form>
                                 
                            </td>';
              ?>

            </tr>

          <?php } ?>
        </table>

      </div>

      <?php
      //delete ticket

      if (isset($_POST['Delete_ticket'])) {

        $id = $_POST['ticket_id'];
        $DeleteQuery = "DELETE FROM tickets WHERE id ='$id'";

        mysqli_query($con, $DeleteQuery);
        if (mysqli_query($con, $DeleteQuery)) {
          header('location: tickets.php');
        };
      }
      $newSolution = "";
      if (isset($_POST['Update_ticket'])) {

        $ticketId = $_POST['ticket_id'];
        $newStatus = $_POST['new_status'];
        $newSolution = $_POST['solution'];

        $Query = "UPDATE tickets SET status = '$newStatus', solution = '$newSolution' WHERE id = $ticketId";

        mysqli_query($con, $Query);
        if (mysqli_query($con, $Query)) {
          header('location: tickets.php');
        }
      }
      ?>


    </div>

    </div>

    <script src="script.js"></script>
  </body>

  </html>
<?php
}
?>