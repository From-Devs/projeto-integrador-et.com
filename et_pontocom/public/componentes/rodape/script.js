document.addEventListener("DOMContentLoaded", function () {
    const VoltarInicio = document.getElementById("VoltarInicio");


    VoltarInicio.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});