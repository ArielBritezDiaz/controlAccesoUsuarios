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

    // Mostrar las publicaciones de los usuarios
    function showPublishing($id_user){
        include("conexion.php");
        $id_user = $_SESSION['ID_u'];
        $sql = "SELECT * FROM articulos WHERE id_usuario = '$id_user'";
        $query = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($query)>0){
            while($registro = mysqli_fetch_assoc($query)){
                $format = number_format($registro['precio'], 2, ',', '.');
                echo '<details class="details">
                <summary class="summary">'.$registro['nombre'].'</summary>';
                
                // Datos de los articulos publicados por el usuario
                echo '<div class="detalles">
                            <div><img src="src/images/articles/'.$registro['imagen'].'" class="img"></div>
                                <div class="data">
                                    <p class="precio">'.$format.'</p>
                                    <hr class="articleDivisor">
                                    <p class="stock">'.$registro['stock'].'</p>
                                </div>
                        </div>
                        <div class="delete">
                            <a href="perfil.php?id_eliminar_articulo='.$registro['id_articulo'].'"
                            onClick="return confirm(\'¿Seguro que desea comprar?\')">Eliminar
                            </a>
                        </div>
                        '; 
                        echo '</details>';
                }

            }else{
                echo '<p>No tiene articulos publicados</p>';
            }
        }

        //Eliminar publicacion
        function deleteArticle($id){
            include("conexion.php");
            $sql = "DELETE FROM articulos WHERE id_articulo = '$id'";
            $query = mysqli_query($conexion, $sql);

            if($query){
                echo '<script>
                window.location = "perfil.php"
                </script>';
            }
        }
        // Editar publicacion
        // function editArticle($id_a){
        //     include("conexion.php");

        //     $sql = "SELECT * FROM articulos WHERE id_articulo = '$id_a'";
        //     $query = mysqli_query($conexion, $sql);
        //     $registro = mysqli_fetch_assoc($query);

        //     echo '<form action="" method="POST">
        //     <input type="text" name="articulo" placeholder='.$registro['nombre'].' min="5" max="30" pattern=".{5,30}" required class="name">
        //     <textarea class="description" cols="30" rows="10" name="descripcion" max="100" pattern=".{0,100}" placeholder='.$registro['descripcion'].'></textarea>
        //     <input type="number" name="precio" placeholder='.$registro['precio'].' min="1" max="1000000000" required class="price">
        //     <input type="number" name="stock" placeholder='.$registro['stock'].' min="1" max="100000" required class="stock">
        //     <select name="color" class="selects">
        //         <option disabled selected value="">'.$registro['color'].'</option>
        //         <option value="azul">Azul</option>
        //         <option value="rojo">Rojo</option>
        //         <option value="verde">Verde</option>
        //         <option value="amarillo">Amarillo</option>
        //         <option value="violeta">Violeta</option>
        //         <option value="gris">Gris</option>
        //         <option value="negro">Negro</option>
        //         <option value="blanco">Blanco</option>
        //         <option value="naranja">Naranja</option>
        //         <option value="varios">Varios</option>
        //         <option value="ninguno">Ninguno</option>
        //     </select>
        //     <select name="categoria" class="selects">
        //         <option disabled selected value="">'.$registro['categoria'].'</option>
        //         <option value="Auto">Auto</option>
        //         <option value="Moto">Moto</option>
        //         <option value="Formula">Formula</option>
        //         <option value="varias">Varias</option>
        //         <option value="ninguna">Ninguna</option>
        //     </select>
        //     <select name="estado" class="selects">
        //         <option disabled selected value="">'.$registro['estado'].'</option>
        //         <option value="nuevo">Nuevo</option>
        //         <option value="usado">usado</option>
        //         <option value="ninguno">Ninguno</option>
        //     </select>
        //     <input type="submit" value="Actualizar datos" name="actualizar" style="cursor:pointer" class="sendData">
        //     </form>
        //     <a href="perfil.php?cancel" class="cancel">
        //     <img src="src/images/mark.svg">
        //     </a>';
        //     if(isset($_GET['cancel'])){
        //         header('Location: perfil.php');
        //     exit();
        //     }else{
        //         echo '<a href="perfil.php?id_editar_articulo='.$registro['id_articulo'].'">
        //                 <img src="src/images/pencil.svg">
        //             </a>';
        //     }

        //     if(isset($_POST['actualizar'])){
        //         // Datos a actualizar
        //         $nombre = $_POST['articulo'];
        //         $descripcion = $_POST['descripcion'];
        //         $precio = $_POST['precio'];
        //         $stock = $_POST['stock'];
        //         $color = $_POST['color'];
        //         $categoria = $_POST['categoria'];
        //         $estado = $_POST['estado'];

        //         $sqlUpdate = "UPDATE articulos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', stock = '$stock', color = '$color', categoria = '$categoria', estado = '$estado' WHERE id_articulo = '$id_a'";
        //         $update = mysqli_query($conexion, $sqlUpdate);

        //     }
?>

</body>
</html>