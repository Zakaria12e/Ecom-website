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
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="Admin0.css">


    <title>mes tickets</title>

  </head>

  <body>
    <style>
      @media only screen and (max-width: 768px) {
        .ticket_table {
          margin: 10px;
        }

        .ticket_table th,
        .ticket_table td {
          font-size: 1rem;
          padding: 0.8rem;
        }

        .admin-product-form-container {
          margin: 1rem 0;
        }
      }
    </style>
    <header class="header">
      <a href="home.php" class="logo">Gravey</a>
      <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="support.php">Support</a>
        <a href="Profile.php">Profile</a>

      </nav>
      <button class="mobile-menu-button">&#9776;</button>
    </header>
    <?php

    require_once 'config.php';
    $username = $_SESSION['username'];
    $query = "SELECT * FROM tickets WHERE name = '$username'";
    $result = mysqli_query($con, $query);
    ?>

    <div class="container">

      <div class="admin-product-form-container">

        <div class="ticket-display" id="ticket_list">
          <h1 id="title">mes tickets</h1>
          <table class="ticket_table">

            <thead>
              <tr>
                <th>Ticket Id</th>
                <th>Client Name</th>
                <th>Client Email</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Ticket status</th>
                <th>Reponse</th>
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
                <td>
                  <?php echo $row['solution'];  ?>
                </td>

              </tr>

            <?php } ?>
          </table>


        </div>

      </div>

    </div>

    <script src="script.js"></script>
  </body>

  </html>
<?php
}
?>