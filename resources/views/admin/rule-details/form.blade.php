@extends('layouts.app')
@section('title', $detail->exists ? 'Edit Detail Rule' : 'Tambah Detail Rule')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <h1 class="h3 fw-bold mb-3">{{ $detail->exists ? 'Edit Detail Rule' : 'Tambah Detail Rule' }}</h1>
    @include('partials.errors')
    <form class="card p-4" method="post" action="{{ $detail->exists ? route('admin.rule-details.update', $detail) : route('admin.rule-details.store') }}">
        @csrf @if($detail->exists) @method('put') @endif
        <div class="row g-3">
            <div class="col-md-5"><label class="form-label">Rule</label><select class="form-select" name="rule_id" required>@foreach($rules as $rule)<option value="{{ $rule->id }}" @selected(old('rule_id', $detail->rule_id) == $rule->id)>{{ $rule->name }}</option>@endforeach</select></div>
            <div class="col-md-7"><label class="form-label">Kondisi Jawaban</label><select class="form-select" name="question_option_id" required>@foreach($questions as $question)<optgroup label="{{ $question->question_text }}">@foreach($question->options as $option)<option value="{{ $option->id }}" @selected(old('question_option_id', $detail->question_option_id) == $option->id)>{{ $option->label }}</option>@endforeach</optgroup>@endforeach</select></div>
        </div>
        <div class="mt-4"><button class="btn btn-success"><i class="bi bi-save me-2"></i>Simpan</button></div>
    </form>
</div>
@endsection
