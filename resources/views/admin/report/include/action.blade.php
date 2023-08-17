@can('show entries')
    <a class="btn btn-info btn-sm" href="{{ route('reports.show', $model->id) }}">
        <i class="fas fa-eye">
        </i>
        Lihat Jawaban
    </a>
@endcan
@can('delete entries')
    <form action="{{ route('reports.destroy', $model->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('Anda yakin ingin menghapusnya')">
        @csrf
        @method('delete')

        <button class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i>
            Hapus
        </button>
    </form>
@endcan
