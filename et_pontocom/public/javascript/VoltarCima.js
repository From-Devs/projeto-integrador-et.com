document.addEventListener("DOMContentLoaded", function () {
    const VoltarInicio = document.getElementById("VoltarInicio");

    window.onscroll = function () {
        if (document.documentElement.scrollTop > 100) {
            VoltarInicio.style.display = "block";
        } else {
            VoltarInicio.style.display = "none";
        }
    };

    VoltarInicio.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});