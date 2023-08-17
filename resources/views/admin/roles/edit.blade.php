@extends('layouts.admin.index')

@section('title', 'Edit Role')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Role</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @include('admin.roles.include.form')

                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">Kembali</a>
                                <input type="submit" value="Simpan" class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script src="{{ asset('template/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
