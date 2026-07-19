@extends('layouts.app')
@section('title', $plant->exists ? 'Edit Tanaman' : 'Tambah Tanaman')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <h1 class="h3 fw-bold mb-3">{{ $plant->exists ? 'Edit Tanaman' : 'Tambah Tanaman' }}</h1>
    @include('partials.errors')
    <form class="card p-4" method="post" action="{{ $plant->exists ? route('admin.plants.update', $plant) : route('admin.plants.store') }}">
        @csrf @if($plant->exists) @method('put') @endif
        <div class="row g-3">
            @foreach (['name' => 'Nama tanaman', 'latin_name' => 'Nama latin', 'watering_frequency' => 'Frekuensi penyiraman', 'light_requirement' => 'Kebutuhan cahaya', 'humidity_requirement' => 'Kebutuhan kelembaban', 'difficulty' => 'Kesulitan perawatan'] as $field => $label)
                <div class="col-md-6"><label class="form-label">{{ $label }}</label><input class="form-control" name="{{ $field }}" value="{{ old($field, $plant->$field) }}" required></div>
            @endforeach
            <div class="col-12"><label class="form-label">Deskripsi</label><textarea class="form-control" name="description" rows="3" required>{{ old('description', $plant->description) }}</textarea></div>
            <div class="col-12"><label class="form-label">Cara perawatan</label><textarea class="form-control" name="care_instructions" rows="3" required>{{ old('care_instructions', $plant->care_instructions) }}</textarea></div>
        </div>
        <div class="mt-4"><button class="btn btn-success"><i class="bi bi-save me-2"></i>Simpan</button></div>
    </form>
</div>
@endsection
