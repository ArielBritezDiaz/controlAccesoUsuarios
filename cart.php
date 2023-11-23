<?php
session_start();
if(isset($_SESSION['usuario'])){
require_once('conexion.php');
require_once('includes/functionCar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/cart.css">
    <!-- Nav styles -->
    <link rel="stylesheet" href="styles/components/nav.css">
    <!-- Footer styles -->
    <link rel="stylesheet" href="styles/components/footer.css">
    <title>Carrito</title>
</head>
<body>
    <?php
    include("includes/nav.php");

    //Si existe el producto
    if(isset($_GET['id_producto'])){
        agregarProductoCarrito($_GET['id_producto']);//Primer producto
    }

    include("includes/footer.php");
    ?>
</body>
</html>
<?php
}
else{
    header('location: login.php?senial');
}
?>