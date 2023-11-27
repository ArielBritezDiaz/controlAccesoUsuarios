document.getElementById('imagen').addEventListener('change', function (event) {
    let preview = document.getElementById('previewImage');
    let file = event.target.files[0];
    
    if (file) {
        let reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
});