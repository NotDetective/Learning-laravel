// console.log('model.js loaded .........');

const openModel = (id, forced) => {
    const dialog = document.querySelector('#'+ id);
    dialog.showModal();
    if(forced){
        dialog.addEventListener('cancel', (event) => {
            event.preventDefault();
        });
    }
}

const closeModel = (id) => {
    const dialog = document.querySelector('#'+ id);
    dialog.close();
}
