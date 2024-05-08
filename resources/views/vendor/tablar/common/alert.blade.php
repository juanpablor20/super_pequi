@if (Session::has('message'))
    <div class="alert alert-info" role="alert">
        <div class="text-muted">{{ Session('message') }}</div>
    </div>
    @elseif(Session::has('message2'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
   
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Advertencia",
            text: "Este usuario no es el mismo que realizó el préstamo",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Recibir equipo",
            cancelButtonText: "Reportar usuario",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('home') }}";

                // Agregar un campo oculto para el parámetro confirmar_devolucion
                
            } else {
                
                // Redirige de vuelta a la página de inicio si el usuario cancela la acción
                window.location.href = "{{ route('disabilities.create') }}";
            }
        });
    </script>
@elseif(Session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonText: 'Aceptar'
        })
    </script>
@elseif (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Muestra el mensaje de éxito utilizando SweetAlert2
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '{{ session('success') }}',
            confirmButtonText: 'Aceptar',

            // cancelButtonText: 'Ver usuario', // Texto del botón de cancelar

            reverseButtons: true // Invierte el orden de los botones (Aceptar y Cancelar)
        })
    </script>
@endif
