var navMenu = document.querySelector('#navPanel');


function open_menu() {
    if (navMenu.style.display == 'none') {
        navMenu.style.display = 'block';
    } else {
        navMenu.style.display = 'block';
    }
};

function close_menu() {
    if (navMenu.style.display == 'block') {
        navMenu.style.display = 'none';
    }
};