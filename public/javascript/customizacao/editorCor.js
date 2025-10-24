document.querySelectorAll(".editCor").forEach((item) => {
    const colorInput = item.querySelector(".corShow");
    const hexInput = item.querySelector(".corHex");

    // --- Funções principais ---
    const syncFromColor = () => {
        if (hexInput.value !== colorInput.value) {
            hexInput.value = colorInput.value.toUpperCase();
        }
    };

    const syncFromHex = () => {
        if (colorInput.value !== hexInput.value && /^#[0-9A-Fa-f]{6}$/.test(hexInput.value)) {
            colorInput.value = hexInput.value;
        }
    };

    // --- Eventos manuais ---
    colorInput.addEventListener("input", syncFromColor);

    // Previne apagar o "#" e valida caracteres
    hexInput.addEventListener("keydown", (e) => {
        // Impede apagar o "#"
        if (
            (e.key === "Backspace" && hexInput.selectionStart <= 1) ||
            (e.key === "Delete" && hexInput.selectionStart === 0)
        ) {
            e.preventDefault();
        }
    });

    // Garante que sempre tenha "#" no começo
    hexInput.addEventListener("input", () => {
        let value = hexInput.value;

        // Recoloca o "#"
        if (!value.startsWith("#")) value = "#" + value.replace(/#/g, "");

        // Remove caracteres inválidos (só A-F e 0-9)
        value = "#" + value.slice(1).replace(/[^0-9A-Fa-f]/g, "");

        hexInput.value = value.toUpperCase();

        // Sincroniza com o input de cor
        syncFromHex();
    });

    // --- Observadores automáticos (mudanças via backend/JS) ---
    const observerConfig = { attributes: true, attributeFilter: ["value"] };
    const colorObserver = new MutationObserver(syncFromColor);
    const hexObserver = new MutationObserver(syncFromHex);

    colorObserver.observe(colorInput, observerConfig);
    hexObserver.observe(hexInput, observerConfig);

    // --- Garante sincronização inicial ---
    if (!hexInput.value.startsWith("#")) {
        hexInput.value = "#" + hexInput.value;
    }
    syncFromColor();
});