@extends('layouts.app')

@section('title', 'Hasil Rekomendasi')

@section('content')
<div class="container py-5">
    <div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold mb-1">Hasil Rekomendasi</h1>
            <p class="text-muted mb-0">Berdasarkan rule Forward Chaining yang cocok dengan jawaban Anda.</p>
        </div>
        <a href="{{ route('consultations.create') }}" class="btn btn-outline-success"><i class="bi bi-arrow-repeat me-2"></i>Konsultasi Lagi</a>
    </div>

    @if ($matchedRules->isEmpty())
        <div class="alert alert-warning">Belum ada rule yang cocok. Silakan ubah jawaban atau tambah rule pada dashboard admin.</div>
    @else
        <div class="card p-4 mb-4">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="icon-box"><i class="bi bi-diagram-3"></i></span>
                <h2 class="h5 mb-0">Rule yang cocok</h2>
            </div>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($matchedRules as $rule)
                    <span class="badge text-bg-success px-3 py-2">{{ $rule->name }}</span>
                @endforeach
            </div>
        </div>
        <div class="row g-4">
            @foreach ($plants as $plant)
                <div class="col-md-6 col-xl-4">
                    <div class="card lift h-100 p-4">
                        <div class="d-flex justify-content-between gap-3">
                            <div>
                                <h2 class="h4 mb-1">{{ $plant->name }}</h2>
                                <p class="text-muted"><em>{{ $plant->latin_name }}</em></p>
                            </div>
                            <span class="icon-box"><i class="bi bi-flower1"></i></span>
                        </div>
                        <p>{{ $plant->description }}</p>
                        <h3 class="h6">Alasan direkomendasikan</h3>
                        <ul>
                            @foreach ($reasons[$plant->id] ?? [] as $reason)
                                <li>{{ $reason }}</li>
                            @endforeach
                        </ul>
                        <dl class="row small mb-0">
                            <dt class="col-5">Perawatan</dt><dd class="col-7">{{ $plant->care_instructions }}</dd>
                            <dt class="col-5">Penyiraman</dt><dd class="col-7">{{ $plant->watering_frequency }}</dd>
                            <dt class="col-5">Cahaya</dt><dd class="col-7">{{ $plant->light_requirement }}</dd>
                            <dt class="col-5">Kelembaban</dt><dd class="col-7">{{ $plant->humidity_requirement }}</dd>
                            <dt class="col-5">Kesulitan</dt><dd class="col-7">{{ $plant->difficulty }}</dd>
                        </dl>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
