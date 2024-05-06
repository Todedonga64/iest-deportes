const open = document.getElementById('open');
const modal_container = document.getElementById('modal_container');
const close = document.getElementById('close');

open.addEventListener('click', () => {
    modal_container.classList.add('show');
});

close.addEventListener('click', () => {
    modal_container.classList.remove('show');
});

async function form_enviarsoli(e){ 
    e.preventDefault();
    const email = document.querySelector('input[name="email"]').value;
    const tel = document.querySelector('input[name="tel"]').value;
    const deporte = document.querySelector('select[name="deporte"]').value;
    const motivo = document.querySelector('select[name="motivo"]').value;
    const contenido = document.querySelector('textarea[name="contenido"]').value;

    Swal.fire({
        title: 'titulo!',
        html: 'Consultando datos...',
        footer: '<p class="color-grisBajo no-margin">No cierre la página</p>',
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        customClass: {
            popup: 'swal',
        },
        didOpen: () => {
            Swal.showLoading();
            enviarSolicitud(email, tel, deporte, motivo, contenido);
        }
    });
}

async function enviarSolicitud(email, tel, deporte, motivo, contenido) {
    const datos = new FormData();
    datos.append('email', email);
    datos.append('tel', tel);
    datos.append('deporte', deporte);
    datos.append('motivo', motivo);
    datos.append('contenido', contenido);

    const url = 'botonenviar.php'; // La URL a la que enviarás los datos del formulario
    const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
    });

    const resultado = await respuesta.json();
    if (resultado.success) {
        Swal.fire({
            icon: 'success',
            text: resultado.message,
            timer: 1500,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                popup: 'swalalert',
            },
            didClose:()=>{
                window.location="http://localhost/alumno/alumno_index.php"
            }
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: resultado.message,
            customClass: {
                popup: 'swalalert',
            },
            confirmButtonText: 'Entiendo',
            
        });
    }
}