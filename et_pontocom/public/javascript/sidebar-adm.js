document.addEventListener("DOMContentLoaded", function () {
    const menuItems = document.querySelectorAll(".menu-links li a");

    if (menuItems.length === 0) {
        console.error("Nenhum item do menu encontrado! Verifique o HTML.");
        return;
    }

    menuItems.forEach(item => {
        item.addEventListener("click", function (event) {
            event.preventDefault(); // Impede que a página recarregue ao clicar no link

            // Remove a classe 'active' de todos os links
            menuItems.forEach(link => link.classList.remove("active"));

            // Adiciona a classe 'active' ao link clicado
            this.classList.add("active");
        });
    });

    console.log("Sidebar JavaScript carregado com sucesso!");
});
