<div class="modal modal-blur fade" id="devolucion" tabindex="-1" role="dialog" aria-hidden="true">
    <form method="POST" action="{{ route('prestamos') }}" id="ajaxForm" role="form"
    enctype="multipart/form-data">
  @csrf
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Devolucion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          
      
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" name="bibliotecario_id" value="{{ Auth::id() }}">
                    <label class="form-label">numero Documento</label>
                    <input type="text" class="form-control" name="number_identification" placeholder="Numero de documento">
                </div>
                <div class="mb-3">
                    <label class="form-label">numero Serie</label>
                    <input type="text" class="form-control" name="serie_equi" placeholder="Numero de seire">
                </div>
                {{-- <div class="mb-3">
                <label for="form-label">Ambiente a Trasladar:</label><br>
                <input type="text" class="form-control" name="places" placeholder="Ambiente a Trasladar"><br><br> --}}
            </div>
           
            <div class="form-footer">
                <div class="text-end">
                    <div class="d-flex">
                        <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary ms-auto ajax-submit">Enviar</button>
                    </div>
                </div>
            </div>

        </form> 
        </div>
    </div>
</form> 
</div>
