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
    <script>
        function generateInputs() {
            var jumlahPelanggar = parseInt(document.getElementById('jumlah_pelanggar').value);
            var container = $('#nama_pelanggar_container');
            container.empty();

            for (var i = 1; i <= jumlahPelanggar; i++) {
                var formGroup = $('<div>').addClass('form-group');

                var labelNama = $('<label>')
                    .attr('for', 'nama_pelanggar_' + i)
                    .text('Nama Pelanggar ' + i);
                var inputNama = $('<input>')
                    .attr('type', 'text')
                    .attr('id', 'nama_pelanggar_' + i)
                    .attr('name', 'name[]')
                    .addClass('form-control')
                    .attr('placeholder', 'Nama Pelanggar ' + i);

                var labelUmur = $('<label>')
                    .attr('for', 'umur_pelanggar_' + i)
                    .text('Umur Pelanggar ' + i);
                var inputUmur = $('<input>')
                    .attr('type', 'number')
                    .attr('id', 'umur_pelanggar_' + i)
                    .attr('name', 'age[]')
                    .addClass('form-control')
                    .attr('placeholder', 'Umur Pelanggar ' + i);

                var labelAlamat = $('<label>')
                    .attr('for', 'alamat_pelanggar_' + i)
                    .text('Alamat Pelanggar ' + i);
                var inputAlamat = $('<input>')
                    .attr('type', 'text')
                    .attr('id', 'alamat_pelanggar_' + i)
                    .attr('name', 'address[]')
                    .addClass('form-control')
                    .attr('placeholder', 'Alamat Pelanggar ' + i);

                var labelJenisKelamin = $('<label>')
                    .attr('for', 'jenis_kelamin_pelanggar_' + i)
                    .text('Jenis Kelamin Pelanggar ' + i);
                var selectJenisKelamin = $('<select>')
                    .attr('id', 'jenis_kelamin_pelanggar_' + i)
                    .attr('name', 'gender[]')
                    .addClass('form-control');
                var optionPria = $('<option>')
                    .attr('value', 'pria')
                    .text('Pria');
                var optionWanita = $('<option>')
                    .attr('value', 'wanita')
                    .text('Wanita');
                selectJenisKelamin.append(optionPria).append(optionWanita);

                formGroup.append(labelNama).append(inputNama);
                formGroup.append(labelUmur).append(inputUmur);
                formGroup.append(labelAlamat).append(inputAlamat);
                formGroup.append(labelJenisKelamin).append(selectJenisKelamin);
                container.append(formGroup);
            }
        }

        $(document).ready(function() {
            $("#lainnya").change(function() {
                const lainnyaText = $("#lainnya").val()
                $("#lainnyaCheckbox").val(lainnyaText)
            })

            $("#jumlah_pelanggar").on('input', function() {
                generateInputs()
            })

        });
    </script>
@endpush
