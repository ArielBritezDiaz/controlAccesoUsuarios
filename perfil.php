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
        <!-- <input type="submit" name="upload" value="Actualizar foto" class="send"> -->
    </form>
    
    <?php

    if(isset($_SESSION['usuario'])){
        echo '<div class="edit">';

        //Editar el nuevo nombre//
        if(isset($_GET['edit'])){
            $id_edit = $_SESSION['ID_u'];
            $sql = "SELECT * FROM usuarios WHERE ID_u = '$id_edit'";
            $buscarRegistro = mysqli_query($conexion, $sql);
            $registro = mysqli_fetch_assoc($buscarRegistro);

            echo '<form action="" method="POST">
            <input type="text" placeholder='.$_SESSION['usuario'].' pattern=".{8,}" min="8" required name="usuario" class="editUser">
            <input type="submit" value="Actualizar nombre" name="actualizar" style="cursor:pointer" class="sendUser">
            </form>
            <a href="perfil.php?cancel" class="cancel">
                <img src="src/images/mark.svg">
            </a>';
            if(isset($_GET['cancel'])){
                header('Location: perfil.php');
            exit();
            }
        }else{
        echo '<p class="userName">'.$_SESSION['usuario'].'</p>';
        echo '<a href="perfil.php?edit"><img src="src/images/pencil.svg" class="pencil" title="Editar nombre"></a>
        </div>';
        }

        //Ejecutar la modificacion de nombre//
        if(isset($_POST['actualizar'])){
            $nombre = $_POST['usuario'];
            $sql2 = "UPDATE usuarios SET Nbr_u = '$nombre' WHERE ID_u = '$id_edit'";
            $editar = mysqli_query($conexion, $sql2);
            //Actualizamos en nuevo nombre en la pagina
            if($editar){
                $_SESSION['usuario'] = $nombre;
                //Recargamos la pagina//
                header('Location: perfil.php');
            exit();
            }
        }

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
        <p class="published">Mis compras</p>
        <hr class="divisor">';
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