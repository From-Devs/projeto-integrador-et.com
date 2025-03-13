
document.addEventListener("DOMContentLoaded", function () {

    const buttonsIcon = document.querySelectorAll(".button_sub");

    buttonsIcon.forEach(buttonIcon => {
        buttonIcon.addEventListener("click", function (event) {
            event.stopPropagation();
            const categoria = this.parentElement.parentElement;
            const submenu = categoria.querySelector(".submenu");
            const icon = this.querySelector("i");

            if (!submenu) return; // Se não houver submenu, sair

            // Fechar outros submenus ao abrir um novo
            document.querySelectorAll(".categoria").forEach(item => {
                if (item !== categoria) {
                    item.classList.remove("active"); // Remove a cor de fundo dos outros
                    const otherSubmenu = item.querySelector(".submenu");
                    const otherIcon = item.querySelector(".button_sub i");

                    if (otherSubmenu) otherSubmenu.style.display = "none";
                    if (otherIcon) {
                        otherIcon.classList.remove("open");
                    }
                }
            });

            // Alternar submenu e cor de fundo
            const isActive = categoria.classList.contains("active");
            categoria.classList.toggle("active");
            submenu.style.display = isActive ? "none" : "block";

            // Trocar ícone da seta
            if (icon) {
                if (isActive) {
                    icon.classList.remove("open");
                } else {
                    icon.classList.add("open");
                }
            }
        });
    });
});