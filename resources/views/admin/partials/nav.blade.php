<div class="card p-2 mb-4">
<div class="d-flex flex-wrap align-items-center gap-2">
    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-1"></i>Dashboard</a>
    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.plants.index') }}"><i class="bi bi-flower1 me-1"></i>Tanaman</a>
    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.questions.index') }}"><i class="bi bi-question-circle me-1"></i>Pertanyaan</a>
    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.question-options.index') }}"><i class="bi bi-list-check me-1"></i>Pilihan</a>
    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.rules.index') }}"><i class="bi bi-diagram-3 me-1"></i>Rule</a>
    <a class="btn btn-sm btn-outline-success" href="{{ route('admin.rule-details.index') }}"><i class="bi bi-sliders me-1"></i>Detail Rule</a>
    <form method="post" action="{{ route('admin.logout') }}" class="ms-auto">
        @csrf
        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-box-arrow-right me-1"></i>Logout</button>
    </form>
</div>
</div>
