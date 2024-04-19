const container = document.querySelector('.container');
const button = document.getElementById('icon');
const sidebar = document.querySelector('.sidebar');
const backdrop = document.querySelector('.backdrop');

button.addEventListener('click', function () {
    sidebar.classList.add('show')
    container.classList.add('move');
    backdrop.classList.add('show');
})

backdrop.addEventListener('click', function () {
    sidebar.classList.remove('show')
    container.classList.remove('move');
    backdrop.classList.remove('show');
})

//VENTANA POPUP MODAL 1 
const abrirmodal = document.querySelector('.btn-abrirmodal');
const cerrarmodal = document.querySelector('.btn-cerrar');
const modal = document.querySelector('.modal');

abrirmodal.addEventListener('click', ()=>{modal.showModal()});
cerrarmodal.addEventListener('click', ()=>{modal.close()});

//VENTANA POPUP MODAL 2 
const abrirmodal2 = document.querySelector('.btn-abrirmodal2');
const cerrarmodal2 = document.querySelector('.btn-cerrar2');
const modal2 = document.querySelector('.modal2');

abrirmodal2.addEventListener('click', ()=>{modal2.showModal()});
cerrarmodal2.addEventListener('click', ()=>{modal2.close()});