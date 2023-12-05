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
    echo'Tickets';
    echo'<br>';

    $Query = " SELECT * FROM tickets" ;
    $result = mysqli_query($con,$Query);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
   
        echo'<span>'.  $row['id'].'</span>';
        echo'<span>'.  $row['name'].'</span>';
        echo'<span>'.  $row['email'].'$</span>';
        echo'<span>'.  $row['message'].'$</span><br><br>';
    }
}

        
    ?>
</body>
</html>
<?php
}
?>