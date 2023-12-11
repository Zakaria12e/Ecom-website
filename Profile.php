<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {
    include("config.php");
    $newname = "";
    $newemail = "";
    $newAddress = "";
    $id = $_SESSION['id'];
    $newPhoneNumber = "";

    if (!isset($_SESSION['Address'])) {
        $query = "SELECT Address FROM clients WHERE Id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['Address'] = $row['Address'];
    }
    if (!isset($_SESSION['PhoneNumber']) &&  !isset($_SESSION['email'])) {
        $query = "SELECT PhoneNumber FROM clients WHERE Id = $id";

        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['PhoneNumber'] = $row['PhoneNumber'];

        $query = "SELECT email FROM clients WHERE Id = $id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];

    }



    if (isset($_POST['submit'])) {
        $newname = $_POST['username'];
        $newemail = $_POST['email'];
         //Update Username and Email 
        $query = "UPDATE clients SET Username='$newname', Email='$newemail' WHERE Id = $id";
        $result = mysqli_query($con, $query);
        $_SESSION['username'] = $newname;
        $_SESSION['email'] = $newemail;
          //Update Address
        $newAddress = $_POST['Address'];
        $query = "UPDATE clients SET Address='$newAddress' WHERE Id = $id";
        mysqli_query($con, $query);
        $_SESSION['Address'] = $newAddress;
           //Update Phone Number
        $newPhoneNumber = $_POST['NumberPhone'];
        $query = "UPDATE clients SET PhoneNumber ='$newPhoneNumber' WHERE Id = $id";
        mysqli_query($con, $query);
        $_SESSION['PhoneNumber'] =  $newPhoneNumber;
    }


       
    


    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Profile.css">
<link rel="stylesheet" href="nav.css">
    <title>Profile</title>

</head>
<body>
<header class="header">

         
<a class="logo" href="home.php">Gravey</a>
<nav class="navbar">
     
      <a href="home.php">Home</a>
      <a href="support.php">Support</a>


    <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg></a>
<span style=" color:white ;background-color: black; border-radius:50%; padding:0 6px; font-size:14px; font-weight: 600;">
<?php
if(isset($_SESSION['id'])){
$user_id = $_SESSION['id'];
$totaleQuery = "SELECT SUM(quantity) FROM panier WHERE Id = $user_id;";
$result = mysqli_query($con,$totaleQuery);
if ($result) {
$row = mysqli_fetch_assoc($result);
if (!empty($row['SUM(quantity)'])) {
$totalQuantity = $row['SUM(quantity)'];
echo $totalQuantity; 
}
else{
echo"0";
} 

}
}
?>
</span>
 
  


</nav>
<button  class="mobile-menu-button">&#9776;</button>  
</header>

  
  <div id="profile-container">

  <section class="section-info">
  <form action="" method="post">
                    
                    <h1 class="title">PROFILE</h1>
                    <div style="display: flex;  justify-content: space-between;">
                   <div class="form-group">
                       <input type="text" name="username" id="username" class="form-control" autocomplete="off" placeholder="Nom d'utilisateur" value="<?php  echo $_SESSION['username']; ?>">
                   </div>

                   <div class="form-group">
                       <input type="text" name="email" id="email" class="form-control"  autocomplete="off" placeholder="Email"  value="<?php  echo $_SESSION['email']; ?>">
                   </div>
                   </div>
                   <div style="display: flex;  justify-content: space-between;">
                 
                   </div>
                   <div style="display: flex;  justify-content: space-between;">
                        <span class="form-group">
                       <input type="text" name="NumberPhone" id="numphone" class="form-control" autocomplete="off" placeholder="Number Phone"  value="<?php  echo $_SESSION['PhoneNumber']; ?>">
                   </span>
                   <span class="form-group">
                       <input type="text" name="Address" id="address" class="form-control" autocomplete="off"  placeholder="Address" value="<?php  echo $_SESSION['Address']; ?>">
                   </span>
                   </div>
                  <div>
                     <div class="form-group">
                       <button id="btnModifier" type="submit" name="submit">Modifier</button>
                     </div >
                  </form>

                    <span>
                         <span id="logout_para">Appuyez ici pour vous déconnecter</span><a id="logout-btn" href="logout.php">Log out</a>
                    </span>
                  </div>
                  
   
    </section>

    <section class="section-history">

    <h1 class="title-profile">HISTORY</h1>
   
  </section>
  </div>
  <script src="script.js"></script>
</body>

</html>

<?php
}
?>
