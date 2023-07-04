<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $section->name }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach ($section->questions as $question)
        @include('survey::questions.single')
    @endforeach
</div>
