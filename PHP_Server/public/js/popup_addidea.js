var object = document.querySelector('#addIdea');

function close_popup() {
    if (object.style.display == 'block') {
        object.style.display = '';
    }
}

function open_popup() {
    if (object.style.display == '') {
        object.style.display = 'block';
    }
}

