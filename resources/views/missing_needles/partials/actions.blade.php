<a href="{{ route('missing-needles.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>

<form action="{{ route('missing-needles.destroy', $row->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?')">Delete</button>
</form>
