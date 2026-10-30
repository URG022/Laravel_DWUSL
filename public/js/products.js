function destroy(e) {
    let url = e.getAttribute('url');
    let token = e.getAttribute('token');

    Swal.fire({
        icon: 'question',
        title: '¿Desea continuar?',
        text: 'El registro se eliminará permanentemente',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
    }).then((res) => {
        if (res.isConfirmed) {
            const request = new XMLHttpRequest();
            request.open('DELETE', url, true);
            request.setRequestHeader('X-CSRF-TOKEN', token);

            request.onload = () => {
                if (request.status >= 200 && request.status < 300) {
                    e.closest('tr').remove();
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado',
                        text: 'El registro se eliminó correctamente',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo eliminar el registro',
                    });
                }
            };

            request.onerror = () => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error de red',
                    text: 'Ocurrió un problema de conexión',
                });
            };

            request.send();
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Cancelado',
                text: 'El registro no se eliminó',
            });
        }
    });
}