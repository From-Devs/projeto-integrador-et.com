function previewFile() {
    const preview = document.getElementById("avatarPreview");
    const file = document.getElementById("avatar").files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}