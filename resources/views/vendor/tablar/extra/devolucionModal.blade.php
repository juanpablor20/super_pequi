<div class="modal modal-blur fade" id="devolucion" tabindex="-1" role="dialog" aria-hidden="true">
    <x-card>
        <x-slot name="header">
            <h3 class="card-title">Nuevo Servicio</h3>
        </x-slot>
        <x-slot name="ribbon">
            <div class="ribbon bg-red">Nueva devolucion</div>
        </x-slot>
    </x-card>
    <form method="POST" action="{{ route('devolucion') }}" id="return" role="form" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tipo del Servicio devolucion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="bibliotecario_id" value="{{ Auth::id() }}">
                        <label class="form-label">Numero de Documento</label>
                        <input type="text" class="form-control" name="number_identification" placeholder="Numero de documento" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Numero de Serie</label>
                        <input type="text" class="form-control" name="serie_equi" placeholder="Numero de serie" required>
                    </div>
                    <input type="hidden" name="names" value="biblioteca">
                </div>
                <div class="form-footer">
                    <div class="text-end">
                        <div class="d-flex">
                            <button type="button" class="btn btn-danger cancel-button">Cancel</button>
                            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Incluye SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('return');
        const cancelButton = document.querySelector('.cancel-button');
      

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente

            Swal.fire({
                title: '¿Estás seguro?',
                text: "El equipo cuenta con un buen estado!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, enviar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Si el usuario confirma, envía el formulario
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = `/reportes/${serviceId}`; // Redirige a la página de reportes con el ID del servicio
                }
            });
        });

        cancelButton.addEventListener('click', function (event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del botón
            window.location.href = `/reportes/${serviceId}`; // Redirige a la página de reportes con el ID del servicio
        });
    });
</script> 
