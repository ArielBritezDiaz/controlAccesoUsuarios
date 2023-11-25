document.getElementById('imagen').addEventListener('change', function (event) {
    var preview = document.getElementById('previewImage');
    var file = event.target.files[0];
    
    if (file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        preview.src = 'src/images/uploadImage.png'; // Imagen por defecto si no se selecciona ninguna
    }
});