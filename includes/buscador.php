<?php
include('../conexion.php');
    if(!empty($_POST['buscar'])){
        $sql = "SELECT * FROM articulos WHERE nombre LIKE '%".$_POST['buscar']."%' ";
        }else{
        $sql="SELECT * FROM articulos";
    }
    $consulta = mysqli_query($conexion, $sql);
    while($registro=mysqli_fetch_assoc($consulta)){
        $format = number_format($registro['precio'], 2, ',', '.');
        echo'<div class="card">
                    <img src="src/images/articles/'.$registro['imagen'].'" class="imgArticle">
                    <p class="name">'.$registro['nombre'].'</p>
                    <p class="price">$'.$format.'</p>
                    <p class="stock">Stock : '.$registro['stock'].'</p>
                    <a href="cart.php?id_articulo='.$registro['id_articulo'].'"><i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i>Agregar</a>
            </div>';
    };
?>