import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.data('tiltCard', () => ({
    rotateX: 0,
    rotateY: 0,
    tilt(event) {
        const rect = this.$el.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;
        this.rotateX = ((y - rect.height / 2) / (rect.height / 2)) * -8;
        this.rotateY = ((x - rect.width / 2) / (rect.width / 2)) * 8;
    },
    reset() {
        this.rotateX = 0;
        this.rotateY = 0;
    },
}));

Alpine.start();
