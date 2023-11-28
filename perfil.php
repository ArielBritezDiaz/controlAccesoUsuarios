<?php
session_start();
include("conexion.php");
require_once("includes/showArticles.php");
require_once("includes/functionCart.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Nav css -->
    <link rel="stylesheet" href="styles/components/nav.css">
    <!-- Footer css -->
    <link rel="stylesheet" href="styles/components/footer.css">
    <!-- Profile css -->
    <link rel="stylesheet" href="styles/profile.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">
    <title>Perfil</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    ?>
    <section>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="imagen">
            <img src="src/images/defaultCar.png" id="previewImage" class="picture" title="Actualizar foto" style="cursor:pointer">
        </label>
        <input type="file" name="imagen" id="imagen" accept="image/*" id="1" style="display:none" required>
        <label for="1">
            <?php
            if(isset($_POST['upload'])){
                // Subir imagen de perfil //
                if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                    $dir_temporal = $_FILES['imagen']['tmp_name'];
                    $nbr_image = time().'_picture.jpg';
                    $upload = move_uploaded_file($dir_temporal,'src/images/pictures/'.$nbr_image);
                }
            }
            ?>    
    </label>
    </form>
    <?php

    if(isset($_SESSION['usuario'])){
        echo '<p class="userName">'.$_SESSION['usuario'].'</p>';
    }
    ?>
    <div class="summaryContainer">
        <div class="publishing">
        <?php
        echo '<div class="rotate">
        <p class="published">Articulos publicados</p>
        <hr class="divisor">
        </div>';
            showPublishing($_SESSION['ID_u']);
        ?>
    </div>
    <?php
    
    //Eliminar articulo desde el perfil
    if(isset($_GET['id_eliminar_articulo'])){
        deleteArticle($_GET['id_eliminar_articulo']);
    }
    ?>  <hr class="divisorLine">
        <div class="purchases">
        <?php
        echo '
        <div class="rotate">
        <p class="publishedt">Mis compras</p>
        <hr class="divisor">
        </div>';
        showPurchases($_SESSION['ID_u']);
        ?>
        </div>
    </div>
    
    </section>
    <?php
    include("includes/footer.php");
    ?>
    <!-- Preview image js -->
    <script src="js/previewImage.js"></script>
</body>
</html>