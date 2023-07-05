@extends('layouts.admin.index')

@section('title', 'Add User')

@section('content')
    <section class="content">
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
    </section>
@endsection
