const hamburger = document.querySelector(".navbar__list");
const navMenu = document.querySelector(".navbar__item");
const navLink = document.querySelectorAll(".navbar__link");

hamburger.addEventListener("click", mobileMenu);
navLink.forEach(n => n.addEventListener("click", closeMenu));

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}