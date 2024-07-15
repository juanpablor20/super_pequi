
<div class="btn-list flex-nowrap">
    <a href="{{ route('equipment.show', $item->id) }}" class="btn btn-primary"><i class="ti ti-eye-check"></i></a>
  @role('bibliotecario')
    <a href="{{ route('equipment.edit', $item->id) }}" class="btn btn-secondary"><i class="ti ti-edit"></i></a>
    <form action="{{ route('equipment.destroy', $item->id) }}" method="POST" class="form-delete">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-delete"><i class="ti ti-trash-off"></i></button>
    </form>

    
    @if($item->status == 'inactivo')
        <form action="{{ route('equipment.activate', $item->id) }}" method="POST" class="form-activate">
            @csrf
            <button type="submit" class="btn btn-success"><i class="ti ti-check"></i> Activar</button>
        </form>
    @endif
</div>
@endrole