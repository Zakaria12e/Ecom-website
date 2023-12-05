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
    <title>Document</title>
</head>
<body>
<style>
    span{
        padding-left: 40px;
    }
</style>
    <?php echo'<h1>Hello '.$_SESSION['username'].'</h1>'; ?>
    
   
    <?php
    require_once 'config.php';
    echo'<div><p>Appuyez ici pour vous déconnecter</p><a id="logout-btn" href="logout.php">Log out</a>
    </div>';
    echo'PRODUCTS';
    echo'<br>';

    $Query = " SELECT * FROM products" ;
    $result = mysqli_query($con,$Query);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
   
        echo'<span>'.  $row['product_name'].'</span>';
        echo'<span>'.  $row['quantity'].'</span>';
        echo'<span>'.  $row['price'].'$</span><br><br>';
    }
}

        
    ?>
</body>
</html>
<?php
}
?>