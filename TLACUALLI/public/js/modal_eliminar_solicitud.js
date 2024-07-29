document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("button[id^='openModalElS']").forEach(button => {
        const id = button.id.replace("openModalElS", "");
        const modal = document.getElementById(`modalElS${id}`);
        const closeButton = document.getElementById(`closeModalElS${id}`);

        button.addEventListener("click", function () {
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
    });
});
