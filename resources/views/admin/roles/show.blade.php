@extends('layouts.admin.index')

@section('title', 'Role')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Role</h1>
        </div>
        <div class="section-body">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}">
                            <i class="fas fa-arrow-left">
                            </i>
                            Kembali
                        </a>
                    </h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <tr>
                            <td>{{ __('Nama') }}</td>
                            <td>{{ $role->name }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tanggal Dibuat') }}</td>
                            <td>{{ $role->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Tanggal Diubah') }}</td>
                            <td>{{ $role->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Hak Akses') }}</td>
                            <td>{{ $role->permissions->pluck('name') }}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


    </section>
@endsection
