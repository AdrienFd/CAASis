//Manage the navigation menu
var button = document.querySelector('.menu_button');
var buttonClose = document.querySelector('.close');
var navMenu = document.querySelector('#navPanel');
var overlay = document.querySelector('main');


//Open the menu on click
button.addEventListener('click', function (e) {
    e.preventDefault();
    if (navMenu.style.display == 'none') {
        navMenu.style.display = 'block';
    } else {
        navMenu.style.display = 'block';
    }
});

//Close the menu
overlay.addEventListener('click', function (e) {
    e.preventDefault();
    if (navMenu.style.display == 'block') {
        navMenu.style.display = 'none';
    }
});
//Close the menu
buttonClose.addEventListener('click', function (e) {
    e.preventDefault();
    if (navMenu.style.display == 'block') {
        navMenu.style.display = 'none';
    }
});