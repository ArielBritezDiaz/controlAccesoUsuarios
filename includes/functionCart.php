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

//Mostrar carrito con productos//
function mostrarCarrito(){
    $carrito = $_SESSION['carrito'];
    $total = 0;
    echo '<div class="title">
    <p>Carrito de compras</p>
    <a href="cart.php?vaciar"><i class="fa-solid fa-trash-can" style="color: #0C0C0F;"></i></a>
    </div>
    <hr class="divisorItem">';
    foreach($carrito as $index => $producto){
        echo '<div class="articles">
                <img src=src/images/articles/'.$producto['img_art'].'>
                <p class="article">'.$producto['nom_art'].'</p>
                <p class="counter"><a href="cart.php?id_sumar='.$producto['id_art'].'" class="add">+</a>'.$producto['cantidad'].'<a href="cart.php?id_restar='.$producto['id_art'].'" class="sub">-</a></p>
                <p class="price">$'.number_format($producto['precio'], 2, ',' , '.').'</p>
                <hr class="divisorPrice">
                <p class="subtotal">$'.number_format($producto['cantidad'] * $producto['precio'], 2, ',','.').'</p>
                <div class="footer">
                <a href="cart.php?id_borrar='.$producto['id_art'].'" class="eliminar">Eliminar</a>
                <a href="inicio.php" class="follow">Seguir Comprando</a>
                </div>
            </div>
            <hr class="divisorItem">';
            $total = $total + $producto['cantidad'] * $producto['precio'];
    }
    echo '<div class="total">
            <p>$'.number_format($total, 2, ',', '.').'</p>
            <hr>
            <a href="inicio.php?fin_compra"
            onClick="return confirm(\'¿Desea proceder a comprar?\')" class="comprar">Finalizar Compra</a>
        </div>';
}

//Mostrar carrito vacio//
function mostrarCarritoVacio(){
    echo '<div class="carritoVacio">
        <img class="carrito" src="src/images/cart.svg">
        <div class="txt">
        <p>El carrito de compras esta</p>
        <a href="inicio.php">Ir a la tienda</a>
        </div>
        </div>';
}

//Verificar si existe o no un producto que ya fue enviado al carrito//
function existeProducto($id){
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $indice => $producto) {
        if($producto['id_art']== $id){
            return true;
        }
    }
}

//Sumar producto +//
function sumarProducto($id){
    $carrito = $_SESSION['carrito'];
    foreach($carrito as $indice => $producto){
        if($producto['id_art'] == $id){
            if($producto['cantidad'] < $producto['stock']){
                $carrito[$indice]['cantidad']++;
            }
        }
    }
    $_SESSION['carrito'] = $carrito;
}

//Restar producto -//
function restarProducto($id){
    $carrito = $_SESSION['carrito'];
    foreach($carrito as $indice => $producto){
        if($producto['id_art'] == $id){
            if($producto['cantidad'] > 1){
                $carrito[$indice]['cantidad']--;
            }
        }
    }
    $_SESSION['carrito'] = $carrito;
}

//Vaciar carrito//
function vaciarCarrito(){
    unset($_SESSION['carrito']);
}

//Borrar productos//
function borrarProducto($id){
    $carrito = $_SESSION['carrito'];
    foreach($carrito as $indice => $producto){
        if($producto['id_art'] == $id){
            unset($carrito[$indice]);
        }
    }
    if(count($carrito) > 0){
        $_SESSION['carrito'] = $carrito;
    }
    else{
        unset($_SESSION['carrito']);
    }
}

?>