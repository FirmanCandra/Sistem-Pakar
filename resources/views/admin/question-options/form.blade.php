@extends('layouts.app')
@section('title', $option->exists ? 'Edit Pilihan' : 'Tambah Pilihan')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <h1 class="h3 fw-bold mb-3">{{ $option->exists ? 'Edit Pilihan' : 'Tambah Pilihan' }}</h1>
    @include('partials.errors')
    <form class="card p-4" method="post" action="{{ $option->exists ? route('admin.question-options.update', $option) : route('admin.question-options.store') }}">
        @csrf @if($option->exists) @method('put') @endif
        <div class="row g-3">
            <div class="col-md-6"><label class="form-label">Pertanyaan</label><select class="form-select" name="question_id" required>@foreach($questions as $question)<option value="{{ $question->id }}" @selected(old('question_id', $option->question_id) == $question->id)>{{ $question->question_text }}</option>@endforeach</select></div>
            <div class="col-md-2"><label class="form-label">Value</label><input class="form-control" name="value" value="{{ old('value', $option->value) }}" required></div>
            <div class="col-md-2"><label class="form-label">Label</label><input class="form-control" name="label" value="{{ old('label', $option->label) }}" required></div>
            <div class="col-md-2"><label class="form-label">Urutan</label><input type="number" min="1" class="form-control" name="sort_order" value="{{ old('sort_order', $option->sort_order ?: 1) }}" required></div>
        </div>
        <div class="mt-4"><button class="btn btn-success"><i class="bi bi-save me-2"></i>Simpan</button></div>
    </form>
</div>
@endsection
