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
    <a href="cart.php?vaciar"><i class="fa-solid fa-trash-can" style="color: #0C0C0F; font-size:2em;"></i></a>
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
            onClick="return confirm(\'¿Seguro que desea comprar?\')" class="comprar">Finalizar Compra</a>
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
    echo '<script>window.location.hash = "#stay";</script>';
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
    echo '<script>window.location.hash = "#stay";</script>';
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

//Finalizar la compra de productos//
function finalizarCompra(){
    include('conexion.php');
    $carrito = $_SESSION['carrito'];
    $id_user = $_SESSION['ID_u'];
    /*Recorremos el carrito para generar el array de id_prod/precio/cant y para actualizar la disponibilidad de los productos */
    foreach($carrito as $indice => $producto){
        /*genero un vector $order con ID_prod/precio/cantidad separado prod a prod por un espacio en blanco*/
        $order[] = ' '.$producto['id_art'].'/'.$producto['precio'].'/'.$producto['cantidad'];
        /*el espacio en blanco adelante hace que $order[0] quede vacio*/

        /* Actualizo la disponibilidad de cada producto */
        $id_prod = $producto['id_art'];
        $nuevo_stock = $producto['stock'] - $producto['cantidad'];
        $sql_update = "UPDATE articulos SET stock = '$nuevo_stock' WHERE Id_articulo = '$id_prod'";
        $update_stock = mysqli_query($conexion, $sql_update);
    }

    /*Asigno el valor a las variable que utilizare para grabar el registro */
    $fecha = date("Y/m/d");
    $productos = implode($order); //convierto el array $order en un string para guardarlo en la db
    $id_usuario = $_SESSION['ID_u'];

    /*Guardo el registro de orden el la tabal 'orders' */
    $sql = "INSERT INTO pedidos (fecha, articulos, id_usuario) VALUES ('$fecha','$productos','$id_usuario')";
    $insertar = mysqli_query($conexion, $sql);

    /*Si se crea el registro, elimino la variable de session, con lo cual vacio el carrito y muestro mensaje */
    if($insertar){
        unset($_SESSION['carrito']);
        print ('<script>alert("Pedido Generado Exitosamente")</script>');
    }else{
        print ('<script>alert("Error al Generar Pedido")</script>');
    }
}

//Mostrar los pedidos de un usuario
function showPurchases($ID_user){
    include('conexion.php');

    $sql = "SELECT * FROM pedidos WHERE id_usuario = '$ID_user'";
    $query = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($query)>0){
        while($registro=mysqli_fetch_assoc($query)){
            /* muestro Nro de orden y Fecha */
            echo '<details class="details">
            <summary class="summary">Comprado el: '.$registro['fecha'].'</summary>';
            
            /*convierto el campo Article nuevamente en un vector utilizando la funcion explode() */
            $articulos = explode(' ' , $registro['articulos']);
            
            $total = 0;
            for($x=1; $x<count($articulos); $x++){
                    /*utilizando nuevamente la funcion explote() generos las variables para guardar el id_prod, el precio y la cantidad */
                    list($id, $precio, $cant) = explode('/' , $articulos[$x]);

                    /*Con el $id traigo imagen y nombre de producto */
                    $sql2 = "SELECT nombre, imagen FROM articulos WHERE id_articulo = '$id'";
                    $query2 = mysqli_query($conexion, $sql2);
                    $reg_art = mysqli_fetch_assoc($query2);

                    /* muestro detalle de pedido */
                    echo '
                    <div class="detallesPurchases">
                        <div class="nameContainer">
                            <p class="name">'.$reg_art['nombre'].'</p>
                            <img src="src/images/articles/'.$reg_art['imagen'].'" class="img">
                        </div>
                        <div class="data">
                            <hr class="articleDivisor">
                            <p class="precio">'.number_format($precio,2,",",".").'</p>
                            <hr class="articleDivisor">
                            <p class="cant">'.$cant.'</p>
                            <hr class="articleDivisor">
                            <p class="subtotal">'.number_format($precio*$cant,2,",",".").'</p>
                        </div>
                    </div>
                    '; 
                    $total = $total + ($precio*$cant);     
            }
            echo '<div class="totalContainer">
            <p class="total">'.number_format($total,2,",",".").'</p>
            </div>
            ';
            echo '</details>';
        
        }
    }else{
        echo '<p class="empty">No tiene compras hechas</p>';
    }
}


?>