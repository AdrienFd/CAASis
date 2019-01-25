//Manage the navigation menu
var button = document.querySelector('.menu_button');
var buttonClose = document.querySelector('.close');
var navMenu = document.querySelector('#navPanel');

//var MainOverlay = document.querySelector('#mainOverlay');
var HeaderOverlay = document.querySelector('#headerOverlay');

var form = document.querySelector('.form');
var connectForm = document.querySelector('.connect');
var registerForm = document.querySelector('.register');


//Open the form on click
connectForm.addEventListener('click', function (e) {
    e.preventDefault();
    if (form.style.display == 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'block';
    }
});



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
/*HeaderOverlay.addEventListener('click', function (e) {
    e.preventDefault();
    if (navMenu.style.display == 'block') {
        navMenu.style.display = 'none';
    }
});*/

//Close the menu
MainOverlay.addEventListener('click', function (e) {
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