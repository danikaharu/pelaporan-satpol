@extends('layouts.admin.index')

@section('title', 'Add User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pengguna</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('admin.user.include.form')

                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                                <input type="submit" value="Simpan" class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
