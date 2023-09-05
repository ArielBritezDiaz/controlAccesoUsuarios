<?php
include("conexion.php");

$usuarioForm = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

$contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);

function redimensionarImg($image, $medidaFinal) {
    list($anchoOriginal, $alturaOriginal, $nroTipo) = getimagesize($image);

    switch($nroTipo) {
        case 2: 
            $imageOriginal = imagecreatefromjpeg($image);
            break;
        case 3:
            $imageOriginal = imagecreatefrompng($image);
            break;
    }

    if($anchoOriginal > $alturaOriginal){
        $anchoFinal = $medidaFinal;
        $aspecto = $anchoOriginal / $alturaOriginal;
        $altoFinal = $anchoFinal / $aspecto;

    } else{
        $altoFinal = $medidaFinal;
        $aspecto = $anchoOriginal / $alturaOriginal;
        $anchoFinal = $altoFinal * $aspecto;
    }

    $nuevaImagen = imagecreateTrueColor($anchoFinal, $altoFinal);
    
    imagecopyresampled($nuevaImagen, $imageOriginal, 0, 0, 0, 0, $anchoFinal, $altoFinal, $anchoOriginal, $alturaOriginal);
    
    imagedestroy($imageOriginal);

    $calidad = 100;

    $nombreImagen = time().'_'.$image;

    imagejpeg($nuevaImagen, "imagenes/$nombreImagen", $calidad);

    return $nombreImagen;
}

if(is_uploaded_file($_FILES['imagen']['tmp_name'])) {
    $dirFoto = $_FILES['imagen']['tmp_name'];   
    $nameFoto = $_FILES['imagen']['name'];

    move_uploaded_file($dirFoto, $nameFoto);

    $imagen = redimensionarImg($nameFoto, 100, 100);
    unlink($nameFoto);
} else {
    $imagen = "./si.png";
}

$sql = "INSERT INTO usuarios(Nbr_u, Img_u, Pass_u) VALUES ('$usuarioForm', '$imagen', '$contrasenia')";
$consultaInsertar = mysqli_query($conexion, $sql);

echo "
    <div>
        <p>Nombre: '$usuarioForm'</p>
        <p>Contraseña: '$contrasenia'</p>
        <img src='imagenes/$imagen'></img>
    </div>"
;

?>