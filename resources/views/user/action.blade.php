<td>
    <div class="btn-list flex-nowrap">
        <a href="{{ route('users.show', $item->id) }}" class="btn btn-primary"><i
                class="ti ti-eye-check"></i></a>
                @role('bibliotecario')
        <a href="{{ route('users.edit', $item->id) }}"
            class="btn btn-secondary"><i class="ti ti-edit"></i></a>
        <form action="{{ route('users.destroy', $item->id) }}" method="POST"
            onsubmit="return confirm('Estás seguro de que quieres inactivar este usuario?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i
                    class="ti ti-trash-off"></i></button>
        </form>
        @endrole
    </div>
</td>