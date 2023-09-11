console.log('model.js loaded .........');

const openModel = (id) => {
    const dialog = document.querySelector('#'+ id);
    dialog.show();
}

const closeModel = (id) => {
    const dialog = document.querySelector('#'+ id);
    dialog.close();
}
