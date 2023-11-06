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
    <!-- Footer css -->
    <link rel="stylesheet" href="styles/components/footer.css">
    <!-- Profile css -->
    <link rel="stylesheet" href="styles/profile.css">
    <title>Perfil</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    ?>
    <section class="content">
        <div class="user">
            <img src="src/images/userDefault.png" class="picture">
            <a href="#"><i class="fa-solid fa-pencil" style="color: #CC0000;"></i></a>
        </div>
    </section>
    <?php
    if(isset($_SESSION['usuario'])){
        echo '<p>'.$_SESSION['usuario'].'</p>';
    }
    ?>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>