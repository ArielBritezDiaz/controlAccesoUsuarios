<?php
include("conexion.php");
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
    <title>Publicar articulo</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    ?>
    <section class="article">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="1">Nombre del articulo</label>
            <input type="text" name="articulo" placeholder="Nombre del articulo" min="5" max="30" pattern=".{5,30}" id="1" required>
            <label for="2">Descripcion del articulo</label>
            <input type="text" name="descripcion" placeholder="Descripcion del articulo" max="100" pattern=".{0,100}" id="2">
            <label for="3">Precio del articulo</label>
            <input type="number" name="precio" placeholder="Precio del articulo" min="1" max="1000000000" id="3" required>
            <label for="4">Stock</label>
            <input type="number" name="stock" placeholder="Stock" min="1" max="100000" id="4" required>
            <label for="5" style="cursor:pointer">Imagen del articulo
                <i class="fa-solid fa-cloud-arrow-up" style="color: #e01111;"></i>
            </label>
            <input type="file" name="imagen" accept="image/*" id="5" style="display:none" required>
            <input type="submit" value="Publicar" name="publicar">
        </form>
    <?php
        if(isset($_POST['publicar'])){
            // Datos traidos del formulario //
            $nombre = $_POST['articulo'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];

            // Subir imagen del producto //
            if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                $dir_temporal = $_FILES['imagen']['tmp_name'];
                $nbr_image = time().'_artcicle.jpg';
                $upload = move_uploaded_file($dir_temporal,'src/images/articles/'.$nbr_image);

                // echo '<img src="src/images/articles/'.$nbr_image.'" class="foto">';
            }

            // Insertar articulo con los datos del formulario //
            $insert = "INSERT INTO articulos(nombre, descripcion, precio, stock, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$stock', '$nbr_image')";

            $query = mysqli_query($conexion, $insert);

            echo '<script>alert("Articulado publicado")</script>';
        }
    ?>
    </section>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>
<?php
header("location : inicio.php");
?>