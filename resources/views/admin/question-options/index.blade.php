@extends('layouts.app')
@section('title', 'Pilihan Jawaban')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 fw-bold">Pilihan Jawaban</h1>
        <a href="{{ route('admin.question-options.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Tambah</a>
    </div>
    <div class="card table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Pertanyaan</th><th>Value</th><th>Label</th><th>Urutan</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
            @foreach ($options as $option)
                <tr><td>{{ $option->question->question_text }}</td><td>{{ $option->value }}</td><td>{{ $option->label }}</td><td>{{ $option->sort_order }}</td>
                    <td class="text-end"><a class="btn btn-sm btn-outline-success" href="{{ route('admin.question-options.edit', $option) }}"><i class="bi bi-pencil"></i></a>
                        <form class="d-inline" method="post" action="{{ route('admin.question-options.destroy', $option) }}">@csrf @method('delete')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></button></form></td></tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $options->links() }}</div>
</div>
@endsection
