@extends('layouts.admin.index')

@section('title', 'Profil User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
        </div>
        <div class="section-body">
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
        </div>

    </section>
@endsection
