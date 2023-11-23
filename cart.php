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
    <!-- Footer styles -->
    <link rel="stylesheet" href="styles/components/footer.css">
    <title>Carrito</title>
</head>
<body>
    <header>
    <?php
    include("includes/nav.php");
    ?>
    </header>
    <section class="cart">
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
    if(isset($_GET['id_borrar'])){
        borrarProducto($_GET['id_borrar']);
    }

    //Mostrar carrito y carrito vacio//
    if(isset($_SESSION['carrito'])){
        mostrarCarrito();
    }
    else{
        mostrarCarritoVacio();
    }
    ?>
    </section>
    <footer>
    <?php
    include("includes/footer.php");
    ?>
    </footer>
</body>
</html>
<?php
}
else{
    header('location: login.php?senial');
}
?>