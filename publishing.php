<?php
session_start();
include("conexion.php");
require_once('includes/showArticles.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Section styles -->
    <link rel="stylesheet" href="styles/publishing.css">
    <!-- Nav styles -->
    <link rel="stylesheet" href="styles/components/nav.css">
    <!-- Footer styles -->
    <link rel="stylesheet" href="styles/components/footer.css">

    <!-- Montserrat font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">

    <title>Publicacion</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    ?>

    <!-- Publishing section -->
    <section class="publishing">
    <?php
    if(isset($_GET['id_art'])){
        showArticlePublished($_GET['id_art']);
    }
    ?>
    </section>

    <!-- Footer -->
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>