async function form_login(e){
    e.preventDefault();
    const pass=document.getElementById('pass').value;
    const usuario=document.getElementById('usuario').value;
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
            login(usuario,pass);
        }
    });
}
async function login(usuario,pass) {
    const datos = new FormData();
    datos.append('key', 1);
    datos.append('id_iest', usuario);
    datos.append('contraseña', pass);
    const url = 'http://localhost/peticiones.php?key=1';
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
                window.location="http://localhost/peticiones.php?key=2"
            }
        })
    }else{
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