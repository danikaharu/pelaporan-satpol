<div class="card">
    <div class="card-header bg-white p-4">
        <h2>{{ $survey->name }}</h2>

        @if (!$eligible)
            We only accept
            <strong>{{ $survey->limitPerParticipant() }}
                {{ \Str::plural('entry', $survey->limitPerParticipant()) }}</strong>
            per participant.
        @endif

        @if ($lastEntry)
            <p class="ml-2">
                Jawaban terakhir anda <strong>{{ $lastEntry->created_at->diffForHumans() }}</strong>.
            </p>
        @endif

    </div>
    @if (!$survey->acceptsGuestEntries() && auth()->guest())
        <div class="p-5">
            Please login to join this survey.
        </div>
    @else
        @foreach ($survey->sections as $section)
            @include('survey::sections.single')
        @endforeach

        @foreach ($survey->questions()->withoutSection()->get() as $question)
            @include('survey::questions.single')
        @endforeach

        @if ($eligible)
            <button class="btn btn-primary">Submit</button>
        @endif
    @endif
</div>
