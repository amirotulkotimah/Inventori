document.querySelector(".btn-upload-foto").addEventListener('change', function (e) {
    const imgFile = e.target.files[0];
    previewFoto(imgFile);
});

function previewFoto(file) {
    const imagePreviewer = document.querySelector('.preview-foto');
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function (readerEvent) {
        imagePreviewer.src = readerEvent.target.result;
    }
}