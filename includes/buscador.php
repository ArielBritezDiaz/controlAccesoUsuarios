<?php
include('../conexion.php');
    if(!empty($_POST['buscar'])){
        $sql = "SELECT * FROM articles WHERE Name_art LIKE '%".$_POST['buscar']."%' ";
        }else{
        $sql="SELECT * FROM articles";
    }
    $consulta = mysqli_query($conexion, $sql);
    while($registro=mysqli_fetch_assoc($consulta)){
        $format = number_format($article['precio'], 2, ',', '.');
        echo'<div class="card">
                    <img src="../src/images/articles/'.$article['imagen'].'" class="imgArticle">
                    <p class="name">'.$article['nombre'].'</p>
                    <p class="price">$'.$format.'</p>
                    <p class="stock">Stock : '.$article['stock'].'</p>
                    <a href="cart.php?id_articulo='.$article['id_articulo'].'"><i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i>Agregar</a>
            </div>';
    };
?>