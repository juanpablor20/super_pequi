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
    <input type="text" class="form-control" name="places" placeholder="Ambiente a Trasladar"><br><br>
</div> --}}

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
