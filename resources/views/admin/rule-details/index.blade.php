@extends('layouts.app')
@section('title', 'Detail Rule')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 fw-bold">Detail Rule</h1>
        <a href="{{ route('admin.rule-details.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Tambah</a>
    </div>
    <div class="card table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Rule</th><th>Pertanyaan</th><th>Jawaban</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
            @foreach ($details as $detail)
                <tr><td>{{ $detail->rule->name }}</td><td>{{ $detail->question->question_text }}</td><td>{{ $detail->option->label }}</td>
                    <td class="text-end"><a class="btn btn-sm btn-outline-success" href="{{ route('admin.rule-details.edit', $detail) }}"><i class="bi bi-pencil"></i></a>
                        <form class="d-inline" method="post" action="{{ route('admin.rule-details.destroy', $detail) }}">@csrf @method('delete')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></button></form></td></tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $details->links() }}</div>
</div>
@endsection
