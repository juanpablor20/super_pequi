
    <td>
        <div class="btn-list flex-nowrap">
<a href="{{ route('equipment.show',$item->id) }}" class="btn btn-primary"><i class="ti ti-eye-check"></i></a>
<a href="{{ route('equipment.edit',$item->id) }}" class="btn btn-secondary"><i class="ti ti-edit"></i></a>
<form action="{{ route('equipment.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Estás seguro de que quieres inactivar este equipo?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"><i class="ti ti-trash-off"></i></button>
</form>
        </div>
</td>