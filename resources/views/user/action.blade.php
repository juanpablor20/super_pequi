
<div class="btn-list flex-nowrap">
    <a href="{{ route('users.show', $item->id) }}" class="btn btn-primary"><i class="ti ti-eye-check"></i></a>
 
    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-secondary"><i class="ti ti-edit"></i></a>
    <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="form-delete">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-delete"><i class="ti ti-trash-off"></i></button>
    </form>

    
    @if($item->status == 'inactivo')
        <form action="{{ route('user.activate', $item->id) }}" method="POST" class="form-activate">
            @csrf
            <button type="submit" class="btn btn-success"><i class="ti ti-check"></i> Activar</button>
        </form>
    @endif
</div>