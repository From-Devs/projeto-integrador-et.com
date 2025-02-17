// Carrega o conteúdo do header.html
document.addEventListener("DOMContentLoaded", function() {
    fetch("../componentes/header.php")
        .then(response => response.text())
        .then(data => {
            document.getElementById("header").innerHTML = data;

            // Ativa o menu toggle depois de carregar o header
            const menuToggle = document.getElementById("menu-toggle");
            const navLinks = document.querySelector(".nav-links");

            menuToggle.addEventListener("click", function() {
                navLinks.classList.toggle("show");
            });
        });
});