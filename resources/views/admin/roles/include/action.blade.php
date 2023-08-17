@can('show role')
    <a class="btn btn-warning btn-sm" href="{{ route('roles.show', $model->id) }}">
        <i class="fas fa-eye">
        </i>
        Detail
    </a>
@endcan
@can('edit role')
    <a class="btn btn-info btn-sm" href="{{ route('roles.edit', $model->id) }}">
        <i class="fas fa-pencil-alt">
        </i>
        Edit
    </a>
@endcan
@can('delete role')
    <form action="{{ route('roles.destroy', $model->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('Anda yakin ingin menghapusnya')">
        @csrf
        @method('delete')

        <button class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i>
            Hapus
        </button>
    </form>
@endcan
