var button = document.querySelector('.menu_button');
var buttonClose = document.querySelector('.close');
var navMenu = document.querySelector('#navPanel');
var overlay = document.querySelector('main');


button.addEventListener('click', function (e) {
    e.preventDefault();
    if (navMenu.className == "navPanel visible") {
        navMenu.className = "navPanel";
    } else {
        navMenu.className = "navPanel visible";
    }
});
overlay.addEventListener('click', function (e) {
    e.preventDefault();
    if (navMenu.className == "navPanel visible") {
        navMenu.className = "navPanel";
    }
});
buttonClose.addEventListener('click', function (e) {
    e.preventDefault();
    if (navMenu.className == "navPanel visible") {
        navMenu.className = "navPanel";
    }
});
