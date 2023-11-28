<?php
session_start();
include('../conexion.php');
    if(!empty($_POST['buscar'])){
        $sql = "SELECT * FROM articulos WHERE nombre LIKE '%".$_POST['buscar']."%' ";
        }else{
        $sql="SELECT * FROM articulos";
    }
    $consulta = mysqli_query($conexion, $sql);
    while($registro=mysqli_fetch_assoc($consulta)){
        $id_u = $_SESSION['ID_u'];
        if($registro['stock'] > 0){
            $format = number_format($registro['precio'], 2, ',', '.');
        echo'<div class="card">
                    <a href="publishing.php?id_art='.$registro['id_articulo'].'">
                        <img src="src/images/articles/'.$registro['imagen'].'" class="imgArticle">
                    </a>
                    <p class="name">'.$registro['nombre'].'</p>
                    <p class="price">$'.$format.'</p>
                    <p class="stock">Stock : '.$registro['stock'].'</p>';
                    if($registro['id_usuario'] != $id_u){
                        echo '<a href="cart.php?id_articulo='.$registro['id_articulo'].'">
                        <i class="fa-solid fa-cart-shopping" style="color: #f0f8ff;"></i>Agregar
                        </a>';
                        
                    }
                echo '</div>';
        }
    };
?>