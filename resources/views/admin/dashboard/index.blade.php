@extends('layouts.admin.index')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('entries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success"> {{ session('success') }}</div>
                @endif

                @include('survey::standard', ['survey' => $survey])
            </form>
        </div>
    </section>
@endsection
