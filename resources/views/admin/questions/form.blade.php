@extends('layouts.app')
@section('title', $question->exists ? 'Edit Pertanyaan' : 'Tambah Pertanyaan')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <h1 class="h3 fw-bold mb-3">{{ $question->exists ? 'Edit Pertanyaan' : 'Tambah Pertanyaan' }}</h1>
    @include('partials.errors')
    <form class="card p-4" method="post" action="{{ $question->exists ? route('admin.questions.update', $question) : route('admin.questions.store') }}">
        @csrf @if($question->exists) @method('put') @endif
        <div class="row g-3">
            <div class="col-md-4"><label class="form-label">Kode</label><input class="form-control" name="code" value="{{ old('code', $question->code) }}" required></div>
            <div class="col-md-2"><label class="form-label">Urutan</label><input type="number" min="1" class="form-control" name="sort_order" value="{{ old('sort_order', $question->sort_order ?: 1) }}" required></div>
            <div class="col-md-6"><label class="form-label">Pertanyaan</label><input class="form-control" name="question_text" value="{{ old('question_text', $question->question_text) }}" required></div>
        </div>
        <div class="mt-4"><button class="btn btn-success"><i class="bi bi-save me-2"></i>Simpan</button></div>
    </form>
</div>
@endsection
