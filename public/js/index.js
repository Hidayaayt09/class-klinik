$(document).ready(function () {
    // toggle menu ------
    const $toggleBtn = $('#toggleMenu');
    const $navbar = $('#navigation');
    const $navbarOpen = 'navbar--open';
    const $navbarItem = $('.navbar__item');

    $toggleBtn.on('click', function (e) {
        $navbar.toggleClass($navbarOpen);
        e.preventDefault();
    });
    $($navbarItem).on('click', () => $navbar.removeClass($navbarOpen));
    // end toggle menu ------

    // slick slider ------
    const $slickWrapper = $('.testimonials__list');
    $($slickWrapper).slick({
        dots: true
    });
    // end slick slider ------
});