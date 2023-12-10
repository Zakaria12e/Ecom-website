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
    <title>Tickets</title>
</head>
<body>


<header class="header">
  <a href="Admin0.php" class="logo">Gravey</a>
  <nav class="navbar">
    <a href="Admin0.php">Home</a>
    <a href="#AddAdmin">Add Admin</a>
    <a href="tickets.php">Tickets</a>
    <a href="logout.php"><img style="width: 21px; height: 23px; padding-top:4px;" src="images/logout_icon_151219.png"></a>

  </nav>
</header>

<?php
 require_once 'config.php';
    //tickets
  $selectQuery = "SELECT * FROM clients";
  $result = mysqli_query($con,$selectQuery);
  ?>

<div class="container">


<div style="margin-top: -100px;" class="ticket-display" id="tickets">

     <table  class="ticket_table">

       <thead>
        <tr>
              
               <th>Name</th>
               <th>Email</th>
               <th>Address</th>
               <th>Phone Number</th>
               <th>User Type</th>
               <th colspan="2">Action</th>
       </tr>
    
      </thead>

      <?php
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
         <tr>
    
               <td><?php echo $row['Username'];?></td>
               <td><?php echo $row['Email'];?></td>
               <td><?php echo $row['Address'];?></td>
               <td><?php echo $row['PhoneNumber'];?></td>
               <td><?php 
               if ( $row['user_type'] == 'admin') {
                 echo '<p style="color:red;">'.$row['user_type'].'</p>'  ;
               }
               else{
                echo '<p style="color:green;">'.$row['user_type'].'</p>'  ;
               }
               
               
               ?>
               </td>

              
               <td>
                 <a href="clients.php?update=<?php echo $row['Username']; ?>" class="btn">Modifier</a>
                 <a href="clients.php?order=<?php echo $row['Username']; ?>" class="btn">Order</a>
              
              </td>
               
               
               
       </tr>

     <?php } ?>
     </table> 
     
</div>
 
<?php 
if (isset($_POST['add_admin'])) {



  
}



?>

<section style="margin-top: 300px;" id="AddAdmin">
<div class="admin-product-form-container">

<form id="Add product" action="" method="POST">
      <h3>ADD ADMINS</h3>

            <input type="text" name="Admin_name" class="box" required placeholder="Name">
            
            <input type="email" name="Admin_email" class="box" required placeholder="Email">
            
            <input type="password" name="Admin_password" class="box" required placeholder="Password">

            <input type="hidden" name="user_type" value="admin">

            <input type="submit" class="btn"  name="add_admin" value="Add Admin">
</form>

</section>
</div>


</body>
</html>
<?php
}
?>