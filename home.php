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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="Products.css">
  <link rel="stylesheet" href="nav.css">
  <title>Gravey</title>
</head>
<body>
    
<header class="header">

         
              <a class="logo" href="home.php">Gravey</a>
              <nav class="navbar">
              <a href="home.php">Home</a>
                 
                    <div class="dropdown">
                      <a href="#">Products</a>
                      <div class="dropdown-content">
                        <a href="#CPUS" >CPUs</a>
                        <a href="#GPUS" >GPUs</a>
                        <a href="#MD"   >Motherboards</a>
                        <a href="#RAM"  >RAM</a>
                        <a href="#ROM"  >ROM</a>
                        <a href="#PS"   >Power Supplies</a>
                        <a href="#CASES">Cases</a>
                        <a href="#MONITORS">Monitors</a>
                      </div>
                    </div>
                  
                    <a href="support.php">Support</a>
              
              
                  <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg></a>
<span style=" color:white ;background-color: black; border-radius:50%; padding:0 6px; font-size:14px; font-weight: 600;">
<?php
require_once 'config.php';
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
<a style="margin-top: 10px;" href="Profile.php"> <?php echo $_SESSION['username'];?></a>
               
                 
    </nav>
    </header>

    
<section class="home">

<div class="content">

        <h1 class="title-home">Welcome to Gravey Your Hardware Store</h1>
        <p>Explore a wide range of CPUs, GPUs, RAMs, SSDs, and more.</p>
        <a href="#CPUS" id="btn-to-products">Shop Now</a>
</div>

</section>

    <main>
  </div>
    <div class="search-container">
              <input type="text" id="searchInput" placeholder="Search..." required>
        <button id="search_btn" onclick="searchProducts()">Search</button>
         </div>
    <section id="CPUS">
            <h2 class="title">CPUs INTEL & AMD</h2>
    
<div class="product-category">
<?php
$ProductQuery = "SELECT product_name, price, image FROM products WHERE category = 'CPU'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h3>' . $row["product_name"] . '</h3>';
        echo '<p>Upgrade your computing power with our cutting-edge CPUs</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">View Details</a>';
        echo '<span>Price: <span style="color: green;">$' . $row["price"] . '</span></span>';
        echo '</div></div></div>';
    }
}
?>

</div>
                

        </section>
                                    <!-- GPUs section  -->
        <section id="GPUS">
          <h2 class="title">GPUs NVIDIA & AMD</h2>
  
          <div class="product-category">
          
          <?php

$ProductQuery = "SELECT product_name, price, image FROM products WHERE category = 'GPU'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h3>' . $row["product_name"] . '</h3>';
        echo '<p>Upgrade your graphics performance with our state-of-the-art GPUs</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">View Details</a>';
        echo '<span>Price: <span style="color: green;">$' . $row["price"] . '</span></span>';
        echo '</div></div></div>';
    }
}
?>
         
          </div>
      </section>
                                <!-- MotherBoards section  -->
           <section id="MD">
             <h2 class="title">MotherBoards</h2>
                          
          <div class="product-category">
         
          <?php

$ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'MOTHER_BOARD'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h3>' . $row["product_name"] . '</h3>';
        echo '<p>experience superior connectivity and performance with our cutting-edge motherboards</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">View Details</a>';
        echo '<span>Price: <span style="color: green;">$' . $row["price"] . '</span></span>';
        echo '</div></div></div>';
    }
}
?>           
                        
         </div>
         </section>

                                  <!-- RAM section  -->
           <section id="RAM">
            <h2 class="title">RAM</h2>
                         
         <div class="product-category">
         <?php

$ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'RAM'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h3>' . $row["product_name"] . '</h3>';
        echo '<p>enhance multitasking capabilities with high-speed RAM</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">View Details</a>';
        echo '<span>Price: <span style="color: green;">$' . $row["price"] . '</span></span>';
        echo '</div></div></div>';
    }
}
?>
         </div>
                                    
</section>

                                <!-- ROM section  -->
           <section id="ROM">
            <h2 class="title">ROM</h2>
                         
         <div class="product-category">
              
         <?php

$ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'ROM'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h3>' . $row["product_name"] . '</h3>';
        echo '<p>store and access data seamlessly with lightning-fast ROM</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">View Details</a>';
        echo '<span>Price: <span style="color: green;">$' . $row["price"] . '</span></span>';
        echo '</div></div></div>';
    }
}
?>

         </div>
                                    
</section>

                       <!-- POWER SUPPLYs section  -->
           <section id="PS">
            <h2 class="title">POWER SUPPLYs</h2>
                         
         <div class="product-category">
         <?php

$ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'POWER_SUPPLY'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h3>' . $row["product_name"] . '</h3>';
        echo '<p>ensure stable power delivery with our advanced power supply units</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">View Details</a>';
        echo '<span>Price: <span style="color: green;">$' . $row["price"] . '</span></span>';
        echo '</div></div></div>';
    }
}
?>
          
        </div>
                               
</section>

                                                    <!-- CASEs section  -->
<section id="CASES">
     <h2 class="title">CASEs</h2>
                    
       <div class="product-category">
             
       <?php

$ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'CASE'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h3>' . $row["product_name"] . '</h3>';
        echo '<p>protect and showcase your components with a sleek and durable case</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">View Details</a>';
        echo '<span>Price: <span style="color: green;">$' . $row["price"] . '</span></span>';
        echo '</div></div></div>';
    }
}
?>
    </div>
                              
</section> 
                                      <!-- MONITORS section  -->
     <h2 class="title">MONITORS</h2>
     <section id="MONITORS">
     <div class="product-category">
          
          <?php

$ProductQuery = "SELECT product_name, price, image FROM products WHERE category = 'Monitors'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
        echo '<div class="product-info">';
        echo '<h3>' . $row["product_name"] . '</h3>';
        echo '<p>Upgrade your graphics performance with our state-of-the-art GPUs</p>';
        echo '<div style="display: flex; justify-content: space-between;">';
        echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">View Details</a>';
        echo '<span>Price: <span style="color: green;">$' . $row["price"] . '</span></span>';
        echo '</div></div></div>';
    }
}
?>
         
          </div>
    </section>

    </main>
    <hr style=" margin: 100px 140px">
    <div><?php include 'footer.php'; ?></div>
    <script src="script.js"></script>
</body>
</html>
<?php
}
?>