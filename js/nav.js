const nav = document.querySelector('.nav');
const hero = document.querySelector('.hero');
const toggle = document.querySelector('.nav-toggle');

const heroHeight = hero ? hero.offsetHeight : 0;

/* =========================
   STICKY NAV (DESKTOP ONLY)
   ========================= */
window.addEventListener('scroll', () => {

    // På små skärmar ska menyn ALLTID vara sticky (CSS sköter detta)
    if (window.innerWidth <= 900) return;

    if (window.scrollY >= heroHeight) {
        nav.classList.add('sticky');
    } else {
        nav.classList.remove('sticky');

        // Stäng mobilmenyn om man scrollar upp igen
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
    }
});

/* =========================
   HAMBURGER TOGGLE
   ========================= */
toggle.addEventListener('click', () => {
    const isOpen = nav.classList.toggle('open');
    toggle.setAttribute('aria-expanded', isOpen);
});