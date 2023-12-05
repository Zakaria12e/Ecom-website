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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="Products.css">
    <title>Products</title>

</head>

    <body>
      

          

          <section id="CPUS">
            <h2 class="title">CPUs INTEL & AMD</h2>
    
<div class="product-category">
<?php
require_once 'config.php';
$ProductQuery = "SELECT product_name, price, image, description FROM products WHERE category = 'CPU'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
require_once 'config.php';
$ProductQuery = "SELECT product_name, price, image, description FROM products WHERE category = 'GPU'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
require_once 'config.php';
$ProductQuery = "SELECT product_name, price, image, description FROM products WHERE category = 'MOTHER_BOARD'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
require_once 'config.php';
$ProductQuery = "SELECT product_name, price, image, description FROM products WHERE category = 'RAM'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
require_once 'config.php';
$ProductQuery = "SELECT product_name, price, image, description FROM products WHERE category = 'ROM'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
require_once 'config.php';
$ProductQuery = "SELECT product_name, price, image, description FROM products WHERE category = 'POWER_SUPPLY'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
require_once 'config.php';
$ProductQuery = "SELECT product_name, price, image, description FROM products WHERE category = 'CASE'";
$result = mysqli_query($con,$ProductQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="product-card">';
        echo '<img class="pimg" src="' . $row["image"] . '" alt="' . $row["product_name"] . '">';
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
   
   <script src="script.js"></script>
   
</body>
</html>
<?php
}
?>