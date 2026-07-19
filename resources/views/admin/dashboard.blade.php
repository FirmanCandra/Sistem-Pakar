@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    <div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold mb-1">Dashboard Admin</h1>
            <p class="text-muted mb-0">Kelola basis pengetahuan sistem pakar.</p>
        </div>
        <a href="{{ route('home') }}" class="btn btn-outline-success"><i class="bi bi-house me-2"></i>Website</a>
    </div>
    @include('admin.partials.nav')
    <div class="row g-3 mb-4">
        <div class="col-md-3"><div class="card lift stat p-3"><span class="text-muted small">Tanaman</span><div class="h2 mb-0">{{ $plantsCount }}</div></div></div>
        <div class="col-md-3"><div class="card lift stat p-3"><span class="text-muted small">Pertanyaan</span><div class="h2 mb-0">{{ $questionsCount }}</div></div></div>
        <div class="col-md-3"><div class="card lift stat p-3"><span class="text-muted small">Rule</span><div class="h2 mb-0">{{ $rulesCount }}</div></div></div>
        <div class="col-md-3"><div class="card lift stat p-3"><span class="text-muted small">Konsultasi</span><div class="h2 mb-0">{{ $consultationsCount }}</div></div></div>
    </div>
    <div class="row g-3">
        @foreach ([
            ['Tanaman', 'admin.plants.index', 'bi-flower1'],
            ['Pertanyaan', 'admin.questions.index', 'bi-question-circle'],
            ['Pilihan Jawaban', 'admin.question-options.index', 'bi-list-check'],
            ['Rule', 'admin.rules.index', 'bi-diagram-3'],
            ['Detail Rule', 'admin.rule-details.index', 'bi-sliders'],
        ] as [$label, $route, $icon])
            <div class="col-md-4">
                <a class="card lift p-4 h-100 text-decoration-none text-dark" href="{{ route($route) }}">
                    <span class="icon-box"><i class="bi {{ $icon }}"></i></span>
                    <span class="fw-semibold mt-3">{{ $label }}</span>
                    <span class="text-muted small mt-1">Kelola data {{ strtolower($label) }}</span>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
