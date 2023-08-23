const form_delete = document.getElementById('form-delete');
const form_submit = document.getElementById('form-submit');

const eliminarProducto = (event) => {
    event.preventDefault();
    Swal.fire({
        title: '¿Estas seguro/a?',
        text: "Desea eliminar este producto?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminarlo',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            form_delete.submit();
        }
    });
};

form_submit .addEventListener('click', eliminarProducto);
