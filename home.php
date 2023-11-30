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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="home.css">
  <title>Gravey</title>
</head>
<body>
    <header>
        <nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="images/gaming-pad-alt-1-svgrepo-com.svg" class="h-8" alt="Gravey Logo" />
                    <span style="color: black;" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gravey</span>
                </a>
                <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="home.html" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="Products.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
                    </li>
                    <li>
                        <a href="support.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Support</a>
                    </li>
                    <li>
                    <a id="profile" href="profile.php" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                    </a>
                    </li>
                    <li>
                        <a id="panier-icon" href="Panier.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </a>
                    </li>
                    <div class="div-search">
                        <input type="text" id="searchInput" placeholder="Search for products...">
                        <button class="search-btn">Search</button>
                    </div> 
                </ul>
            </div>
        </nav>
    </header>
    
    <section id="home">
        <img src="images/gaming-pad-alt-1-svgrepo-com.svg" class="logo-home" alt="Gravey Logo" />
        <h1 class="title-home">Welcome to Gravey Your Hardware Store</h1>
        <p>Explore a wide range of CPUs, GPUs, RAMs, SSDs, and more.</p>
        <a href="Products.php" id="btn-to-products">Shop Now</a>
    </section>

    <main>
        <section id="featuredProducts">
            <h2>Featured Products</h2>
            <div class="product">
            <!-- Product details go here -->
            </div>
            <div class="product">
            <!-- Another featured product -->
            </div>
            <!-- Add more products as needed -->
        </section>
        <section id="filters">
            <h2>Filter by Category</h2>
            <!-- Add radio buttons or other filter options here -->
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>Gravey is dedicated to providing high-quality hardware components for laptops.</p>
            </div>
            <div class="footer-section contact">
                <h3>Contact Information</h3>
                <p>Email: nourddinedriouech@Gravey.com</p>
                <p>Phone: +123 456 7890</p>
            </div>
        <div class="footer-section follow">
            <h3>Follow Us</h3>
            <a href="https://www.facebook.com/DRIOUECH.Noureddine" target="_blank">Facebook</a>
            <a href="#https://www.instagram.com/noureddine.driouech/" target="_blank">Instagram</a>
            <a href="#" target="_blank">Twitter</a>
        </div>
        </div>
        <div class="footer-bottom">
        <p>&copy; 2023 Gravey. All rights reserved.</p>
        </div>
    </footer>
<script src="home.js"></script>
</body>
</html>
<?php
}
?>