<div class="modal modal-blur prestamo" id="prestamo" tabindex="-1" role="dialog" aria-hidden="true">
    <x-card>
        <x-slot name="header">
            <h3 class="card-title">Nuevo Servicio</h3>
        </x-slot>
        <x-slot name="ribbon">
            <div class="ribbon bg-blur">Nuevo Prestamo</div>
        </x-slot>
    </x-card>
    <form method="POST" action="{{ route('prestamos') }}" role="form" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tipo del Servicio Préstamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        {{-- <input type="hidden" name="bibliotecario_id" value="{{ Auth::id() }}"> --}}
                        <label class="form-label">Número de Documento</label>
                        <input type="text" class="form-control" name="number_identification"
                            placeholder="Número de documento" required>
                        {{-- @if ($errors->has('number_identification'))
                            <div class="text-danger">{{ $errors->first('number_identification') }}</div>
                        @endif --}}
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número de Serie</label>
                        <input type="text" class="form-control" name="serie_equi" placeholder="Número de serie"
                            required>
                    </div>
                    <div class="mb-3 col md-6">
                        <label class="form-label">Lugar de traslado</label>
                        {{-- <x-tom-select class="mb-3 col md-6" remote-data="true" name="program_id" item-search-route="programa.search"></x-tom-select> --}}

                     <x-input remote-data="true" name="names" item-search-route="aula.search"></x-input> 
                    </div>


                </div>
                <div class="modal-footer">
                    <div class="text-end">
                        <div class="d-flex">
                            <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                class="btn btn-danger">Cancelar</button>
                            <button type="submit" class="btn btn-primary ms-auto">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
