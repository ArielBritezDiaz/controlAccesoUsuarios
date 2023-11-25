<?php
session_start();
include("conexion.php");

if(isset($_POST['publicar'])){
    // Datos traidos del formulario //
    $nombre = $_POST['articulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $color = $_POST['color'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];

    // Subir imagen del producto //
    if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
        $dir_temporal = $_FILES['imagen']['tmp_name'];
        $nbr_image = time().'_artcicle.jpg';
        $upload = move_uploaded_file($dir_temporal,'src/images/articles/'.$nbr_image);
    }

    // Insertar articulo con los datos del formulario //
    $insert = "INSERT INTO articulos(nombre, descripcion, precio, stock, imagen, categoria, color, estado) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$nbr_image', '$categoria', '$color', '$estado')";

    $query = mysqli_query($conexion, $insert);

    // Redirigir a inicio
    if($query){
        echo '<script>alert("Articulado publicado")</script>';
        header("location: inicio.php");
        exit();
    }else{
        echo '<script>alert("No se pudo publicar el articulo")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Nav css -->
    <link rel="stylesheet" href="styles/components/nav.css">
    <!-- Footer -->
    <link rel="stylesheet" href="styles/components/footer.css">
    <!-- Publish article -->
    <link rel="stylesheet" href="styles/publicar.css">

    <!-- Montserrat font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Jura font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jura&family=Roboto:wght@900&family=Ysabeau+SC:wght@500&display=swap" rel="stylesheet">

    <title>Publicar articulo</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    ?>
    <section class="article">
        <div class="title">
            <p class="titleTxt"> de </p>
            <hr>
        </div>
        <form action="" method="POST" enctype="multipart/form-data" >
            <!-- Campos a la izquierda -->
            <div class="container">
                <div class="left">
                <input type="text" name="articulo" placeholder="Nombre del articulo" min="5" max="30" pattern=".{5,30}" required class="name">
                <!-- <input type="text" name="descripcion" placeholder="Descripcion del articulo" max="100" pattern=".{0,100}"> -->
                <textarea class="description" cols="30" rows="10" name="descripcion" max="100" pattern=".{0,100}" placeholder="Descripcion del articulo"></textarea>
                <input type="number" name="precio" placeholder="Precio" min="1" max="1000000000" required class="price">
                <input type="number" name="stock" placeholder="Stock" min="1" max="100000" required class="stock">
                </div>
                <!-- Campos a la derecha -->
                <div class="right">
                <!-- Color del articulo -->
                <select name="color" class="selects">
                    <option disabled selected value="">Color del articulo</option>
                    <option value="azul">Azul</option>
                    <option value="rojo">Rojo</option>
                    <option value="verde">Verde</option>
                    <option value="amarillo">Amarillo</option>
                    <option value="violeta">Violeta</option>
                    <option value="gris">Gris</option>
                    <option value="negro">Negro</option>
                    <option value="blanco">Blanco</option>
                    <option value="naranja">Naranja</option>
                    <option value="varios">Varios</option>
                    <option value="ninguno">Ninguno</option>
                </select>
                <!-- Categoria del articulo -->
                <select name="categoria" class="selects">
                    <option disabled selected value="">Categoria del articulo</option>
                    <option value="auto">Auto</option>
                    <option value="moto">Moto</option>
                    <option value="formula">Formula</option>
                    <option value="varias">Varias</option>
                    <option value="ninguna">Ninguna</option>
                </select>
                <!-- Estado del articulo -->
                <select name="estado" class="selects">
                    <option disabled selected value="">Estado del articulo</option>
                    <option value="nuevo">Nuevo</option>
                    <option value="usado">usado</option>
                    <option value="ninguno">Ninguno</option>
                </select>
                <label for="imagen">
                    <img src="src/images/uploadImage.png" id="previewImage" class="upload" style="cursor:pointer">
                </label>
                <input type="file" name="imagen" accept="image/*" id="imagen" style="display:none" required>
                </div>
            </div>
            <input type="submit" value="Publicar articulo" name="publicar" class="publish">
        </form>
    </section>
    <?php
    include("includes/footer.php");
    ?>
    <!-- Preview image js -->
    <script src="js/previewImage.js"></script>
</body>
</html>