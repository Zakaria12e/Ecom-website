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



    if (isset($_POST['save'])) {
        $newname = $_POST['name'];
        $newemail = $_POST['email'];

        $query = "UPDATE clients SET Username='$newname', Email='$newemail' WHERE Id = $id";
        $result = mysqli_query($con, $query);
        $_SESSION['username'] = $newname;
        $_SESSION['email'] = $newemail;
    }

    if (isset($_POST['Add'])) {
        $newAddress = $_POST['Address'];
        $query = "UPDATE clients SET Address='$newAddress' WHERE Id = $id";
        mysqli_query($con, $query);
        $_SESSION['Address'] = $newAddress;
    }
    if (isset($_POST['AddPhoneNumber'])) {
        $newPhoneNumber = $_POST['PhoneNumber'];
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="Profile.css">
    <title>Profile</title>

</head>
<body>
    <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="images/gaming-pad-alt-1-svgrepo-com.svg" class="h-8" alt="Gravey Logo" />
            <span style="color: black;" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
        </a>
        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
            <li>
            <a id="profile" href="home.php" >Home</a>
            </li>
            <li>
                <a href="Products.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
            </li>
            <li>
                <a href="support.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Support</a>
            </li>
            <li>
            <li style="display: flex;">
                    <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg></a>
<div style=" color:ghostwhite ;background-color: blue; border-radius:50%; padding:0px 8px;">
<?php
require_once 'config.php';
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
    $totaleQuery = "SELECT SUM(quantity) FROM panier WHERE Id = $user_id;";
    $result = mysqli_query($con,$totaleQuery);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalQuantity = $row['SUM(quantity)'];
        echo $totalQuantity;
    }
 }
?>
</div>

</li>
<?php
echo'<a style="display: flex;" href="Profile.php" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>'.$_SESSION['username'].'</a>';
?>
               </li>
            
        </ul>
    </div>
    </nav>

  
  <div id="profile-container">

  <section class="section-info">
            <div class="info">
              
                <h1 class="title-profile"><?php echo "Welcom {$_SESSION['username']}"; ?></h1>
                <p><b>Email:</b> <?php echo $_SESSION['email']; ?></p>
                <p><b>Phone:</b> <?php echo $_SESSION['PhoneNumber']; ?></p> 
                <p><b>Address:</b> <?php echo $_SESSION['Address']; ?></p>
            </div>
        

        <h2  id="mod-info"><b>Modifier vos informations</b></h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" class="change" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" class="change" required><br><br>
        <input type="submit" value="Save" name="save">
    </form>
    
    <form method="post">
        <label for="name">Address:</label>
        <input type="text" name="Address" class="change" required>
        <input type="submit" value="Add" name="Add">
    </form><br>
    <form method="post">
        <label for="name">Phone Number:</label>
        <input type="text" name="PhoneNumber" class="change" required>
        <input type="submit" value="Add" name="AddPhoneNumber">
    </form><br>


    <div>
        <p id="logout_para">Appuyez ici pour vous déconnecter</p><a id="logout-btn" href="logout.php">Log out</a>
    </div>
   
    </section>

    <section class="section-history">

    <h1 class="title-profile">HISTORY</h1>
   
  </section>
  </div>
</body>

</html>

<?php
}
?>
