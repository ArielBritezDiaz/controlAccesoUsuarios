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
    <title>Publicacion</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
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