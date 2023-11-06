<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Nav font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/inicio.css">
    <title>Inicio</title>
</head>
<body>
    <?php
    include("includes/nav.php");
    include("includes/header.php");
    ?>
    <section class="categories" id="categories">
        <article class="cars">
            <p class="autos">utos</p>
            <a href="#"><img src="src/images/categories/cars.png"></a>
        </article>
        <article class="motorbike">
            <p class="motos">otos</p>
            <a href="#"><img src="src/images/categories/motorbike.png"></a>
            </article>
        <article class="formula">
            <p class="form">ormula</p>
            <a href="#"><img src="src/images/categories/formula.png"></a>
        </article>
    </section>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>