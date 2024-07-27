document.addEventListener("DOMContentLoaded", function () {
    // Botones para abrir el modal
    const openModalBtns = document.querySelectorAll("a[data-modal-target]");
    // Modal
    const modal = document.getElementById("modalEditarSolicitud");
    // Botones para cerrar el modal
    const closeModalBtns = document.querySelectorAll("#closeModalEditar");

    // Abre el modal y carga el formulario
    openModalBtns.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            event.preventDefault();
            const url = this.getAttribute("href");
            const form = document.getElementById("formEditarSolicitud"); // Asegúrate de que el formulario tenga este id
            if (form) {
                form.action = url;
            }
            modal.classList.remove("hidden");
        });
    });

    // Cierra el modal al hacer clic en el botón de cerrar
    closeModalBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            modal.classList.add("hidden");
        });
    });

    // Cierra el modal al hacer clic fuera del contenido del modal
    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
});
