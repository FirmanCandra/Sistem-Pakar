@extends('layouts.app')

@section('title', 'Mulai Konsultasi')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <div>
                    <h1 class="fw-bold mb-1">Konsultasi Tanaman Hias</h1>
                    <p class="text-muted mb-0">Pilih jawaban yang paling sesuai dengan kondisi ruangan Anda.</p>
                </div>
                <span class="badge text-bg-success px-3 py-2">{{ $questions->count() }} Pertanyaan</span>
            </div>
            @include('partials.errors')
            <div class="progress mb-4 shadow-sm" role="progressbar" aria-label="Progress konsultasi">
                <div id="answerProgress" class="progress-bar bg-success" style="width: 0%">0%</div>
            </div>
            <form method="post" action="{{ route('consultations.store') }}">
                @csrf
                <div class="row g-3">
                    @foreach ($questions as $question)
                        <div class="col-md-6">
                            <div class="card lift h-100 p-4">
                                <div class="d-flex gap-2 align-items-start mb-3">
                                    <span class="badge text-bg-success rounded-pill">{{ $question->sort_order }}</span>
                                    <h2 class="h6 mb-0">{{ $question->question_text }}</h2>
                                </div>
                                <div class="vstack gap-2">
                                    @foreach ($question->options as $option)
                                        <label class="option-card p-3">
                                            <input class="form-check-input me-2 consultation-answer" type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" @checked(old("answers.$question->id") == $option->id)>
                                            {{ $option->label }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button class="btn btn-success btn-lg"><i class="bi bi-search-heart me-2"></i>Lihat Rekomendasi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const totalQuestions = {{ $questions->count() }};
    const progress = document.getElementById('answerProgress');
    const updateProgress = () => {
        const answeredNames = new Set([...document.querySelectorAll('.consultation-answer:checked')].map(input => input.name));
        const percent = Math.round((answeredNames.size / totalQuestions) * 100);
        progress.style.width = percent + '%';
        progress.textContent = percent + '%';
    };
    document.querySelectorAll('.consultation-answer').forEach(input => input.addEventListener('change', updateProgress));
    updateProgress();
</script>
@endpush
