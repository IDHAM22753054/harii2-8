<a href="{{ route('mapel.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('mapel.destroy', $row->id) }}" method="POST" id="delete-form-{{ $row->id }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $row->id }})">Hapus</button>
                                            </form>