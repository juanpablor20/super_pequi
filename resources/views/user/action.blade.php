
<div class="btn-list flex-nowrap">
    @if (config('tablar', 'display_alert'))
    @include('tablar::common.alert')
@endif
        
                

    @if($item->states == 'active' || $item->states == 'with_equipment')
        <a href="{{ route('users.show', $item->id) }}" class="btn btn-primary"><i class="ti ti-eye-check"></i></a>
        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-secondary"><i class="ti ti-edit"></i></a>
        <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="form-delete">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger btn-delete"><i class="ti ti-trash-off"></i></button>
        </form>
        
    @elseif($item->states == 'inactive')
    <form action="{{ route('bibliotecarios.activate', $item->id) }}" method="POST" class="form-activate">
        @csrf
        <button type="button" class="btn btn-success btn-activate"><i class="ti ti-reload"></i> Reactivar</button>
    </form>
    @endif

    
</div>
