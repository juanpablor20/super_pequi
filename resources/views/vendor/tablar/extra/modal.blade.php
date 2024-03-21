<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">numero Documento</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Numero de documento">
                </div>
                <div class="mb-3">
                    <label class="form-label">numero Serie</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Numero de seire">
                </div>
                <div>
                    <select class="form-select" name="descripcion">
                        <option value=""></option>
                        <option value="1">Portatil</option>
                        <option value="2">Mause</option>
                        <option value="3">Teclado</option>
                        <option value="4">audifonos</option>
                    </select>
                </div>
           
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Create new report
                </a>
            </div>
        </div>
    </div>
</div>
