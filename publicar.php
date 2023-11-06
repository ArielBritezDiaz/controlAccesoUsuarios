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
        <form action="inicio.php" method="GET">
            <label for="1">Nombre del articulo</label>
            <input type="text" name="articulo" placeholder="Nombre del articulo" min="5" max="30" pattern=".{5,30}" id="1">
            <label for="2">Descripcion del articulo</label>
            <input type="text" name="descripcion" placeholder="Descripcion del articulo" max="100" pattern=".{0,100}" id="2">
            <label for="3">Precio del articulo</label>
            <input type="number" name="precio" placeholder="Precio del articulo" min="0.1" max="1000000000" id="3">
            <label for="4">Stock</label>
            <input type="number" name="stock" placeholder="Stock" min="1" max="100000" id="4">
        </form>
    </section>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>