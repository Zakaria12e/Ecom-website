<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/Products.css">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="icon" href="images/logogravey.jpg" type="image/png" sizes="16x16">
        <title>Gravey</title>
    </head>

    <body>

        <header class="header">


            <a class="logo" href="home.php">Gravey</a>
            <nav class="navbar">
                <a href="home.php">Accueil</a>

                <div class="dropdown">
                    <a href="#">Produits</a>
                    <div class="dropdown-content">

                        <a href="#CPUS">Processeurs</a>
                        <a href="#GPUS">Cartes graphiques</a>
                        <a href="#MD">Cartes mères</a>
                        <a href="#RAM">Mémoire RAM</a>
                        <a href="#ROM">Stockage ROM</a>
                        <a href="#PS">Alimentations</a>
                        <a href="#CASES">Boîtiers</a>
                        <a href="#MONITORS">Écrans</a>

                    </div>
                    </div>

                
                    <a href="support.php">Support</a>

                    <a id="panier-icon" href="Panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg></a>

                    <?php
                    require_once 'config.php';
                    //totale des produits dans panier
                    $totalQuantity = "";

                    if (isset($_SESSION['id'])) {
                        $user_id = $_SESSION['id'];
                        $totaleQuery = "SELECT SUM(quantity) AS totalQuantity FROM panier WHERE Id = $user_id;";
                        $result = mysqli_query($con, $totaleQuery);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);

                            if (!empty($row['totalQuantity'])) {
                                $totalQuantity = $row['totalQuantity'];
                            }
                        }
                    }
                    ?>

                    <span id="quantitySpan" style="color:white; background-color: black; border-radius:50%; padding:0 6px; font-size:14px; font-weight: 600;">
                        <?php echo $totalQuantity; ?>
                    </span>

                    <script>
                        var quantitySpan = document.getElementById("quantitySpan");
                        if (quantitySpan.innerHTML.trim() === "") {
                            quantitySpan.style.display = "none";
                        }
                    </script>

                    <a style="margin-top: 10px;" href="Profile.php"> <?php echo $_SESSION['username']; ?></a>


            </nav>
            <button class="mobile-menu-button">&#9776;</button>
        </header>


        <section class="home">
            <div class="content">
                <h1 class="title-home">Bienvenue chez Gravey votre magasin de matériel informatique</h1>
                <p>Découvrez une large gamme de processeurs, cartes graphiques, barrettes de RAM, SSD et bien plus encore</p>

                <a href="#CPUS" id="btn-to-products">Achetez maintenant</a>
            </div>
            <img class="background-img" src="images/newsroom-intel-core-14th-gen-desktop-feat.jpg" alt="Background Image">
        </section>

        <main>

            </div>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Recherche..." required>
                <button id="search_btn" onclick="searchProducts()">Recherche</button>
            </div>
            <section id="CPUS">
                <h2 class="title">PROCESSEURS INTEL & AMD</h2>

                <div class="product-category">
                    <?php
                    $ProductQuery = "SELECT product_name, price, image FROM products WHERE category = 'CPU'";
                    $result = mysqli_query($con, $ProductQuery);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<div class="product-info">';
                            echo '<h3>' . $row["product_name"] . '</h3>';
                            echo '<p>Améliorez votre puissance de calcul avec nos processeurs de pointe</p>';
                            echo '<div style="display: flex; justify-content: space-between;">';
                            echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">Voir les détails</a>';
                            echo '<span><b>' . $row["price"] . ' MAD</b></span>';
                            echo '</div></div></div>';
                        }
                    }
                    ?>

                </div>


            </section>
            <!-- GPUs section  -->
            <section id="GPUS">
                <h2 class="title">CARTES GRAPHIQUES NVIDIA & AMD</h2>

                <div class="product-category">

                    <?php

                    $ProductQuery = "SELECT product_name, price, image FROM products WHERE category = 'GPU'";
                    $result = mysqli_query($con, $ProductQuery);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<div class="product-info">';
                            echo '<h3>' . $row["product_name"] . '</h3>';
                            echo '<p>Améliorez les performances graphiques avec nos unités de traitement graphique</p>';
                            echo '<div style="display: flex; justify-content: space-between;">';
                            echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">Voir les détails</a>';
                            echo '<span><b>' . $row["price"] . ' MAD</b></span>';
                            echo '</div></div></div>';
                        }
                    }
                    ?>

                </div>
            </section>
            <!-- MotherBoards section  -->
            <section id="MD">
                <h2 class="title">CARTES MÈRES</h2>

                <div class="product-category">

                    <?php

                    $ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'MOTHER_BOARD'";
                    $result = mysqli_query($con, $ProductQuery);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<div class="product-info">';
                            echo '<h3>' . $row["product_name"] . '</h3>';
                            echo '<p>Profitez d\'une connectivité et de performances supérieures avec nos cartes mères à la pointe de la technologie</p>';
                            echo '<div style="display: flex; justify-content: space-between;">';
                            echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">Voir les détails</a>';
                            echo '<span><b>' . $row["price"] . ' MAD</b></span>';
                            echo '</div></div></div>';
                        }
                    }
                    ?>

                </div>
            </section>

            <!-- RAM section  -->
            <section id="RAM">
                <h2 class="title">MÉMOIRE RAM</h2>

                <div class="product-category">
                    <?php

                    $ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'RAM'";
                    $result = mysqli_query($con, $ProductQuery);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<div class="product-info">';
                            echo '<h3>' . $row["product_name"] . '</h3>';
                            echo '<p>Optimisez les capacités de multitâche avec une mémoire vive haute vitesse</p>';
                            echo '<div style="display: flex; justify-content: space-between;">';
                            echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">Voir les détails</a>';
                            echo '<span><b>' . $row["price"] . ' MAD</b></span>';
                            echo '</div></div></div>';
                        }
                    }
                    ?>
                </div>

            </section>

            <!-- ROM section  -->
            <section id="ROM">
                <h2 class="title">STOCKAGE ROM</h2>

                <div class="product-category">

                    <?php

                    $ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'ROM'";
                    $result = mysqli_query($con, $ProductQuery);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<div class="product-info">';
                            echo '<h3>' . $row["product_name"] . '</h3>';
                            echo '<p>Stockez et accédez aux données de manière transparente avec une mémoire morte ultrarapide</p>';
                            echo '<div style="display: flex; justify-content: space-between;">';
                            echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">Voir les détails</a>';
                            echo '<span><b>' . $row["price"] . ' MAD</b></span>';
                            echo '</div></div></div>';
                        }
                    }
                    ?>

                </div>

            </section>

            <!-- POWER SUPPLYs section  -->
            <section id="PS">
                <h2 class="title">ALIMENTATIONS</h2>

                <div class="product-category">
                    <?php

                    $ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'POWER_SUPPLY'";
                    $result = mysqli_query($con, $ProductQuery);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<div class="product-info">';
                            echo '<h3>' . $row["product_name"] . '</h3>';
                            echo '<p>Assurez une alimentation stable avec nos unités d\'alimentation avancées</p>';
                            echo '<div style="display: flex; justify-content: space-between;">';
                            echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">Voir les détails</a>';
                            echo '<span><b>' . $row["price"] . ' MAD</b></span>';
                            echo '</div></div></div>';
                        }
                    }
                    ?>

                </div>

            </section>

            <!-- CASEs section  -->
            <section id="CASES">
                <h2 class="title">BOÎTIERS</h2>

                <div class="product-category">

                    <?php

                    $ProductQuery = "SELECT product_name, price, image  FROM products WHERE category = 'CASE'";
                    $result = mysqli_query($con, $ProductQuery);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<div class="product-info">';
                            echo '<h3>' . $row["product_name"] . '</h3>';
                            echo '<p>Protégez et mettez en valeur vos composants avec un boîtier élégant et durable</p>';
                            echo '<div style="display: flex; justify-content: space-between;">';
                            echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">Voir les détails</a>';
                            echo '<span><b>' . $row["price"] . ' MAD</b></span>';
                            echo '</div></div></div>';
                        }
                    }
                    ?>
                </div>

            </section>
            <!-- MONITORS section  -->
            <h2 class="title">ÉCRANS</h2>
            <section id="MONITORS">
                <div class="product-category">

                    <?php

                    $ProductQuery = "SELECT product_name, price, image FROM products WHERE category = 'Monitors'";
                    $result = mysqli_query($con, $ProductQuery);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="product-card">';
                            echo '<img class="pimg" src="images/' . $row["image"] . '" alt="' . $row["product_name"] . '">';
                            echo '<div class="product-info">';
                            echo '<h3>' . $row["product_name"] . '</h3>';
                            echo '<p>Sublimez votre expérience visuelle avec nos écrans haute résolution et couleurs éclatantes</p>';
                            echo '<div style="display: flex; justify-content: space-between;">';
                            echo '<a class="vd" href="details.php?name=' . urlencode($row["product_name"]) . '">Voir les détails</a>';
                            echo '<span><b>' . $row["price"] . ' MAD</b></span>';
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