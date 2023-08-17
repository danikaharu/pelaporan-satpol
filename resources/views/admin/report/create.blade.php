@extends('layouts.admin.index')

@section('title')
    Kuisioner
@endsection

@push('style')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('template/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/modules/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Form Laporan Harian</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="section-body">
            <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success"> {{ session('success') }}</div>
                @endif

                @include('admin.report.include.form')

                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('reports.index') }}" class="btn btn-secondary">Kembali</a>
                        <input type="submit" value="Simpan" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('template/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('template/assets/modules/select2/dist/js/select2.min.js') }}"></script>
@endpush
