import Splide from "@splidejs/splide";
import '../css/splide.css';

export default function laravelSplide(options = {}) {
    return {
        init() {
            const laravelSplide = new Splide(".splide", options);

            laravelSplide.mount();
        }
    };
}
