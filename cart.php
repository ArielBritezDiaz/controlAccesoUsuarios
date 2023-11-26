<?php
session_start();
if(isset($_SESSION['usuario'])){
require_once('conexion.php');
require_once('includes/functionCart.php');
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

    <!-- Nav font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">

    <title>Carrito</title>
</head>
<body>
    <header>
    <?php
    include("includes/nav.php");
    ?>
    </header>
    <section>
    <?php
    //Agregar producto al carrito//
    if(isset($_GET['id_articulo'])){
        agregarProductoCarrito($_GET['id_articulo']);//Primer producto
    }

    // Vaciar carrito // 
    if(isset($_GET['vaciar'])){
        vaciarCarrito();
    }
    
    //Sumar producto//
    if(isset($_GET['id_sumar'])){
        sumarProducto($_GET['id_sumar']);
    }

    //Restar producto//
    if(isset($_GET['id_restar'])){
        restarProducto($_GET['id_restar']);
    }
    
    //Eliminar un producto//
    echo '<div id="stay">';
    if(isset($_GET['id_borrar'])){
        borrarProducto($_GET['id_borrar']);
    }
    echo '</div>';

    //Mostrar carrito y carrito vacio//
    if(isset($_SESSION['carrito'])){
        mostrarCarrito();
    }
    else{
        mostrarCarritoVacio();
    }
    ?>
    </section>
</body>
</html>
<?php
}
else{
    header('location: login.php?senial');
}
?>