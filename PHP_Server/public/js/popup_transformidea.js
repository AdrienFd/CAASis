function close_popup_transform(id) {
    var object = document.getElementById(id);
    if (object.style.display == 'block') {
        object.style.display = '';
    }
}

function open_popup_transform(id) {
    window.scrollTo(0, 0);
    var object = document.getElementById(id);
    if (object.style.display == '') {
        object.style.display = 'block';
    }
}

