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
                    
                    <a id="profile" href="profile.php" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg></a>
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
                        <a class="vd" onclick="showDetails1()">View Details</a>
                        <span>Price: <span style="color: green;">450$</span></span>
                    </div>
                </div>
            </div>
        
            <div class="product-details" id="productDetails1">
    <!-- details -->
    <h2>Product Details</h2>
    <p>Intel i7 13900k CPU</p>

    <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="Intel i7 13900k CPU">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
    </form>
    <button class="btnhide" onclick="hideDetails1()">Close</button>
</div>

                <div class="product-card">
                    <img class="pimg" src="images/cpu2.jpg" alt="Intel i9 12900k">
                    <div class="product-info">
                        <h3>Intel i9 12900k</h3>
                        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
                        <div style="display: flex; justify-content: space-between;">
                            <a class="vd" onclick="showDetails2()">View Details</a>
                            <span>Price: <span style="color: green;">600$</span></span>
                        </div>
                    </div>
                </div>
                <div class="product-details" id="productDetails2">
                  <!-- details  -->
                  <h2>Product Details</h2>
                  <p>Intel i9 12900k</p>
     <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="Intel i9 12900k CPU">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
    </form>

                  <button class="btnhide" onclick="hideDetails2()">Close</button>
              </div>
    
                <div class="product-card">
                    <img class="pimg" src="images/cpu3.jpg" alt="AMD rayzen 7 9000x">
                    <div class="product-info">
                        <h3>AMD rayzen 7 9000x</h3>
                        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
                        <div style="display: flex; justify-content: space-between;">
                         <a class="vd" onclick="showDetails3()">View Details</a>
                         <span>Price: <span style="color: green;">500$</span></span>
                        </div>
                       
                    </div>
                </div>
                <div class="product-details" id="productDetails3">
                  <!-- details  -->
                  <h2>Product Details</h2>
                  <p>AMD rayzen 7 9000x</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="AMD rayzen 7 9000x">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
                
                  <button class="btnhide" onclick="hideDetails3()">Close</button>
              </div>
    
                <div class="product-card">
                    <img class="pimg" src="images/cpu4.jpg" alt="AMD rayzen 9 9000x">
                    <div class="product-info">
                        <h3>AMD rayzen 9 9000x</h3>
                        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
                        <div style="display: flex; justify-content: space-between;">
                           <a class="vd"  onclick="showDetails4()">View Details</a>
                           <span>Price: <span style="color: green;">570$</span></span>
                        </div>
                       
                    </div>
                </div>
                <div class="product-details" id="productDetails4">
                  <!-- details  -->
                  <h2>Product Details</h2>
                  <p>AMD rayzen 9 9000x</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="AMD rayzen 9 9000x">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
                  <button class="btnhide" onclick="hideDetails4()">Close</button>
              </div>

                <div class="product-card">
                    <img class="pimg" src="images/cpu5.jpg" alt="AMD rayzen 5 5600G">
                    <div class="product-info">
                        <h3>AMD rayzen 5 5600G</h3>
                        <p>Upgrade your computing power with our cutting-edge CPUs.</p>
                        <div style="display: flex; justify-content: space-between;">
                           <a class="vd"  onclick="showDetails5()">View Details</a>
                           <span>Price: <span style="color: green;">270$</span></span>
                        </div>
                       
                    </div>
                </div>
            <div class="product-details" id="productDetails5">
                  <!-- details  -->
                  <h2>Product Details</h2>
                  <p>AMD rayzen 5 5600G</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="AMD rayzen 5 5600G">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
                  <button class="btnhide" onclick="hideDetails5()">Close</button>
              </div>
                
               <div class="product-card">

                  <img class="pimg" src="images/cpu6.jpg" alt="Intel i3 12100F">

                   <div class="product-info">
                      <h3>Intel i3 12100F</h3>
                      <p>Upgrade your computing power with our cutting-edge CPUs.</p>
                      <div style="display: flex; justify-content: space-between;">
                       <a class="vd"  onclick="showDetails6()">View Details</a>
                       <span>Price: <span style="color: green;">190$</span></span>
                      </div>
                     
                   </div>
              </div>

              <div class="product-details" id="productDetails6">
                <!-- details  -->
                <h2>Product Details</h2>
                <p>Intel i3 12100F</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="Intel i3 12100F">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
              
                <button class="btnhide" onclick="hideDetails6()">Close</button>
            </div>

              <div class="product-card">
                <img class="pimg" src="images/CPU7.jpg" alt="Intel i5 12600K">
                 <div class="product-info">
                    <h3>Intel i5 12600K</h3>
                    <p>Upgrade your computing power with our cutting-edge CPUs.</p>
                    <div style="display: flex; justify-content: space-between;">
                      <a class="vd" onclick="showDetails7()">View Details</a>
                      <span>Price: <span style="color: green;">190$</span></span>
                    </div>
                  
                 </div>
            </div>
            <div class="product-details" id="productDetails7">
              <!-- details  -->
              <h2>Product Details</h2>
              <p>Intel i5 12600K</p>
            
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="Intel i5 12600K">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
              <button class="btnhide" onclick="hideDetails7()">Close</button>
            </div>

           </div>

        </section>
                                    <!-- GPUs section  -->
        <section id="GPUS">
          <h2 class="title">GPUs NVIDIA & AMD</h2>
  
          <div class="product-category">
              <div class="product-card">
                  <img class="pimg" src="images/RTX2080.jpg" alt="RTX 2080Ti">
                  <div class="product-info">
                      <h3>NVIDIA GeForce RTX 2080 Ti White Edition</h3>
                      <p>Upgrade your computing power with our cutting-edge CPUs.</p>
                      <div style="display: flex; justify-content: space-between;">
                        <a class="vd"  onclick="showDetails8()">View Details</a>
                        <span>Price: <span style="color: green;">290$</span></span>
                      </div>
                    

                  </div>
              </div>
              <div class="product-details" id="productDetails8">
                <!-- details  -->
                <h2>Product Details</h>
                <p>NVIDIA GeForce RTX 2080 Ti White Edition</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="NVIDIA GeForce RTX 2080 Ti White Edition">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
            
                <button class="btnhide" onclick="hideDetails8()">Close</button>
            </div>
  
              <div class="product-card">
                  <img class="pimg" src="images/RTX3090TI.jpg" alt="RTX 3090Ti">
                  <div class="product-info">
                      <h3>NVIDIA GeForce RTX 3090 Ti</h3>
                      <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                      <div style="display: flex; justify-content: space-between;">
                       <a class="vd"  onclick="showDetails9()">View Details</a>
                       <span>Price: <span style="color: green;">500$</span></span>
                      </div>
                     
                  </div>
              </div>
              <div class="product-details" id="productDetails9">
                <!-- details  -->
                <h2>Product Details</h2>
                <p>NVIDIA GeForce RTX 3090 Ti</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="NVIDIA GeForce RTX 3090 Ti">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
              
                <button class="btnhide" onclick="hideDetails9()">Close</button>
            </div>
  
              <div class="product-card">
                  <img class="pimg" src="images/gpu3.jpg" alt="RX 7900 XTX">
                  <div class="product-info">
                      <h3>AMD RADEON RX 7900 XTX</h3>
                      <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                      <div style="display: flex; justify-content: space-between;">
                       <a class="vd"  onclick="showDetails10()">View Details</a>
                       <span>Price: <span style="color: green;">500$</span></span>
                      </div>
                  </div>
              </div>
              <div class="product-details" id="productDetails10">
                <!-- details  -->
                <h2>Product Details</h2>
                <p>AMD RADEON RX 7900 XTX</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="AMD RADEON RX 7900 XTX">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
               
                <button class="btnhide" onclick="hideDetails10()">Close</button>
            </div>

              <div  class="product-card">
                  <img class="pimg" src="images/GPURX6000XT.jpg" alt="RX 6000 XT">
                  <div class="product-info">
                      <h3>AMD RADEON RX 6000 XT</h3>
                      <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                      <div style="display: flex; justify-content: space-between;">
                      <a class="vd"  onclick="showDetails11()">View Details</a>
                      <span>Price: <span style="color: green;">440$</span></span>
                      </div>
                  </div>
              </div>
              <div class="product-details" id="productDetails11">
                <!-- details  -->
                <h2>Product Details</h2>
                <p>AMD RADEON RX 6000 XT</p>
                
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="AMD RADEON RX 6000 XT">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
                <button class="btnhide" onclick="hideDetails11()">Close</button>
            </div>

              <div class="product-card">
                  <img class="pimg" src="images/GPU34090.jpg" alt="RTX 4090">
                  <div class="product-info">
                      <h3>NVIDIA GeForce RTX 4090</h3>
                      <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                      <div style="display: flex; justify-content: space-between;">
                       <a class="vd"  onclick="showDetails12()">View Details</a>
                       <span>Price: <span style="color: green;">600$</span></span>
                      </div>
                     
                  </div>
              </div>
              <div class="product-details" id="productDetails12">
                <!-- details  -->
                <h2>Product Details</h2>
                <p>NVIDIA GeForce RTX 4090</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="NVIDIA GeForce RTX 4090">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
              
                <button class="btnhide" onclick="hideDetails12()">Close</button>
            </div>

              <div class="product-card">
                <img class="pimg" src="images/RX6800XT.jpg" alt="RX 6800 XT">
                <div class="product-info">
                    <h3>AMD RADEON RX 6800 XT</h3>
                    <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                    <div style="display: flex; justify-content: space-between;">
                     <a class="vd"  onclick="showDetails13()">View Details</a>
                     <span>Price: <span style="color: green;">490$</span></span>
                    </div>
                   
                </div>
            </div>
            <div class="product-details" id="productDetails13">
              <!-- details  -->
              <h2>Product Details</h2>
              <p>AMD RADEON RX 6800 XT</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="AMD RADEON RX 6800 XT">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
            
              <button class="btnhide" onclick="hideDetails13()">Close</button>
          </div>

            <div class="product-card">
              <img class="pimg" src="images/GPU4070.jpg" alt="RTX 4070">
              <div class="product-info">
                  <h3>NVIDIA GeForce RTX 4070</h3>
                  <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                  <div style="display: flex; justify-content: space-between;">
                   <a class="vd"  onclick="showDetails14()">View Details</a>
                  <span>Price: <span style="color: green;">600$</span></span>
                  </div>
                 
              </div>
          </div>
          <div class="product-details" id="productDetails14">
            <!-- details  -->
            <h2>Product Details</h2>
            <p>NVIDIA GeForce RTX 4070</p>
         
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="NVIDIA GeForce RTX 4070">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
            <button class="btnhide" onclick="hideDetails14()">Close</button>
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
                       <a class="vd"  onclick="showDetails15()">View Details</a>
                       <span>Price: <span style="color: green;">600$</span></span>
                      </div>
                      
                   </div>
              </div>
                     <div class="product-details" id="productDetails15">
                           <!-- details  -->
                           <h2>Product Details</h2>
                           <p>MSI B5500 GAMING PLUS</p>
      <form method="POST" action="Panier.php">
        <input type="hidden" name="productName" value="MSI B5500 GAMING PLUS">
        <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
      </form>
                         
                           <button class="btnhide" onclick="hideDetails15()">Close</button>
                     </div>
                          
                      <div class="product-card">
                            <img class="pimg" src="images/msi_motherboard2.jpeg" alt="MSI B350M GAMING PLUS">
                            <div class="product-info">
                             <h3>MSI B350M GAMING PLUS</h3>
                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                             <div style="display: flex; justify-content: space-between;">
                              <a class="vd"  onclick="showDetails16()">View Details</a>
                              <span>Price: <span style="color: green;">600$</span></span>
                            </div>
                           
                           </div>
                     </div>
                                    <div class="product-details" id="productDetails16">
                                        <!-- details  -->
                                        <h2>Product Details</h2>
                                        <p>MSI B350M GAMING PLUS</p>
                                      
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="MSI B350M GAMING PLUS">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                        <button class="btnhide" onclick="hideDetails16()">Close</button>
                                    </div>
                          
                                      <div class="product-card">
                                          <img class="pimg" src="images/msi_motherboard3.jpeg" alt="MSI MPG X570 GAMING EDGE">
                                          <div class="product-info">
                                              <h3>MSI MPG X570 GAMING EDGE</h3>
                                       <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                       <div style="display: flex; justify-content: space-between;">
                                       <a class="vd"  onclick="showDetails17()">View Details</a>
                                       <span>Price: <span style="color: green;">600$</span></span>
                                      </div>
                                             
                                          </div>
                                      </div>
                                   <div class="product-details" id="productDetails17">
                                        <!-- details  -->
                                        <h2>Product Details</h2>
                                        <p>MSI MPG X570 GAMING EDGE</p>
                                       
                          <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="MSI MPG X570 GAMING EDGE">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                        <button class="btnhide" onclick="hideDetails17()">Close</button>
                                    </div>
                        
                                      <div  class="product-card">
                                          <img class="pimg" src="images/gigabyte_motherboard4.jpg" alt="GIGABYTE B560M DS3H">
                                          <div class="product-info">
                                              <h3>GIGABYTE B560M DS3H</h3>
                                      <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                      <div style="display: flex; justify-content: space-between;">
                                       <a class="vd"  onclick="showDetails18()">View Details</a>
                                       <span>Price: <span style="color: green;">600$</span></span>
                                      </div>
                                             
                                          </div>
                                      </div>
                                      <div class="product-details" id="productDetails18">
                                        <!-- details  -->
                                        <h2>Product Details</h2>
                                        <p>GIGABYTE B560M DS3H</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="GIGABYTE B560M DS3H">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                     
                                        <button class="btnhide" onclick="hideDetails18()">Close</button>
                                    </div>
                        
                                      <div class="product-card">
                                          <img class="pimg" src="images/gigabyte_motherboard5.jpg" alt="GIGABYTE X670 GAMING X AX">
                                          <div class="product-info">
                                              <h3>GIGABYTE X670 GAMING X AX</h3>
                                              <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                              <div style="display: flex; justify-content: space-between;">
                                                <a class="vd"  onclick="showDetails19()">View Details</a>
                                                <span>Price: <span style="color: green;">600$</span></span>
                                              </div>
                                            
                                          </div>
                                      </div>
                                      <div class="product-details" id="productDetails19">
                                        <!-- details  -->
                                        <h2>Product Details</h2>
                                        <p>GIGABYTE X670 GAMING X AX</p>
                                       
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="GIGABYTE X670 GAMING X AX">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                        <button class="btnhide" onclick="hideDetails19()">Close</button>
                                    </div>
                        
                                      <div class="product-card">
                                        <img class="pimg" src="images/asus_motherboard6.jpg" alt="ASUS ROG STRIX Z390-E GAMING">
                                        <div class="product-info">
                                            <h3>ASUS ROG STRIX Z390-E GAMING</h3>
                                            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                            <div style="display: flex; justify-content: space-between;">
                                              <a class="vd"  onclick="showDetails20()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="product-details" id="productDetails20">
                                      <!-- details  -->
                                      <h2>Product Details</h2>
                                      <p>ASUS ROG STRIX Z390-E GAMING</p>
                                    
                       <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="ASUS ROG STRIX Z390-E GAMING">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                      <button class="btnhide" onclick="hideDetails20()">Close</button>
                                  </div>
                        
                                    <div class="product-card">
                                      <img class="pimg" src="images/asus_motherboard7.jpg" alt="ASUS PRIME Z790-A WIFI">
                                      <div class="product-info">
                                          <h3>ASUS PRIME Z790-A WIFI</h3>
                                          <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                          <div style="display: flex; justify-content: space-between;">
                                            <a class="vd"  onclick="showDetails21()">View Details</a>
                                            <span>Price: <span style="color: green;">600$</span></span>
                                          </div>
                                        
                                      </div>
                                  </div>
                                  <div class="product-details" id="productDetails21">
                                    <!-- details  -->
                                    <h2>Product Details</h2>
                                    <p>ASUS PRIME Z790-A WIFI</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="ASUS PRIME Z790-A WIFI">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                    <button class="btnhide" onclick="hideDetails21()">Close</button>
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
                        <a class="vd"  onclick="showDetails22()">View Details</a>
                        <span>Price: <span style="color: green;">600$</span></span>
                      </div>
                  </div>
             </div>
                    <div class="product-details" id="productDetails22">
                          <!-- details  -->
                          <h2>Product Details</h2>
                          <p>CORSAIR VENGEANCE RGB DDR5 32GB</p>
                          
                          <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="CORSAIR VENGEANCE RGB DDR5 32GB">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                          <button class="btnhide" onclick="hideDetails22()">Close</button>
                    </div>
                         
                     <div class="product-card">
                           <img class="pimg" src="images/ram2_kingston-fury-beast-32gb-2x16gb-ddr5-6000-mhz.jpg" alt="KINGSTON FURY BEAST DDR5 16x2 GB">
                           <div class="product-info">
                            <h3>KINGSTON FURY BEAST DDR5 16x2 GB</h3>
                            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                            <div style="display: flex; justify-content: space-between;">
                              <a class="vd"  onclick="showDetails23()">View Details</a>
                              <span>Price: <span style="color: green;">600$</span></span>
                            </div>
                          
                          </div>
                    </div>
                                   <div class="product-details" id="productDetails23">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>KINGSTON FURY BEAST DDR5 16x2 GB</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="KINGSTON FURY BEAST DDR5 16x2 GB">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails23()">Close</button>
                                   </div>
                         
                                     <div class="product-card">
                                         <img class="pimg" src="images/ram3_corsair-vengeance-rgb-ddr5-6000-32gb.jpg" alt="CORSAIR VENGEANCE RGB DDR5 32GB WHITE EDITION">
                                         <div class="product-info">
                                             <h3>CORSAIR VENGEANCE RGB DDR5 32GB WHITE EDITION</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                              <a class="vd"  onclick="showDetails24()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                            </div>
                                           
                                         </div>
                                     </div>
                                  <div class="product-details" id="productDetails24">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>CORSAIR VENGEANCE RGB DDR5 32GB WHITE EDITION</p>
                                     
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="CORSAIR VENGEANCE RGB DDR5 32GB WHITE EDITION">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails24()">Close</button>
                                   </div>
                       
                                     <div  class="product-card">
                                         <img class="pimg" src="images/ram4_team t-force delta rgb 32gb ddr5.jpg" alt="T-FORCE DELTA RGB DDR5 32GB">
                                         <div class="product-info">
                                             <h3>T-FORCE DELTA RGB DDR5 32GB </h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                              <a class="vd"  onclick="showDetails25()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                            </div>
                                           
                                         </div>
                                     </div>
                                     <div class="product-details" id="productDetails25">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>T-FORCE DELTA RGB DDR5 32GB</p>
                                     
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="T-FORCE DELTA RGB DDR5 32GB">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails25()">Close</button>
                                   </div>
                       
                                     <div class="product-card">
                                         <img class="pimg" src="images/ram5_kingston-ddr5-ram-kvr56u46bs6k2-16-5600-mhz.jpg" alt="KINGSTON kvr56u46bs6k2 DDR5 16GB">
                                         <div class="product-info">
                                             <h3>KINGSTON kvr56u46bs6k2 DDR5 16GB</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                               <a class="vd"  onclick="showDetails26()">View Details</a>
                                               <span>Price: <span style="color: green;">600$</span></span>
                                            </div>
                                          
                                         </div>
                                     </div>
                                     <div class="product-details" id="productDetails26">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>KINGSTON kvr56u46bs6k2 DDR5 16GB</p>
                                      
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="KINGSTON kvr56u46bs6k2 DDR5 16GB">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails26()">Close</button>
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
                       <a class="vd"  onclick="showDetails27()">View Details</a>
                       <span>Price: <span style="color: green;">600$</span></span>
                      </div>
                     
                  </div>
             </div>
                    <div class="product-details" id="productDetails27">
                          <!-- details  -->
                          <h2>Product Details</h2>
                          <p>MSI SPATIUM M371 NVMe M.2 1TB</p>
                     
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="MSI SPATIUM M371 NVMe M.2 1TB">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                          <button class="btnhide" onclick="hideDetails27()">Close</button>
                    </div>
                         
                     <div class="product-card">
                           <img class="pimg" src="images/rom2_Gigabyte SSD M.2 256GO 2290 PCIe x2 NVMe.jpg" alt="Gigabyte SSD M.2 256GO 2290 PCIe x2 NVMe">
                           <div class="product-info">
                            <h3>GIGABYTE SSD M.2 256GO 2290 PCIe x2 NVMe</h3>
                            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                            <div style="display: flex; justify-content: space-between;">
                              <a class="vd"  onclick="showDetails28()">View Details</a>
                              <span>Price: <span style="color: green;">600$</span></span>
                             </div>
                           
                          </div>
                    </div>
                                   <div class="product-details" id="productDetails28">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>GIGABYTE SSD M.2 256GB 2290 PCIe x2 NVMe</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="GIGABYTE SSD M.2 256GB 2290 PCIe x2 NVMe">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                      
                                       <button class="btnhide" onclick="hideDetails28()">Close</button>
                                   </div>
                         
                                     <div class="product-card">
                                         <img class="pimg" src="images/rom3_emtec-x250-power-plus-ssd-256-gb.jpg" alt="EMTEC x250 POWER PLUS SSD 256GB">
                                         <div class="product-info">
                                             <h3>EMTEC x250 POWER PLUS SSD 256GB</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                                <a class="vd"  onclick="showDetails29()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
                                           
                                         </div>
                                     </div>
                                  <div class="product-details" id="productDetails29">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>EMTEC x250 POWER PLUS SSD 256GB</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="EMTEC x250 POWER PLUS SSD 256GB">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                     
                                       <button class="btnhide" onclick="hideDetails29()">Close</button>
                                   </div>
                       
                                     <div  class="product-card">
                                         <img class="pimg" src="images/rom4_PNY CS1030 M.2 PCIe NVMe 500GB.jpg" alt="PNY CS1030 M.2 PCIe NVMe 500GB">
                                         <div class="product-info">
                                             <h3>PNY CS1030 M.2 PCIe NVMe 500GB</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                               <a class="vd"  onclick="showDetails30()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
                                           
                                         </div>
                                     </div>
                                     <div class="product-details" id="productDetails30">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>PNY CS1030 M.2 PCIe NVMe 500GB</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="PNY CS1030 M.2 PCIe NVMe 500GB">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                    
                                       <button class="btnhide" onclick="hideDetails30()">Close</button>
                                   </div>
                       
                                     <div class="product-card">
                                         <img class="pimg" src="images/rom5T-FORCE-DELTA-500GB-RGB.jpg" alt="T-FORCE-DELTA-500GB-RGB">
                                         <div class="product-info">
                                             <h3>T-FORCE-DELTA-500GB-RGB</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                             <a class="vd"  onclick="showDetails31()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
                                           
                                         </div>
                                     </div>
                                     <div class="product-details" id="productDetails31">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>T-FORCE-DELTA-500GB-RGB</p>3
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="T-FORCE-DELTA-500GB-RGB">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails31()">Close</button>
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
                        <a class="vd"  onclick="showDetails32()">View Details</a>
                        <span>Price: <span style="color: green;">600$</span></span>
                       </div>
                    
                  </div>
             </div>
                    <div class="product-details" id="productDetails32">
                          <!-- details  -->
                          <h2>Product Details</h2>
                          <p>COOLER MASTER V1200 PLATINUM</p>
                      
                          <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="COOLER MASTER V1200 PLATINUM">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                          <button class="btnhide" onclick="hideDetails32()">Close</button>
                    </div>
                         
                     <div class="product-card">
                           <img class="pimg" src="images/pow2_ASUS ROG STRIX G Series Semi-Fanless Modular 80Plus Gold.jpg" alt="ASUS ROG STRIX G Series Semi-Fanless Modular 80Plus Gold">
                           <div class="product-info">
                            <h3>ASUS ROG STRIX G Series Modular 80Plus GOLD</h3>
                            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                            <div style="display: flex; justify-content: space-between;">
                               <a class="vd"  onclick="showDetails33()">View Details</a>
                              <span>Price: <span style="color: green;">600$</span></span>
                             </div>
                           
                          </div>
                    </div>
                                   <div class="product-details" id="productDetails33">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>ASUS ROG STRIX G Series Modular 80Plus GOLD</p>
                                    
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="ASUS ROG STRIX G Series Modular 80Plus GOLD">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails33()">Close</button>
                                   </div>
                         
                                     <div class="product-card">
                                         <img class="pimg" src="images/pow3_ASUS ROG Thor 1200W 80PLUS Platinum.webp" alt="ASUS ROG Thor 1200W 80PLUS Platinum">
                                         <div class="product-info">
                                             <h3>ASUS ROG THOR 1200W 80PLUS PLATINUM</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                               <a class="vd"  onclick="showDetails34()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
                                            
                                         </div>
                                     </div>
                                  <div class="product-details" id="productDetails34">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>ASUS ROG THOR 1200W 80PLUS PLATINUM</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="ASUS ROG THOR 1200W 80PLUS PLATINUM">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails34()">Close</button>
                                   </div>
                       
                                     <div  class="product-card">
                                         <img class="pimg" src="images/pow4_GAMEMAX 1050W ATX 3.0 & PCIE 5.0.jpg" alt="GAMEMAX 1050W ATX 3.0 & PCIE 5.0">
                                         <div class="product-info">
                                             <h3>GAMEMAX 1050W ATX 3.0 & PCIE 5.0</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                                <a class="vd"  onclick="showDetails35()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
                                            
                                         </div>
                                     </div>
                                     <div class="product-details" id="productDetails35">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>GAMEMAX 1050W ATX 3.0 & PCIE 5.0</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="GAMEMAX 1050W ATX 3.0 & PCIE 5.0<">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                     
                                       <button class="btnhide" onclick="hideDetails35()">Close</button>
                                   </div>
                       
                                     <div class="product-card">
                                         <img class="pimg" src="images/pow5_EVGA 750 BP, 80+ BRONZE 750W, 100-BP-0750-K1.jpg" alt="EVGA 750 BP, 80+ BRONZE 750W, 100-BP-0750-K1">
                                         <div class="product-info">
                                             <h3>EVGA 750 BP 80+ BRONZE 750W</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                               <a class="vd"  onclick="showDetails36()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
                                           
                                         </div>
                                     </div>
                                     <div class="product-details" id="productDetails36">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>EVGA 750 BP 80+ BRONZE 750W</p>
                                     
                       <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="EVGA 750 BP 80+ BRONZE 750W">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails36()">Close</button>
                                   </div>
                                   <div class="product-card">
                                    <img class="pimg" src="images/pow6_AEROCOOL LUX 750W PSU, 80 PLUS BRONZE.jpg" alt="AEROCOOL LUX 750W PSU, 80 PLUS BRONZE">
                                    <div class="product-info">
                                        <h3>AEROCOOL LUX 750W PSU, 80 PLUS BRONZE</h3>
                                        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                        <div style="display: flex; justify-content: space-between;">
                                          <a class="vd"  onclick="showDetails37()">View Details</a>
                                          <span>Price: <span style="color: green;">600$</span></span>
                                         </div>
                                       
                                    </div>
                                </div>
                                <div class="product-details" id="productDetails37">
                                  <!-- details  -->
                                  <h2>Product Details</h2>
                                  <p>AEROCOOL LUX 750W PSU, 80 PLUS BRONZE</p>
                                 
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="AEROCOOL LUX 750W PSU, 80 PLUS BRONZE">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                  <button class="btnhide" onclick="hideDetails37()">Close</button>
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
                       <a class="vd"  onclick="showDetails38()">View Details</a>
                        <span>Price: <span style="color: green;">600$</span></span>
                       </div>
                     
                  </div>
             </div>
                    <div class="product-details" id="productDetails38">
                          <!-- details  -->
                          <h2>Product Details</h2>
                          <p>ASUS TUF Gaming GT501 White Edition</p>
                       
                          <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="ASUS TUF Gaming GT501 White Edition">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>

                          <button class="btnhide" onclick="hideDetails38()">Close</button>
                    </div>
                         
                     <div class="product-card">
                           <img class="pimg" src="images/case2_ASUS ROG Strix Helios Tempered Glass.jpg" alt="ASUS ROG Strix Helios Tempered Glass">
                           <div class="product-info">
                            <h3>ASUS ROG STRIX HELIOS TEMPERED GLASS</h3>
                            <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                            <div style="display: flex; justify-content: space-between;">
                               <a class="vd"  onclick="showDetails39()">View Details</a>
                              <span>Price: <span style="color: green;">600$</span></span>
                             </div>
                            
                          </div>
                    </div>
                                   <div class="product-details" id="productDetails39">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>ASUS ROG STRIX HELIOS TEMPERED GlASS</p>
                                     
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="ASUS ROG STRIX HELIOS TEMPERED GlASS">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails39()">Close</button>
                                   </div>
                         
                                     <div class="product-card">
                                         <img class="pimg" src="images/case3_Cooler Master MASTERBOX MB511 RGB.jpg" alt="Cooler Master MASTERBOX MB511 RGB">
                                         <div class="product-info">
                                             <h3>COOLER MASTER MASTERBOX MB511 RGB</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                            <a class="vd"  onclick="showDetails40()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
      
                                         </div>
                                     </div>
                                  <div class="product-details" id="productDetails40">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>ASUS ROG THOR 1200W 80PLUS PLATINUM</p>
                                     
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="ASUS ROG THOR 1200W 80PLUS PLATINUM">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails40()">Close</button>
                                   </div>
                       
                                     <div  class="product-card">
                                         <img class="pimg" src="images/case4_CORSAIR iCUE 5000T RGB PC Case Black.jpg" alt="CORSAIR iCUE 5000T RGB PC Case Black">
                                         <div class="product-info">
                                             <h3>CORSAIR ICUE 5000T RGB PC Case BlACK</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                                <a class="vd"  onclick="showDetails41()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
                                           
                                         </div>
                                     </div>
                                     <div class="product-details" id="productDetails41">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>CORSAIR ICUE 5000T RGB PC Case BlACK</p>
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="CORSAIR ICUE 5000T RGB PC Case BlACK">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                      
                                       <button class="btnhide" onclick="hideDetails41()">Close</button>
                                   </div>
                       
                                     <div class="product-card">
                                         <img class="pimg" src="images/case5_CORSAIR 275R Airflow Tempered Glass.png" alt="CORSAIR 275R Airflow Tempered Glass">
                                         <div class="product-info">
                                             <h3>CORSAIR 275R AIRFLOW TEMPERED GLASS</h3>
                                             <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                             <div style="display: flex; justify-content: space-between;">
                                               <a class="vd"  onclick="showDetails42()">View Details</a>
                                              <span>Price: <span style="color: green;">600$</span></span>
                                             </div>
                                             
                                         </div>
                                     </div>
                                     <div class="product-details" id="productDetails42">
                                       <!-- details  -->
                                       <h2>Product Details</h2>
                                       <p>CORSAIR 275R AIRFLOW TEMPERED GLASS</p>
                                   
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="CORSAIR 275R AIRFLOW TEMPERED GLASS">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                       <button class="btnhide" onclick="hideDetails42()">Close</button>
                                   </div>
                                   <div class="product-card">
                                    <img class="pimg" src="images/case6_Mars Gaming MC-X2 Zwart.jpg" alt="Mars Gaming MC-X2 Zwart">
                                    <div class="product-info">
                                        <h3>MARS GAMING MC-X2 ZWART</h3>
                                        <p>Immerse yourself in the world of lifelike graphics and seamless gaming.</p>
                                        <div style="display: flex; justify-content: space-between;">
                                          <a class="vd"  onclick="showDetails43()">View Details</a>
                                          <span>Price: <span style="color: green;">600$</span></span>
                                         </div>
                                       
                                    </div>
                                </div>
                                <div class="product-details" id="productDetails43">
                                  <!-- details  -->
                                  <h2>Product Details</h2>
                                  <p>MARS GAMING MC-X2 ZWART</p>
                                
                        <form method="POST" action="Panier.php">
                           <input type="hidden" name="productName" value="MARS GAMING MC-X2 ZWART">
                          <button type="submit" class="add-to-cart" name="addToCart">Add to cart</button>
                        </form>
                                  <button class="btnhide" onclick="hideDetails43()">Close</button>
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