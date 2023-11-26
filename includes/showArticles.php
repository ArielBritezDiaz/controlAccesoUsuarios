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

    //Mostrar articulos ordenados de forma ascendente
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

    //Mostrar articulos ordenados de forma descendente
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

    //Mostrar todos los articulos
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

    //Mostrar articulos por categoria
    function showCategorie($cat){
        include ("conexion.php");
        $sql = "SELECT * FROM articulos WHERE categoria = '$cat'";
        $query = mysqli_query($conexion, $sql);
        echo '<script>window.location.hash = "#stay";</script>';
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
        if(mysqli_num_rows($query) <= 0){
            echo '<p>No hay stock de articulos con la categoria <span class="bold">'.$cat.'</span></p>';
        }
    }

    //Ordenar articulos por categoria de forma ascendente
    function orderAscCategorie($cat){
        include ("conexion.php");
        $sql = "SELECT * FROM articulos WHERE categoria = '$cat' ORDER BY precio ASC";
        $query = mysqli_query($conexion, $sql);
        echo '<script>window.location.hash = "#stay";</script>';
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
        if(mysqli_num_rows($query) <= 0){
            echo '<p>No hay stock de articulos con la categoria <span class="bold">'.$cat.'</span></p>';
        }
    }

    //Ordenar articulos por categoria de forma descendente
    function orderDescCategorie($cat){
        include ("conexion.php");
        $sql = "SELECT * FROM articulos WHERE categoria = '$cat' ORDER BY precio DESC";
        $query = mysqli_query($conexion, $sql);
        echo '<script>window.location.hash = "#stay";</script>';
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
        if(mysqli_num_rows($query) <= 0){
            echo '<p>No hay stock de articulos con la categoria <span  class="bold">'.$cat.'</span></p>';
        }
    }

    function showPublishing($id_user){
        include("conexion.php");

        $sql = "SELECT * FROM articulos WHERE id_usuario = '$id_user'";
        $query = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($query)>0){
            while($registro = mysqli_fetch_assoc($query)){
                
                echo '<details>
                <summary>Articulo: '.$registro['nombre'].'</summary>';
                
                // Datos de los articulos publicados por el usuario
                echo '
                        <div class="detalle">
                            <div class="img"><img src="src/images/articles/'.$registro['imagen'].'"></div>
                            <div class="datos">
                                <span>'.$registro['descripcion'].'</span>
                                <span>'.$registro['nombre'].'</span
                                <span> $'.$registro['precio'].'</span>
                                <span>'.$registro['stock'].'</span>
                                <span> '.$registro['categoria'].'</span>
                                <span>'.$registro['color'].'</span>
                                <span>'.$registro['estado'].'</span>
                            </div>
                        </div>
                        '; 
                /*convierto el campo Article nuevamente en un vector utilizando la funcion explode() */
                // $articulos = explode(' ' , $registro['articles']);
    
                // $total = 0;
                // for($x=1; $x<count($articulos); $x++){
                //         /*utilizando nuevamente la funcion explote() generos las variables para guardar el id_prod, el precio y la cantidad */
                //         list($id, $precio, $cant) = explode('/' , $articulos[$x]);
    
                        /*Con el $id traigo imagen y nombre de producto */
                        // $sql2 = "SELECT Name_art, Img_art FROM articles WHERE ID_art='$id'";
                        // $consulta2 = mysqli_query($conexion, $sql2);
                        // $reg_art = mysqli_fetch_assoc($consulta2);
    
                        /* muestro detalle de pedido */
                        
                        // $total = $total + ($precio*$cant);     
                }
                // echo '
                // <div class="total">
                // <span> TOTAL: $'.number_format($total,2,",",".").'</span>
                // </div>
                // ';
                echo '</details>';
            }else{
                echo '<p>No tiene articulos publicados</p>';
            }
        }
?>

</body>
</html>