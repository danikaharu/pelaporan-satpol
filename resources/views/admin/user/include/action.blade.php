@if ($user->entry->id)
    <a class="btn btn-warning btn-sm" href="{{ route('entries.show', $user->entry) }}">
        <i class="fas fa-pencil-alt">
        </i>
        Lihat Respon
    </a>
@endif
<a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}">
    <i class="fas fa-pencil-alt">
    </i>
    Edit
</a>
<form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline"
    onsubmit="return confirm('Anda yakin ingin menghapusnya')">
    @csrf
    @method('delete')

    <button class="btn btn-danger btn-sm">
        <i class="fa fa-trash"></i>
        Hapus
    </button>
</form>
