import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import AOS from 'aos'; 
import 'aos/dist/aos.css'; 

AOS.init();

function updateCartCounter() {
    fetch(window.routes.cartCount)
        .then(res => res.json())
        .then(data => {
            const counter = document.querySelector('span[data-cart-count]');
            if (counter) counter.textContent = data.count || 0;
        });
}