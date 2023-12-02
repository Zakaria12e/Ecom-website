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
        <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
              <a  href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <img  src="images/gaming-pad-alt-1-svgrepo-com.svg" class="h-8" alt="Gravey Logo">
                  <span style="color: black;" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
              </a>
                <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                  <li>
                    <a href="home.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                  </li>
                  <li>
                    <div class="dropdown">
                      <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
                      <div class="dropdown-content">
                        <a href="#CPUS" >CPUs</a>
                        <a href="#GPUS" >GPUs</a>
                        <a href="#MD"   >Motherboards</a>
                        <a href="#RAM"  >RAM</a>
                        <a href="#ROM"  >ROM</a>
                        <a href="#PS"   >Power Supplies</a>
                        <a href="#CASES">Cases</a>
                      </div>
                      
                     </div>
                  </li>
                  <li>
                    <a href="support.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Support</a>
                  </li>
                  <li>
                    <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
</svg></a>
                  </li>
                  <li>
                    
                  <?php
echo'<a style="display: flex;" href="Profile.php" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>'.$_SESSION['username'].'</a>';
?>
                </li>
                </ul>
            </div>
          </nav>
          
          <section id="CPUS">
            <h2 class="title">CPUs INTEL & AMD</h2>
    
<div class="product-category">

     <div class="product-card">
     <img class="pimg" src="images/cpu1.jpg" alt="Intel i7 13900k">
    <div class="product-info">
        <h3>Intel i7 13900k</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=Intel%20i7%2013900k">View Details</a>
            <span>Price: <span style="color: green;">$450</span></span>
        </div>
    </div>
 </div>

 <div class="product-card">
    <img class="pimg" src="images/cpu2.jpg" alt="Intel i9 12900k">
    <div class="product-info">
        <h3>Intel i9 12900k</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=Intel%20i9%2012900k">View Details</a>
            <span>Price: <span style="color: green;">$600</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/cpu3.jpg" alt="AMD rayzen 7 9000x">
    <div class="product-info">
        <h3>AMD rayzen 7 9000x</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=AMD%20rayzen%207%209000x">View Details</a>
            <span>Price: <span style="color: green;">500$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/cpu4.jpg" alt="AMD rayzen 9 9000x">
    <div class="product-info">
        <h3>AMD rayzen 9 9000x</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=AMD%20rayzen%209%209000x">View Details</a>
            <span>Price: <span style="color: green;">570$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/cpu5.jpg" alt="AMD rayzen 5 5600G">
    <div class="product-info">
        <h3>AMD rayzen 5 5600G</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=AMD%20rayzen%205%205600G">View Details</a>
            <span>Price: <span style="color: green;">270$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/cpu6.jpg" alt="Intel i3 12100F">
    <div class="product-info">
        <h3>Intel i3 12100F</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=Intel%20i3%2012100F">View Details</a>
            <span>Price: <span style="color: green;">190$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/CPU7.jpg" alt="Intel i5 12600K">
    <div class="product-info">
        <h3>Intel i5 12600K</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=Intel%20i5%2012600K">View Details</a>
            <span>Price: <span style="color: green;">190$</span></span>
        </div>
    </div>
</div>

</div>
                

        </section>
                                    <!-- GPUs section  -->
        <section id="GPUS">
          <h2 class="title">GPUs NVIDIA & AMD</h2>
  
          <div class="product-category">
          <div class="product-category">
    <div class="product-card">
        <img class="pimg" src="images/RTX2080.jpg" alt="RTX 2080Ti">
        <div class="product-info">
            <h3>NVIDIA GeForce RTX 2080 Ti White Edition</h3>
            <p>Upgrade your computing power with our cutting-edge CPUs.</p>
            <div style="display: flex; justify-content: space-between;">
                <a class="vd" href="details.php?name=NVIDIA%20GeForce%20RTX%202080%20Ti%20White%20Edition">View Details</a>
                <span>Price: <span style="color: green;">290$</span></span>
            </div>
        </div>
    </div>

    <div class="product-card">
        <img class="pimg" src="images/RTX3090TI.jpg" alt="RTX 3090Ti">
        <div class="product-info">
            <h3>NVIDIA GeForce RTX 3090 Ti</h3>
            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
            <div style="display: flex; justify-content: space-between;">
                <a class="vd" href="details.php?name=NVIDIA%20GeForce%20RTX%203090%20Ti">View Details</a>
                <span>Price: <span style="color: green;">500$</span></span>
            </div>
        </div>
    </div>

    <div class="product-card">
        <img class="pimg" src="images/gpu3.jpg" alt="RX 7900 XTX">
        <div class="product-info">
            <h3>AMD RADEON RX 7900 XTX</h3>
            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
            <div style="display: flex; justify-content: space-between;">
                <a class="vd" href="details.php?name=AMD%20RADEON%20RX%207900%20XTX">View Details</a>
                <span>Price: <span style="color: green;">500$</span></span>
            </div>
        </div>
    </div>

    <div class="product-card">
        <img class="pimg" src="images/GPURX6000XT.jpg" alt="RX 6000 XT">
        <div class="product-info">
            <h3>AMD RADEON RX 6000 XT</h3>
            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
            <div style="display: flex; justify-content: space-between;">
                <a class="vd" href="details.php?name=AMD%20RADEON%20RX%206000%20XT">View Details</a>
                <span>Price: <span style="color: green;">440$</span></span>
            </div>
        </div>
    </div>

    <div class="product-card">
        <img class="pimg" src="images/GPU34090.jpg" alt="RTX 4090">
        <div class="product-info">
            <h3>NVIDIA GeForce RTX 4090</h3>
            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
            <div style="display: flex; justify-content: space-between;">
                <a class="vd" href="details.php?name=NVIDIA%20GeForce%20RTX%204090">View Details</a>
                <span>Price: <span style="color: green;">600$</span></span>
            </div>
        </div>
    </div>

    <div class="product-card">
        <img class="pimg" src="images/RX6800XT.jpg" alt="RX 6800 XT">
        <div class="product-info">
            <h3>AMD RADEON RX 6800 XT</h3>
            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
            <div style="display: flex; justify-content: space-between;">
                <a class="vd" href="details.php?name=AMD%20RADEON%20RX%206800%20XT">View Details</a>
                <span>Price: <span style="color: green;">490$</span></span>
            </div>
        </div>
    </div>

    <div class="product-card">
        <img class="pimg" src="images/GPU4070.jpg" alt="RTX 4070">
        <div class="product-info">
            <h3>NVIDIA GeForce RTX 4070</h3>
            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
            <div style="display: flex; justify-content: space-between;">
                <a class="vd" href="details.php?name=NVIDIA%20GeForce%20RTX%204070">View Details</a>
                <span>Price: <span style="color: green;">600$</span></span>
            </div>
        </div>
    </div>
</div>

         
          </div>
      </section>
                                <!-- MotherBoards section  -->
           <section id="MD">
             <h2 class="title">MotherBoards</h2>
                          
          <div class="product-category">
          <div class="product-card">
    <img class="pimg" src="images/msi_motherboard1.jpeg" alt="MSI B5500 GAMING PLUS">
    <div class="product-info">
        <h3>MSI B5500 GAMING PLUS</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=MSI%20B5500%20GAMING%20PLUS">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/msi_motherboard2.jpeg" alt="MSI B350M GAMING PLUS">
    <div class="product-info">
        <h3>MSI B350M GAMING PLUS</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=MSI%20B350M%20GAMING%20PLUS">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/msi_motherboard3.jpeg" alt="MSI MPG X570 GAMING EDGE">
    <div class="product-info">
        <h3>MSI MPG X570 GAMING EDGE</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=MSI%20MPG%20X570%20GAMING%20EDGE">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/gigabyte_motherboard4.jpg" alt="GIGABYTE B560M DS3H">
    <div class="product-info">
        <h3>GIGABYTE B560M DS3H</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=GIGABYTE%20B560M%20DS3H">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/gigabyte_motherboard5.jpg" alt="GIGABYTE X670 GAMING X AX">
    <div class="product-info">
        <h3>GIGABYTE X670 GAMING X AX</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=GIGABYTE%20X670%20GAMING%20X%20AX">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/asus_motherboard6.jpg" alt="ASUS ROG STRIX Z390-E GAMING">
    <div class="product-info">
        <h3>ASUS ROG STRIX Z390-E GAMING</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=ASUS%20ROG%20STRIX%20Z390-E%20GAMING">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/asus_motherboard7.jpg" alt="ASUS PRIME Z790-A WIFI">
    <div class="product-info">
        <h3>ASUS PRIME Z790-A WIFI</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=ASUS%20PRIME%20Z790-A%20WIFI">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

                                 
                        
</div>
</section>

                                  <!-- RAM section  -->
           <section id="RAM">
            <h2 class="title">RAM</h2>
                         
         <div class="product-category">
         <div class="product-card">
    <img class="pimg" src="images/ram1_corsair-vengeance-rgb-ddr5-32go.jpg" alt="CORSAIR VENGEANCE RGB DDR5 32GB">
    <div class="product-info">
        <h3>CORSAIR VENGEANCE RGB DDR5 32GB</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=CORSAIR%20VENGEANCE%20RGB%20DDR5%2032GB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/ram2_kingston-fury-beast-32gb-2x16gb-ddr5-6000-mhz.jpg" alt="KINGSTON FURY BEAST DDR5 16x2 GB">
    <div class="product-info">
        <h3>KINGSTON FURY BEAST DDR5 16x2 GB</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=KINGSTON%20FURY%20BEAST%20DDR5%2016x2%20GB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/ram3_corsair-vengeance-rgb-ddr5-6000-32gb.jpg" alt="CORSAIR VENGEANCE RGB DDR5 32GB WHITE EDITION">
    <div class="product-info">
        <h3>CORSAIR VENGEANCE RGB DDR5 32GB WHITE EDITION</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=CORSAIR%20VENGEANCE%20RGB%20DDR5%2032GB%20WHITE%20EDITION">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/ram4_team t-force delta rgb 32gb ddr5.jpg" alt="T-FORCE DELTA RGB DDR5 32GB">
    <div class="product-info">
        <h3>T-FORCE DELTA RGB DDR5 32GB</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=T-FORCE%20DELTA%20RGB%20DDR5%2032GB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/ram5_kingston-ddr5-ram-kvr56u46bs6k2-16-5600-mhz.jpg" alt="KINGSTON kvr56u46bs6k2 DDR5 16GB">
    <div class="product-info">
        <h3>KINGSTON kvr56u46bs6k2 DDR5 16GB</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=KINGSTON%20kvr56u46bs6k2%20DDR5%2016GB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

         </div>
                                    
</section>

                                <!-- ROM section  -->
           <section id="ROM">
            <h2 class="title">ROM</h2>
                         
         <div class="product-category">
              
         <div class="product-card">
    <img class="pimg" src="images/rom1_MSI SPATIUM M371 NVMe M.2 1TB.jpg" alt="MSI SPATIUM M371 NVMe M.2 1TB">
    <div class="product-info">
        <h3>MSI SPATIUM M371 NVMe M.2 1TB</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=MSI%20SPATIUM%20M371%20NVMe%20M.2%201TB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/rom2_Gigabyte SSD M.2 256GO 2290 PCIe x2 NVMe.jpg" alt="Gigabyte SSD M.2 256GO 2290 PCIe x2 NVMe">
    <div class="product-info">
        <h3>GIGABYTE SSD M.2 256GO 2290 PCIe x2 NVMe</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=GIGABYTE%20SSD%20M.2%20256GO%202290%20PCIe%20x2%20NVMe">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/rom3_emtec-x250-power-plus-ssd-256-gb.jpg" alt="EMTEC x250 POWER PLUS SSD 256GB">
    <div class="product-info">
        <h3>EMTEC x250 POWER PLUS SSD 256GB</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=EMTEC%20x250%20POWER%20PLUS%20SSD%20256GB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/rom4_PNY CS1030 M.2 PCIe NVMe 500GB.jpg" alt="PNY CS1030 M.2 PCIe NVMe 500GB">
    <div class="product-info">
        <h3>PNY CS1030 M.2 PCIe NVMe 500GB</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=PNY%20CS1030%20M.2%20PCIe%20NVMe%20500GB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/rom5T-FORCE-DELTA-500GB-RGB.jpg" alt="T-FORCE-DELTA-500GB-RGB">
    <div class="product-info">
        <h3>T-FORCE-DELTA-500GB-RGB</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=T-FORCE-DELTA-500GB-RGB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

         </div>
                                    
</section>

                       <!-- POWER SUPPLYs section  -->
           <section id="PS">
            <h2 class="title">POWER SUPPLYs</h2>
                         
         <div class="product-category">
              
         <div class="product-card">
    <img class="pimg" src="images/pow1_Cooler Master V1200 Platinum.jpg" alt="Cooler Master V1200 Platinum">
    <div class="product-info">
        <h3>COOLER MASTER V1200 PLATINUM</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=COOLER%20MASTER%20V1200%20PLATINUM">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/pow2_ASUS ROG STRIX G Series Semi-Fanless Modular 80Plus Gold.jpg" alt="ASUS ROG STRIX G Series Semi-Fanless Modular 80Plus Gold">
    <div class="product-info">
        <h3>ASUS ROG STRIX G Series Modular 80Plus GOLD</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=ASUS%20ROG%20STRIX%20G%20Series%20Modular%2080Plus%20GOLD">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/pow3_ASUS ROG Thor 1200W 80PLUS Platinum.webp" alt="ASUS ROG Thor 1200W 80PLUS Platinum">
    <div class="product-info">
        <h3>ASUS ROG THOR 1200W 80PLUS PLATINUM</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=ASUS%20ROG%20THOR%201200W%2080PLUS%20PLATINUM">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/pow4_GAMEMAX 1050W ATX 3.0 & PCIE 5.0.jpg" alt="GAMEMAX 1050W ATX 3.0 & PCIE 5.0">
    <div class="product-info">
        <h3>GAMEMAX 1050W ATX 3.0 PCIE 5.0</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=GAMEMAX%201050W%20ATX%203.0%20PCIE%205.0">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/pow5_EVGA 750 BP, 80+ BRONZE 750W, 100-BP-0750-K1.jpg" alt="EVGA 750 BP, 80+ BRONZE 750W, 100-BP-0750-K1">
    <div class="product-info">
        <h3>EVGA 750 BP 80+ BRONZE 750W</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=EVGA%20750%20BP%2080%20BRONZE%20750W">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/pow6_AEROCOOL LUX 750W PSU, 80 PLUS BRONZE.jpg" alt="AEROCOOL LUX 750W PSU, 80 PLUS BRONZE">
    <div class="product-info">
        <h3>AEROCOOL LUX 750W PSU, 80 PLUS BRONZE</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=AEROCOOL%20LUX%20750W%20PSU,%2080%20PLUS%20BRONZE">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

        </div>
                               
</section>

                                                    <!-- CASEs section  -->
<section id="CASES">
     <h2 class="title">CASEs</h2>
                    
       <div class="product-category">
             
       <div class="product-card">
    <img class="pimg" src="images/case1_ASUS TUF Gaming GT501 White Edition.jpg" alt="ASUS TUF Gaming GT501 White Edition">
    <div class="product-info">
        <h3>ASUS TUF Gaming GT501 White Edition</h3>
        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=ASUS%20TUF%20Gaming%20GT501%20White%20Edition">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/case2_ASUS ROG Strix Helios Tempered Glass.jpg" alt="ASUS ROG Strix Helios Tempered Glass">
    <div class="product-info">
        <h3>ASUS ROG STRIX HELIOS TEMPERED GLASS</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=ASUS%20ROG%20STRIX%20HELIOS%20TEMPERED%20GLASS">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/case3_Cooler Master MASTERBOX MB511 RGB.jpg" alt="Cooler Master MASTERBOX MB511 RGB">
    <div class="product-info">
        <h3>COOLER MASTER MASTERBOX MB511 RGB</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=COOLER%20MASTER%20MASTERBOX%20MB511%20RGB">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/case4_CORSAIR iCUE 5000T RGB PC Case Black.jpg" alt="CORSAIR iCUE 5000T RGB PC Case Black">
    <div class="product-info">
        <h3>CORSAIR ICUE 5000T RGB PC Case BlACK</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=CORSAIR%20ICUE%205000T%20RGB%20PC%20Case%20BlACK">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/case5_CORSAIR 275R Airflow Tempered Glass.png" alt="CORSAIR 275R Airflow Tempered Glass">
    <div class="product-info">
        <h3>CORSAIR 275R AIRFLOW TEMPERED GLASS</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=CORSAIR%20275R%20AIRFLOW%20TEMPERED%20GLASS">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>

<div class="product-card">
    <img class="pimg" src="images/case6_Mars Gaming MC-X2 Zwart.jpg" alt="Mars Gaming MC-X2 Zwart">
    <div class="product-info">
        <h3>MARS GAMING MC-X2 ZWART</h3>
        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
        <div style="display: flex; justify-content: space-between;">
            <a class="vd" href="details.php?name=MARS%20GAMING%20MC-X2%20ZWART">View Details</a>
            <span>Price: <span style="color: green;">600$</span></span>
        </div>
    </div>
</div>
                          
          
       </div>
                              
</section>
   
   <script src="script.js"></script>
   <footer>
    <a  href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <span style="color: rgb(70, 67, 67); margin-left: 50px;" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
    </a>
    <p style="font-family: 'Trebuchet MS'; margin-left: 50px; color: black;">&copy; 2023 All rights reserved</p>
        <div class="social-links">
            <a id="fblink" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
            <a id="maillink" href="mailto:contact@example.com" target="_blank"><i class="fas fa-envelope"></i></a>
            <a id="gitlink" href="https://github.com/Zakaria12e" target="_blank"><i class="fab fa-github"></i></a>
        </div>
   </footer>
</body>
</html>
<?php
}
?>