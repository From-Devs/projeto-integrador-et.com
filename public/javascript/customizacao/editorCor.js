document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll(".editCor").forEach((item) => {
        const colorInput = item.querySelector(".corShow");
        const hexInput = item.querySelector(".corHex");

        // --- Flag de bloqueio ---
        let isSyncing = false;

        // --- Funções principais ---
        const syncFromColor = () => {
            if (isSyncing) return;
            isSyncing = true;

            hexInput.value = colorInput.value.toUpperCase();
            // Dispara evento pro HEX se atualizar visualmente
            hexInput.dispatchEvent(new Event("input", { bubbles: true }));

            isSyncing = false;
        };

        const syncFromHex = () => {
            if (isSyncing) return;

            const value = hexInput.value;
            // Só atualiza se for um HEX válido completo
            if (/^#[0-9A-Fa-f]{6}$/.test(value)) {
                isSyncing = true;
                colorInput.value = value;
                colorInput.dispatchEvent(new Event("input", { bubbles: true }));
                isSyncing = false;
            }
        };

        // --- Eventos manuais ---
        colorInput.addEventListener("input", syncFromColor);

        // Previne apagar o "#" e valida caracteres
        hexInput.addEventListener("keydown", (e) => {
            if (
                (e.key === "Backspace" && hexInput.selectionStart <= 1) ||
                (e.key === "Delete" && hexInput.selectionStart === 0)
            ) {
                e.preventDefault();
            }
        });

        // Garante "#" e valida formato em tempo real
        hexInput.addEventListener("input", () => {
            let value = hexInput.value;

            // Recoloca o "#"
            if (!value.startsWith("#")) value = "#" + value.replace(/#/g, "");

            // Remove caracteres inválidos
            value = "#" + value.slice(1).replace(/[^0-9A-Fa-f]/g, "");
            hexInput.value = value.toUpperCase();

            // Se for HEX completo (ex: #AABBCC), sincroniza
            if (/^#[0-9A-Fa-f]{6}$/.test(hexInput.value)) {
                syncFromHex();
            }
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
});