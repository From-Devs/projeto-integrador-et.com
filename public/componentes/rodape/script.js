document.addEventListener("DOMContentLoaded", function () {
    const VoltarInicio = document.querySelector(".VoltarInicio");

    VoltarInicio.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});