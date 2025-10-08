export function initForms() {
    const forms = document.querySelectorAll("form");

    forms.forEach(form => {
        const inputs = form.querySelectorAll("input, textarea, select");
        inputs.forEach(input => {
            input.addEventListener("focus", () => {
                input.style.borderColor = "#1abc9c";
                input.style.boxShadow = "0 0 10px rgba(26,188,156,0.3)";
            });
            input.addEventListener("blur", () => {
                input.style.borderColor = "";
                input.style.boxShadow = "";
            });
        });

        form.addEventListener("submit", () => {
            console.log("Formulaire envoyé !");
        });
    });
}
