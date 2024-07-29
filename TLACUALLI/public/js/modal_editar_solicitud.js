document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("button[id^='openModalES']").forEach(button => {
        const id = button.id.replace("openModalES", "");
        const modal = document.getElementById(`modalES${id}`);
        const closeButton = document.getElementById(`closeModalES${id}`);

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
