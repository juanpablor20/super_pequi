<!-- resources/views/extra/alert.blade.php -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inactivación de usuario
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = this.closest('.form-delete');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡El usuario no se eliminará de forma permanente, solo cambiará el estado a inactivo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, inactivar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Activación de usuario
        const activateButtons = document.querySelectorAll('.btn-activate');
        activateButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = this.closest('.form-activate');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "El usuario será activado y podra ingresar al sistema",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, activar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Manejo de alertas de sesión
        @if (Session::has('message'))
            Swal.fire({
                icon: 'info',
                title: 'Información',
                text: '{{ session('message') }}',
                confirmButtonText: 'Aceptar'
            });
        @elseif (Session::has('message2'))
            Swal.fire({
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
                } else {
                    window.location.href = "{{ route('disabilities.create') }}";
                }
            });
        @elseif (Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                confirmButtonText: 'Aceptar'
            });
        @elseif (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar'
            });
        @endif
    });
</script>
