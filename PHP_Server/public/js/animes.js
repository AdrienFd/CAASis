//Manage the navigation menu
var button = document.querySelector('.menu_button');
var buttonClose = document.querySelector('.close');
var navMenu = document.querySelector('#navPanel');
var overlay = document.querySelector('main');

//Slider for the proce in the shop
var slider = document.getElementById("myRange");
var output = document.getElementById("max_price");

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

//Update the value of the max price (slider)
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
