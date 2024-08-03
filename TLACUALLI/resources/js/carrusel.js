document.addEventListener("alpine:init", () => {
    Alpine.data("imageSlider", () => ({
        currentIndex: 1,
        images: [
            "https://sustentavel.com.br/wp-content/uploads/2018/07/composto.jpg",
            "https://www.ull.es/portal/agenda/wp-content/uploads/sites/12/2022/09/Campustajes_Banner-eventos-nuevo.png",
            "https://concytep.gob.mx/wp-content/uploads/2024/02/banner_becas_tesis-scaled.jpg",
        ],
        previous() {
            if (this.currentIndex > 1) {
                this.currentIndex = this.currentIndex - 1;
            }
        },
        forward() {
            if (this.currentIndex < this.images.length) {
                this.currentIndex = this.currentIndex + 1;
            }
        },
    }));
});