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

                <?php  if ($row['user_type'] != 'admin'){   ?>
                 <a href="users.php?order=<?php echo $row['Username']; ?>" class="btn">Order</a>
                 <a href="users.php?delete=<?php echo $row['Username']; ?>" class="btn">Supprimer</a>
                <?php  } 
               else{  if($row['Username'] != $_SESSION['username']){?>
               
               <a href="users.php?delete=<?php echo $row['Username']; ?>" class="btn">Supprimer</a>
               
                   <?php   

                    } else{ echo'<h3>YOU</h3>'; } }?>
                

              </td>
               
               
               
       </tr>

     <?php } ?>
     </table> 
     
</div>
 
<?php 
if (isset($_POST['add_admin'])) {

    $AdminName = $_POST['Admin_name'];
    $AdminEmail = $_POST['Admin_email'];
    $AdminPassword = password_hash($_POST['Admin_password'],PASSWORD_DEFAULT)  ;
    $Type = $_POST['user_type'];

     // Vérification de l'adresse e-mail unique
    $verify_query = mysqli_query($con,"SELECT Email FROM clients WHERE Email='$AdminEmail'");
          
    if(mysqli_num_rows($verify_query) != 0){
       
      $Messages[] =  'Cet e-mail est déjà utilisé veuillez en choisir un autre !';

    } 
    else{
       $AddAdminQuery =  "INSERT INTO clients (Username,Email,Password,user_type) VALUES ('$AdminName','$AdminEmail','$AdminPassword','$Type')";
       $result =  mysqli_query($con,$AddAdminQuery);

     if ($result) {
       
      $Messages[] = 'Creation réussie ';
      header('location:users.php');
     }
     else{
      $Messages[] = 'Erreur creation refusé !!';
     }
    }
   
  
}

//delete product
if (isset($_GET['delete'])) {
       
  $username = $_GET['delete'];
  $DeleteQuery = "DELETE FROM clients WHERE Username ='$username'";
  mysqli_query($con,$DeleteQuery);
  if (mysqli_query($con,$DeleteQuery)) {

    $Messages[] = "Acc a été supprimer avec succès";
  }
  header('location:users.php');

 }

if(isset($Messages)){
  foreach($Messages as $Message){
echo '
 <div class="message">
 <span>'.$Message.'</span>
   <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
 </div>
     ';
}
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