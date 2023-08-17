@extends('layouts.admin.index')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        @role('Admin')
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pengguna</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalUser }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Laporan</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalReport }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endrole
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Berdasarkan Kecamatan</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <th>Jumlah Laporan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subDistrictData as $data)
                                        <tr>
                                            <td> {{ $data->kecamatan() }}</td>
                                            <td> {{ $data->total_laporan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Berdasarkan Jenis Sanksi</h4>
                    </div>
                    <div class="card-body p-0">
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('template/assets/modules/chart.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("chart1").getContext('2d');

        var totalByType = @json($totalByType);

        var labels = [];
        var data = [];
        totalByType.forEach(function(item) {
            labels.push(item.jenis_sanksi);
            data.push(item.total_laporan);
        });

        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: data,
                    backgroundColor: [
                        '#ffa426',
                        '#fc544b',
                    ],
                    label: 'Jenis Sanksi'
                }],
                labels: labels,
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });
    </script>
@endpush
