@extends('layouts.app')
@section('title', $rule->exists ? 'Edit Rule' : 'Tambah Rule')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <h1 class="h3 fw-bold mb-3">{{ $rule->exists ? 'Edit Rule' : 'Tambah Rule' }}</h1>
    @include('partials.errors')
    <form class="card p-4" method="post" action="{{ $rule->exists ? route('admin.rules.update', $rule) : route('admin.rules.store') }}">
        @csrf @if($rule->exists) @method('put') @endif
        <div class="row g-3">
            <div class="col-md-4"><label class="form-label">Nama Rule</label><input class="form-control" name="name" value="{{ old('name', $rule->name) }}" required></div>
            <div class="col-md-8"><label class="form-label">Alasan/Rekomendasi</label><input class="form-control" name="description" value="{{ old('description', $rule->description) }}"></div>
            <div class="col-12">
                <label class="form-label">Tanaman hasil rule</label>
                <select class="form-select" name="plant_ids[]" multiple required size="6">
                    @foreach($plants as $plant)
                        <option value="{{ $plant->id }}" @selected(in_array($plant->id, old('plant_ids', $rule->plant_ids ?? [])))>{{ $plant->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12"><hr><h2 class="h5">Kondisi Rule</h2></div>
            @foreach($questions as $question)
                <div class="col-md-6">
                    <label class="form-label">{{ $question->question_text }}</label>
                    <select class="form-select" name="conditions[{{ $question->id }}]">
                        <option value="">Tidak digunakan</option>
                        @foreach($question->options as $option)
                            <option value="{{ $option->id }}" @selected((int) old("conditions.$question->id", $selectedConditions[$question->id] ?? 0) === $option->id)>{{ $option->label }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
        </div>
        <div class="mt-4"><button class="btn btn-success"><i class="bi bi-save me-2"></i>Simpan</button></div>
    </form>
</div>
@endsection
