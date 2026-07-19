@extends('layouts.app')
@section('title', 'Data Rule')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 fw-bold">Data Rule</h1>
        <a href="{{ route('admin.rules.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Tambah</a>
    </div>
    <div class="card table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Nama</th><th>Jumlah Kondisi</th><th>Jumlah Tanaman</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
            @foreach ($rules as $rule)
                <tr><td>{{ $rule->name }}</td><td>{{ $rule->details_count }}</td><td>{{ count($rule->plant_ids ?? []) }}</td>
                    <td class="text-end"><a class="btn btn-sm btn-outline-success" href="{{ route('admin.rules.edit', $rule) }}"><i class="bi bi-pencil"></i></a>
                        <form class="d-inline" method="post" action="{{ route('admin.rules.destroy', $rule) }}">@csrf @method('delete')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></button></form></td></tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $rules->links() }}</div>
</div>
@endsection
