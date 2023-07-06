@extends('layouts.admin.index')

@section('title', 'Respon')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">
                        <i class="fas fa-arrow-left">
                        </i>
                        Kembali
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
                                Pertanyaan
                            </th>
                            <th style="width: 30%">
                                Jawaban
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entry->answers as $answer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $answer->question->content }}</td>
                                <td>{{ $answer->value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
