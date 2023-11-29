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
  <title>Gravey</title>
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
                <a href="home.html" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
            </li>
            <li>
                <a href="Products.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
            </li>
            <li>
                <a href="support.php" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Support</a>
            </li>
            <li>
            <a id="profile" href="profile.php" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg></a>
               </li>
            
        </ul>
    </div>font 
</nav>
<section id="home">
    <img src="images/gaming-pad-alt-1-svgrepo-com.svg" class="logo-home" alt="Gravey Logo" />
    <h1 class="title-home">Welcome to Gravey Your Hardware Store</h1>
    <p>Explore a wide range of CPUs, GPUs, RAMs, SSDs, and more.</p>
    <a href="Products.php" id="btn-to-products">Shop Now</a>
</section>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, laudantium! Quod natus modi molestiae fuga maiores iusto totam velit, hic saepe. Temporibus, aperiam a modi eveniet placeat maiores doloremque ipsa.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium, debitis quasi reprehenderit, itaque ab vel harum dolorum minima totam consequuntur molestias nostrum tempore laboriosam quidem cum perspiciatis suscipit id ea.</p>
<h1>ecommerce</h1>
</body>
</html>
<?php
}
?>