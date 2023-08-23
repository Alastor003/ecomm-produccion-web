const forms_dar = document.querySelectorAll('.form_dar');
const buttons_dar = document.querySelectorAll('.btn-give-admin');
const forms_quitar = document.querySelectorAll('.form_quitar');
const buttons_quitar = document.querySelectorAll('.btn-revoke-admin');

const darAdmin = (event) => {
    event.preventDefault();
    Swal.fire({
        title: 'Estas Seguro/a?',
        text: "Deseas darle el rol de admin al usuario seleccionado?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, darle el rol',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit();
        }
    });
};

const quitarAdmin = (event) => {
    event.preventDefault();
    Swal.fire({
        title: 'Estas Seguro/a?',
        text: "Deseas quitarle el rol de admin al usuario seleccionado?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, quitarle el rol',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit();
        }
    });
};

buttons_dar.forEach(button => {
    button.addEventListener('click', darAdmin);
});

buttons_quitar.forEach(button => {
    button.addEventListener('click', quitarAdmin);
});
