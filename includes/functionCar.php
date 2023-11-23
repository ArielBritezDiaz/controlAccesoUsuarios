<?php
//Agregar productos al carrito//
function agregarProductoCarrito($id){
    include("conexion.php");
        //Datos del articulo traido desde la base de datos
        $sql = "SELECT * FROM articulos WHERE id_articulo = '$id'";
        $query = mysqli_query($conexion, $sql);
        $registro = mysqli_fetch_assoc($query);

        if (!isset($_SESSION['carrito'])){
            //Array del nuevo producto
            $producto[] = array(
            'id_art' => $registro['id_articulo'],
            'img_art' => $registro['imagen'],
            'nom_art' => $registro['nombre'],
            'precio' => $registro['precio'],
            'stock' => $registro['stock'],
            'cantidad' => 1);

            $_SESSION['carrito'] = $producto;
        }else{
            $carrito = $_SESSION['carrito'];
            //Si el producto con el id de la url no existe se agrega el nuevo producto al array//
            if(!existeProducto($id)){
                $nuevo_producto = array(
                'id_art' => $registro['id_articulo'],
                'img_art' => $registro['imagen'],
                'nom_art' => $registro['nombre'],
                'precio' => $registro['precio'],
                'stock' => $registro['stock'],
                'cantidad' => 1);
                array_push($carrito, $nuevo_producto);
                $_SESSION['carrito'] = $carrito;
            }else{
                //Caso contrario se suma 1 a la cantidad//
                sumarProducto($id);
            }
        }
}

?>