

var form = document.querySelector('.form');

function open_connection() {
    if (form.style.display == '') {
        form.style.display = 'block';
    }
}

function close_login() {
    if (form.style.display == 'block') {
        form.style.display = '';
    }
}
