@extends('layouts.admin.index')

@section('title', 'User')

@push('style')
    <link rel="stylesheet" href="{{ asset('template/assets/modules/datatables/datatables.min.css') }} ">
    <link rel="stylesheet"
        href="{{ asset('template/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }} ">
    <link rel="stylesheet"
        href="{{ asset('template/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
            @can('add user')
                <div class="section-header-button">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Baru</a>
                </div>
            @endcan
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('danger'))
                            <div class="alert alert-danger">{{ session('danger') }}</div>
                        @endif
                        <div class="card-header">
                            <h4>Semua Pengguna</h4>
                        </div>
                        <div class="card-body">

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">
                                                #
                                            </th>
                                            <th style="width: 20%">
                                                Nama
                                            </th>
                                            <th style="width: 30%">
                                                Email
                                            </th>
                                            <th>
                                                Username
                                            </th>
                                            <th style="width: 20%">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('template/assets/modules/datatables/datatables.min.js') }} "></script>
    <script src="{{ asset('template/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('template/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('template/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $('#table1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'username'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });
    </script>
@endpush
