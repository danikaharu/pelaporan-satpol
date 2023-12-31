@extends('layouts.admin.index')

@section('title', 'Edit User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Pengguna</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

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
