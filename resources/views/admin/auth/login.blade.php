@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<section class="soft-section py-5 min-vh-100 d-flex align-items-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card lift p-4 shadow-sm">
                    <div class="text-center mb-4">
                        <span class="icon-box mx-auto mb-3"><i class="bi bi-shield-lock"></i></span>
                        <h1 class="h3 fw-bold mt-2">Login Admin</h1>
                        <p class="text-muted mb-0">Masuk untuk mengelola basis pengetahuan.</p>
                    </div>

                    @include('partials.errors')

                    <form method="post" action="{{ route('admin.login.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <button class="btn btn-success w-100">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
