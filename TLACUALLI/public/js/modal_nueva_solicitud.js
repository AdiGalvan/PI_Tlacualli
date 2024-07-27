document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modalNS");
    const openButton = document.getElementById("openModalNS");
    const closeButton = document.getElementById("closeModalNS");
    const form = document.getElementById("solicitudForm");

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
        // Limpiar mensajes de error antes de validar
        clearErrors();

        const isValid = validateForm();

        if (!isValid) {
            event.preventDefault(); // Prevenir el envío si la validación falla
        }
    });

    function validateForm() {
        let valid = true;

        // Obtener los campos
        const nombre = document.getElementById("nombre");
        const proveedor = document.getElementById("proveedor");
        const descripcion = document.getElementById("descripcion");
        const t_servicio = document.getElementById("t_servicio");
        const fecha = document.getElementById("fecha");

        // Validaciones personalizadas
        if (nombre.value.trim() === "") {
            showError("nombre", "El nombre es requerido.");
            valid = false;
        }

        if (proveedor.value.trim() === "") {
            showError("proveedor", "El proveedor es requerido.");
            valid = false;
        }

        if (descripcion.value.trim() === "") {
            showError("descripcion", "La descripción es requerida.");
            valid = false;
        }

        if (t_servicio.value.trim() === "") {
            showError("t_servicio", "El tipo de servicio es requerido.");
            valid = false;
        }

        if (fecha.value.trim() === "") {
            showError("fecha", "La fecha es requerida.");
            valid = false;
        }

        return valid;
    }

    function showError(fieldId, message) {
        const errorElement = document.getElementById(`error-${fieldId}`);

        // Establecer el contenido del mensaje de error
        errorElement.textContent = message;

        // Aplicar la clase de estilo de error
        errorElement.classList.add("error-message");

        // Opcional: Si quieres agregar alguna clase de error al campo, puedes hacerlo aquí
        const field = document.getElementById(fieldId);
        field.classList.add("error-field"); // Puedes definir esta clase si necesitas cambiar el estilo del campo también
    }

    function clearErrors() {
        // Limpiar los mensajes de error
        document.querySelectorAll(".error-message").forEach((element) => {
            element.textContent = "";
            element.classList.remove("error-message");
        });

        // Opcional: Limpiar las clases de error del campo
        document
            .querySelectorAll(".form-control, .form-select")
            .forEach((element) => {
                element.classList.remove("error-field"); // Solo si usas una clase para el campo
            });
    }
});
