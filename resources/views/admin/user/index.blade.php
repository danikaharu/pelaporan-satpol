@extends('layouts.admin.index')

@section('title', 'User')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger">{{ session('danger') }}</div>
            @endif
            <div class="card-header">
                <h3 class="card-title">
                    <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">
                        <i class="fas fa-plus">
                        </i>
                        Tambah
                    </a>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
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
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->username }}
                                </td>
                                <td class="#">
                                    @include('admin.user.include.action')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    Maaf, belum ada data
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
