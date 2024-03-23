import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var input = window.document.getElementById("image")
var img = window.document.getElementById("img-tag")

if (input && img) {
    input.addEventListener("change", (e) => {
        const [file] = input.files
        if (file) {
            img.src = URL.createObjectURL(file)
        }
    })
    img.addEventListener("click", (e) => { input.click() })
}