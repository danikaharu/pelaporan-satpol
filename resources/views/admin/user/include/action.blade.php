@can('edit user')
    <a class="btn btn-info btn-sm" href="{{ route('users.edit', $model->id) }}">
        <i class="fas fa-pencil-alt">
        </i>
        Edit
    </a>
@endcan
@can('delete user')
    <form action="{{ route('users.destroy', $model->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('Anda yakin ingin menghapusnya')">
        @csrf
        @method('delete')

        <button class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i>
            Hapus
        </button>
    </form>
@endcan
