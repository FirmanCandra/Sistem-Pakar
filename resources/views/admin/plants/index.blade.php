@extends('layouts.app')
@section('title', 'Data Tanaman')
@section('content')
<div class="container py-5">
    @include('admin.partials.nav')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 fw-bold">Data Tanaman</h1>
        <a href="{{ route('admin.plants.create') }}" class="btn btn-success"><i class="bi bi-plus-circle me-2"></i>Tambah</a>
    </div>
    <div class="card table-responsive">
        <table class="table mb-0 align-middle">
            <thead><tr><th>Nama</th><th>Latin</th><th>Kesulitan</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
            @foreach ($plants as $plant)
                <tr>
                    <td>{{ $plant->name }}</td><td><em>{{ $plant->latin_name }}</em></td><td>{{ $plant->difficulty }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-success" href="{{ route('admin.plants.edit', $plant) }}"><i class="bi bi-pencil"></i></a>
                        <form class="d-inline" method="post" action="{{ route('admin.plants.destroy', $plant) }}">@csrf @method('delete')<button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></button></form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $plants->links() }}</div>
</div>
@endsection
