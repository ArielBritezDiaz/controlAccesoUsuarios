<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/components/articles.css">

    <!-- Articles font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jura&family=Roboto:wght@900&family=Ysabeau+SC:wght@500&display=swap" rel="stylesheet">

    <title>Inicio</title>
</head>
<body>

<?php

    function orderAsc($buscar = ""){
        include ("conexion.php");
        $sql = "SELECT * FROM articulos WHERE nombre LIKE '%$buscar%' ORDER BY precio ASC";
        $query = mysqli_query($conexion, $sql);
        echo '<script>window.location.hash = "#stay";</script>';
        while($registro=mysqli_fetch_assoc($query)){
            $format = number_format($registro['precio'], 2, ',', '.');
            echo'<div class="card">
                        <img src="src/images/articles/'.$registro['imagen'].'" class="imgArticle">
                        <p class="name">'.$registro['nombre'].'</p>
                        <p class="price">$'.$format.'</p>
                        <p class="stock">Stock : '.$registro['stock'].'</p>
                        <a href="cart.php?id_articulo='.$registro['id_articulo'].'"><i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i>Agregar</a>
                </div>';
        }
    }

    function orderDesc($buscar = ""){
        include ("conexion.php");
        $sql = "SELECT * FROM articulos WHERE nombre LIKE '%$buscar%' ORDER BY precio DESC";
        $query = mysqli_query($conexion, $sql);
        echo '<script>window.location.hash = "#stay";</script>';
        while($registro=mysqli_fetch_assoc($query)){
            $format = number_format($registro['precio'], 2, ',', '.');
            echo'<div class="card">
                        <img src="src/images/articles/'.$registro['imagen'].'" class="imgArticle">
                        <p class="name">'.$registro['nombre'].'</p>
                        <p class="price">$'.$format.'</p>
                        <p class="stock">Stock : '.$registro['stock'].'</p>
                        <a href="cart.php?id_articulo='.$registro['id_articulo'].'"><i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i>Agregar</a>
                </div>';
        }
    }

    function showArticles(){
        include ("conexion.php");
        $sql = "SELECT * FROM articulos";
        $query = mysqli_query($conexion, $sql);
        while($article = mysqli_fetch_assoc($query)){
            // Precio formateado //
            $format = number_format($article['precio'], 2, ',', '.');
            echo'<div class="card">
                    <img src="src/images/articles/'.$article['imagen'].'" class="imgArticle">
                    <p class="name">'.$article['nombre'].'</p>
                    <p class="price">$'.$format.'</p>
                    <p class="stock">Stock : '.$article['stock'].'</p>
                    <a href="cart.php?id_articulo='.$article['id_articulo'].'"><i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i>Agregar</a>
            </div>';
        }
    }
?>

</body>
</html>