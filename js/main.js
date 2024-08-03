import words from './words.js'
import Modal from './modal.js'

document.addEventListener("DOMContentLoaded", () => {
    words()
    new Modal();

    Array.from(document.getElementsByClassName('quote-delete')).forEach(el => {
        el.addEventListener('click', () => {
            
        })
    })
});
