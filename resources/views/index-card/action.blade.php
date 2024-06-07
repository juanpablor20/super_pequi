
<div class="btn-list flex-nowrap">
   
    <a href="{{ route('indexcards.edit', $item->id) }}" class="btn btn-secondary"><i class="ti ti-edit"></i></a>
    <form action="{{ route('indexcards.destroy', $item->id) }}" method="POST" class="form-delete">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-delete"><i class="ti ti-trash-off"></i></button>
    </form>
</div>
