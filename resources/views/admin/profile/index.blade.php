@extends('layouts.admin.index')

@section('title', 'Profil User')

@section('content')
    <section class="content">
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            @include('admin.user.include.form')

            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Simpan" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
@endsection
