import Splide from "@splidejs/splide";

export default function laravelSplide(options = {}) {
    return {
        init() {
            const laravelSplide = new Splide(this.$el, options);

            laravelSplide.mount();
        }
    };
}
