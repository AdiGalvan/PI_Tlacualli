document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modalNS");
    const openButton = document.getElementById("openModalNS");
    const closeButton = document.getElementById("closeModalNS");
    const form = modal.querySelector("form");

    openButton.addEventListener("click", function () {
        modal.classList.remove("hidden");
    });

    closeButton.addEventListener("click", function () {
        modal.classList.add("hidden");
    });

    modal.addEventListener("click", function (event) {
        if (event.target === this) {
            this.classList.add("hidden");
        }
    });

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            modal.classList.add("hidden");
        }
    });

    form.addEventListener("submit", function (event) {
        if (!form.checkValidity()) {
            event.preventDefault(); // Prevenir el envío si el formulario no es válido
            form.reportValidity(); // Mostrar los mensajes de error predeterminados del navegador

            // Aplicar estilos personalizados si es necesario
            const invalidFields = form.querySelectorAll(":invalid");
            invalidFields.forEach((field) => {
                field.classList.add("border-red-500");
            });
        }
    });
});
