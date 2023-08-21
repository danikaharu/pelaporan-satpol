@extends('layouts.admin.index')

@section('title', 'Respon')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Jawaban</h1>
        </div>
        <div class="section-body">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary btn-sm" href="{{ route('reports.index') }}">
                            <i class="fas fa-arrow-left">
                            </i>
                            Kembali
                        </a>
                    </h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Pertanyaan
                                </th>
                                <th style="width: 30%">
                                    Jawaban
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nama Pelapor</td>
                                <td>{{ $report->nama_pelapor }}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Nomor HP</td>
                                <td>{{ $report->nomor_hp }}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Kabupaten</td>
                                <td>{{ $report->kabupaten }}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Kecamatan</td>
                                <td>{{ $report->kecamatan() }}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Tanggal Kegiatan</td>
                                <td>{{ $report->tanggal_kegiatan }}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Jenis Kegiatan</td>
                                <td>{{ $report->jenis_kegiatan }}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Jenis Pelanggaran</td>
                                <td>
                                    @if ($report->jenis_pelanggaran)
                                        {{ implode(',', $report->jenis_pelanggaran) }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Jenis Sanksi</td>
                                <td>{{ $report->jenis_sanksi }}</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Jumlah Pelanggar</td>
                                <td>{{ $report->jumlah_pelanggar }}</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Sanksi Adminstratif</td>
                                <td>
                                    @if ($report->sanksi_administratif)
                                        {{ implode(',', $report->sanksi_administratif) }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Denda Adminstratif</td>
                                <td>{{ $report->denda_administratif }}</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Sanksi Pidana</td>
                                <td>{{ $report->sanksi_pidana() }}</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Denda Pidana</td>
                                <td>{{ $report->denda_pidana }}</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Lama Kurungan</td>
                                <td>{{ $report->lama_kurungan }}</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Foto Dokumentasi</td>
                                <td>{{ $report->foto_dokumentasi }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


    </section>
@endsection
