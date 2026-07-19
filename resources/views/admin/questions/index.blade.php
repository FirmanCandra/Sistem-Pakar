@extends('layouts.app')
@section('title', 'Data Pertanyaan')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 fw-bold">Data Pertanyaan</h1>
        <a href="{{ route('admin.questions.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Tambah</a>
    </div>
    <div class="card table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Urutan</th><th>Kode</th><th>Pertanyaan</th><th>Opsi</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->sort_order }}</td><td>{{ $question->code }}</td><td>{{ $question->question_text }}</td><td>{{ $question->options_count }}</td>
                    <td class="text-end"><a class="btn btn-sm btn-outline-success" href="{{ route('admin.questions.edit', $question) }}"><i class="bi bi-pencil"></i></a>
                        <form class="d-inline" method="post" action="{{ route('admin.questions.destroy', $question) }}">@csrf @method('delete')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></button></form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $questions->links() }}</div>
</div>
@endsection
