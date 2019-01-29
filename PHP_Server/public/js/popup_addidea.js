var object = document.querySelector('#addIdea');

function close_popup() {
    if (object.style.display == 'block') {
        object.style.display = '';
    }
}

function open_popup() {
    window.scrollTo(0, 0);
    if (object.style.display == '') {
        object.style.display = 'block';
    }
}

