function close_popup(id) {
    var object = document.getElementById(id);
    if (object.style.display == 'block') {
        object.style.display = '';
    }
}

function open_popup(id) {
    window.scrollTo(0, 0);
    var object = document.getElementById(id);
    if (object.style.display == '') {
        object.style.display = 'block';
    }
}

