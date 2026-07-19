<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Pakar Tanaman Hias')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --leaf: #52c58f;
            --leaf-dark: #078ea4;
            --leaf-deep: #118c72;
            --mint: #e8f8f3;
            --mist: #edf8fa;
            --ink: #17191c;
            --muted: #838b8f;
            --line: rgba(23, 25, 28, .08);
            --page: #f7fbfb;
            --panel: rgba(255, 255, 255, .96);
            --shadow: 0 1.4rem 3.4rem rgba(16, 46, 55, .09);
            --font-theme: Arial, "Helvetica Neue", Helvetica, system-ui, -apple-system, "Segoe UI", sans-serif;
        }
        html { scroll-behavior: smooth; }
        body {
            font-family: var(--font-theme);
            background: #fff;
            color: var(--ink);
            font-feature-settings: "cv02", "cv03", "cv04";
            overflow-x: hidden;
        }
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6,
        .display-1, .display-2, .display-3, .display-4, .display-5, .display-6 {
            font-family: var(--font-theme);
            color: var(--ink);
            font-weight: 900;
            line-height: 1.13;
            letter-spacing: 0;
        }
        .fw-bold, .fw-semibold {
            font-weight: 900 !important;
        }
        a, .btn, .card, .form-control, .form-select, .option-card {
            transition: all .22s ease;
        }
        .site-shell {
            min-height: 100vh;
            background:
                linear-gradient(180deg, #fff 0 42rem, var(--mist) 42rem 100%),
                radial-gradient(circle at 78% 8%, rgba(82, 197, 143, .13), transparent 24rem);
        }
        .site-nav {
            top: 0;
            padding: 1.35rem 0;
            background: transparent !important;
            border-bottom: 0;
            transition: padding .25s ease, background .25s ease, box-shadow .25s ease;
        }
        .nav-frame {
            width: calc(100% - 2.5rem);
            max-width: 1420px;
            margin: 0 auto;
            padding: 1.05rem 1.8rem;
            display: flex;
            align-items: center;
            border: 1px solid rgba(23, 25, 28, .04);
            border-radius: 999px;
            background: rgba(255, 255, 255, .95);
            backdrop-filter: blur(18px);
            box-shadow: 0 1.2rem 3rem rgba(16, 46, 55, .11);
            transition: width .25s ease, max-width .25s ease, border-radius .25s ease, padding .25s ease, box-shadow .25s ease, border-color .25s ease;
        }
        .site-nav.is-scrolled {
            padding: .65rem 0;
            background: transparent !important;
            box-shadow: none;
        }
        .site-nav.is-scrolled .nav-frame {
            width: calc(100% - 2rem);
            max-width: 1380px;
            padding: .78rem 1.45rem;
            border-radius: 999px;
            border-color: rgba(255, 255, 255, .52);
            background: rgba(255, 255, 255, .68);
            backdrop-filter: blur(24px) saturate(150%);
            box-shadow: 0 .9rem 2.4rem rgba(16, 46, 55, .13);
        }
        .navbar-brand {
            display: inline-flex;
            align-items: center;
            gap: .7rem;
            color: var(--ink) !important;
            letter-spacing: 0;
            line-height: 1.05;
        }
        .brand-mark {
            width: 46px;
            height: 46px;
            display: inline-grid;
            place-items: center;
            border-radius: 14px 14px 22px 14px;
            color: #fff;
            background: linear-gradient(135deg, var(--leaf), var(--leaf-dark));
            box-shadow: 0 .85rem 1.8rem rgba(82, 197, 143, .28);
            transform: rotate(-8deg);
        }
        .brand-mark i { transform: rotate(8deg); font-size: 1.5rem; }
        .brand-title { display: block; font-size: 1.18rem; font-weight: 800; }
        .brand-subtitle {
            display: block;
            margin-top: .12rem;
            color: #6d7376;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .11rem;
            text-transform: uppercase;
        }
        .nav-link {
            color: #555b60 !important;
            border-radius: 999px;
            padding: .55rem .95rem !important;
            font-weight: 700;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--leaf) !important;
            background: rgba(82, 197, 143, .12);
        }
        .navbar-toggler {
            border: 0;
            border-radius: 999px;
            box-shadow: none !important;
        }
        .btn {
            border-radius: 999px;
            font-weight: 800;
            letter-spacing: 0;
        }
        .btn-success {
            background: linear-gradient(135deg, var(--leaf), var(--leaf-dark)) !important;
            border-color: transparent;
            box-shadow: 0 1rem 2.1rem rgba(7, 142, 164, .2);
        }
        .btn-success:hover {
            transform: translateY(-1px);
            box-shadow: 0 1.15rem 2.35rem rgba(7, 142, 164, .25);
        }
        .btn-outline-success { border-color: var(--leaf); color: var(--leaf); }
        .btn-outline-success:hover { background-color: var(--leaf); border-color: var(--leaf); }
        .hero {
            position: relative;
            overflow: hidden;
            min-height: 690px;
            background: #fff;
        }
        .hero::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 45%;
            height: 96%;
            background:
                linear-gradient(rgba(255,255,255,.34), rgba(255,255,255,.34)),
                url('https://images.unsplash.com/photo-1485955900006-10f4d324d411?auto=format&fit=crop&w=1600&q=80') center/cover;
            border-bottom-left-radius: 48% 58%;
            box-shadow: inset 1.8rem -2rem 0 rgba(223, 232, 230, .72), inset 3rem -3.2rem 0 rgba(244, 248, 247, .9);
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: auto 0 0;
            height: 86px;
            background: linear-gradient(180deg, transparent, #fff);
            pointer-events: none;
        }
        .hero > .container { position: relative; z-index: 1; }
        .eyebrow {
            color: var(--leaf);
            font-size: .82rem;
            font-weight: 800;
            letter-spacing: .38rem;
            text-transform: uppercase;
        }
        .hero-title {
            max-width: 560px;
            color: #050607;
            font-size: clamp(2.35rem, 5vw, 4.8rem);
            font-weight: 900;
            line-height: 1.13;
        }
        .hero-title .accent {
            color: var(--leaf-dark);
            text-decoration: underline;
            text-decoration-thickness: .12em;
            text-underline-offset: .08em;
        }
        .hero-copy {
            max-width: 510px;
            color: #6f777b;
            font-weight: 500;
            line-height: 1.8;
        }
        .soft-section { background: linear-gradient(180deg, rgba(237, 248, 250, .72), rgba(255, 255, 255, .75)); }
        .card {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: var(--shadow);
        }
        .lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 1.6rem 3rem rgba(16, 46, 55, .13);
        }
        .why-section {
            position: relative;
            overflow: hidden;
            background: #fff;
        }
        .why-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 330px;
            padding: .75rem 2rem;
            border-radius: 999px;
            color: #5f6569;
            background: #f0f0f0;
            font-size: 1.1rem;
            font-weight: 800;
        }
        .why-title {
            color: #050607;
            font-size: clamp(2rem, 4vw, 3.6rem);
            font-weight: 900;
            line-height: 1.16;
        }
        .why-title .accent {
            color: var(--leaf-dark);
            text-decoration: underline;
            text-decoration-thickness: .08em;
            text-underline-offset: .16em;
        }
        .why-grid {
            position: relative;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: clamp(1.5rem, 3vw, 3rem);
        }
        .why-grid::before {
            content: "";
            position: absolute;
            top: 132px;
            left: 11%;
            right: 11%;
            height: 4px;
            border-radius: 999px;
            background: linear-gradient(90deg, transparent, var(--leaf), var(--leaf-dark), var(--leaf), transparent);
            opacity: .8;
        }
        .why-item {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        .why-photo {
            position: relative;
            width: min(22vw, 250px);
            aspect-ratio: 1;
            margin: 0 auto 4.4rem;
            border-radius: 50%;
            background: var(--image) center/cover;
            box-shadow: 0 1rem 2.3rem rgba(16, 46, 55, .16);
        }
        .why-badge {
            position: absolute;
            left: 50%;
            bottom: -38px;
            width: 76px;
            height: 76px;
            display: grid;
            place-items: center;
            color: #fff;
            border: 7px solid #fff;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--leaf), var(--leaf-dark));
            box-shadow: 0 1rem 2rem rgba(7, 142, 164, .22);
            transform: translateX(-50%);
            font-size: 1.9rem;
        }
        .why-label {
            color: #111;
            font-size: 1.2rem;
            font-weight: 900;
            line-height: 1.25;
        }
        .plant-stage {
            position: relative;
            min-height: 560px;
            display: flex;
            align-items: flex-end;
            overflow: hidden;
            background: #fff;
        }
        .plant-stage::before,
        .plant-stage::after {
            content: "";
            position: absolute;
            left: -8%;
            right: -8%;
            bottom: -16%;
            height: 46%;
            border-radius: 50% 50% 0 0 / 34% 34% 0 0;
        }
        .plant-stage::before {
            bottom: 6%;
            background: linear-gradient(135deg, var(--leaf), var(--leaf-dark));
            transform: rotate(-2deg);
        }
        .plant-stage::after {
            background: linear-gradient(180deg, var(--mint), #dff7f2);
            transform: rotate(2deg);
        }
        .plant-stage-content {
            position: relative;
            z-index: 2;
            width: min(1180px, 90vw);
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(280px, 520px);
            gap: clamp(2rem, 6vw, 6rem);
            align-items: end;
            text-align: left;
        }
        .plant-stage-image {
            width: min(500px, 42vw);
            max-height: 520px;
            margin: 0 0 -1rem auto;
            object-fit: contain;
            object-position: bottom center;
            border: 0;
            border-radius: 0;
            filter: drop-shadow(0 1.9rem 2.6rem rgba(3, 25, 21, .26));
        }
        .services-orbit {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 50% 58%, rgba(255, 255, 255, .78), transparent 20rem),
                linear-gradient(180deg, var(--mint), #dff7f2);
        }
        .services-kicker {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            color: var(--leaf-dark);
            font-family: var(--font-theme);
            font-size: 1.35rem;
            font-weight: 900;
        }
        .services-kicker::before,
        .services-kicker::after {
            content: "";
            width: 64px;
            height: 2px;
            background: var(--leaf);
        }
        .services-title {
            color: var(--leaf-deep);
            font-family: var(--font-theme);
            font-size: clamp(2rem, 4vw, 3.7rem);
            font-weight: 900;
        }
        .service-feature-grid {
            position: relative;
            display: grid;
            grid-template-columns: 1fr minmax(260px, 420px) 1fr;
            gap: clamp(2rem, 5vw, 5rem);
            align-items: center;
        }
        .service-column {
            display: grid;
            gap: 4rem;
        }
        .service-point {
            position: relative;
            max-width: 330px;
        }
        .service-column:first-child .service-point {
            margin-left: auto;
            text-align: right;
        }
        .service-column:last-child .service-point {
            margin-right: auto;
        }
        .service-point h3 {
            color: var(--leaf-deep);
            font-family: var(--font-theme);
            font-size: 1.65rem;
            font-weight: 900;
            margin-bottom: .8rem;
        }
        .service-point p {
            color: #7d8589;
            line-height: 1.8;
            margin: 0;
        }
        .service-bubble {
            position: absolute;
            top: -.25rem;
            width: 66px;
            height: 66px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: var(--leaf-dark);
            background: rgba(82, 197, 143, .12);
            font-size: 1.8rem;
        }
        .service-column:first-child .service-bubble { right: -5.2rem; }
        .service-column:last-child .service-bubble { left: -5.2rem; }
        .service-plant {
            align-self: end;
            width: min(420px, 78vw);
            margin: 0 auto;
            filter: drop-shadow(0 1.6rem 2.8rem rgba(16, 46, 55, .2));
        }
        .service-plant img {
            width: 100%;
            max-height: 520px;
            object-fit: contain;
            object-position: bottom center;
            border-radius: 0;
            border: 0;
        }
        .services-orbit::after {
            content: "";
            position: absolute;
            left: -12%;
            right: -12%;
            bottom: -12%;
            height: 24%;
            border-radius: 50% 50% 0 0 / 42% 42% 0 0;
            background: rgba(82, 197, 143, .12);
        }
        .expert-section {
            background: linear-gradient(180deg, var(--mint), #dff7f2);
        }
        .expert-pill {
            display: inline-flex;
            justify-content: center;
            min-width: 320px;
            padding: .65rem 1.7rem;
            border-radius: 999px;
            color: var(--leaf-deep);
            background: rgba(255, 255, 255, .52);
            font-size: 1.05rem;
            font-weight: 800;
            backdrop-filter: blur(12px);
        }
        .expert-title {
            color: var(--ink);
            font-size: clamp(2rem, 4vw, 3.6rem);
            font-weight: 900;
            line-height: 1.3;
        }
        .expert-title .accent {
            color: var(--leaf-dark);
            text-decoration: underline;
            text-decoration-thickness: .08em;
            text-underline-offset: .16em;
        }
        .expert-stat {
            min-height: 190px;
            padding: 2rem 1.2rem 1.4rem;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, .62);
            border-radius: 8px;
            background: rgba(255, 255, 255, .42);
            box-shadow: 0 1.2rem 2.8rem rgba(16, 46, 55, .08);
            backdrop-filter: blur(10px);
        }
        .expert-number {
            color: var(--leaf-dark);
            font-size: clamp(3rem, 6vw, 5rem);
            font-weight: 900;
            line-height: 1;
        }
        .expert-label {
            display: inline-flex;
            justify-content: center;
            min-width: 155px;
            margin-top: 1.2rem;
            padding: .55rem 1.4rem;
            border-radius: 999px;
            color: var(--ink);
            background: rgba(255, 255, 255, .9);
            font-weight: 900;
        }
        .text-leaf { color: var(--leaf); }
        .icon-box {
            width: 58px;
            height: 58px;
            display: inline-grid;
            place-items: center;
            border-radius: 8px;
            background: rgba(82, 197, 143, .11);
            color: var(--leaf-dark);
            font-size: 1.55rem;
        }
        .page-heading {
            padding: 2rem;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: linear-gradient(135deg, rgba(255,255,255,.96), rgba(232,248,243,.86));
            box-shadow: var(--shadow);
        }
        .form-control, .form-select {
            border-color: var(--line);
            border-radius: 8px;
            padding: .68rem .82rem;
        }
        .form-control:focus, .form-select:focus, .form-check-input:focus {
            border-color: rgba(47, 111, 78, .55);
            box-shadow: 0 0 0 .22rem rgba(47, 111, 78, .12);
        }
        .table {
            --bs-table-bg: transparent;
        }
        .table thead th {
            color: var(--muted);
            font-size: .76rem;
            text-transform: uppercase;
            letter-spacing: .04rem;
            background: rgba(223, 243, 232, .45);
        }
        .badge {
            font-weight: 600;
        }
        .progress {
            height: .85rem;
            background: rgba(47, 111, 78, .12);
            border-radius: 999px;
            overflow: hidden;
        }
        .progress-bar {
            transition: width .35s ease;
        }
        .site-footer {
            position: relative;
            margin-top: 4.5rem;
            padding: 3.35rem 1rem 3.1rem;
            text-align: center;
            background: #078ea4;
            color: rgba(255, 255, 255, .82);
        }
        .site-footer::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -72px;
            height: 74px;
            background: #078ea4;
            clip-path: ellipse(72% 100% at 50% 100%);
        }
        .site-footer > .container {
            position: relative;
            z-index: 1;
        }
        .footer-title {
            margin-bottom: 1rem;
            color: #fff;
            font-size: clamp(2.15rem, 6vw, 3.45rem);
            font-weight: 900;
            line-height: .95;
            text-transform: uppercase;
        }
        .footer-copy {
            margin: 0;
            color: rgba(255, 255, 255, .78);
            font-size: .9rem;
            font-style: italic;
        }
        .option-card {
            cursor: pointer;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fff;
        }
        .option-card:hover {
            border-color: rgba(47, 111, 78, .42);
            background: #f8fcf9;
            transform: translateY(-1px);
        }
        .option-card:has(.form-check-input:checked) {
            border-color: var(--leaf);
            background: var(--mint);
            box-shadow: inset 0 0 0 1px rgba(82, 197, 143, .16);
        }
        .fade-up {
            animation: fadeUp .55s ease both;
        }
        .fade-up-delay {
            animation: fadeUp .7s ease .08s both;
        }
        .scroll-fade.fade {
            opacity: 0;
            transition-duration: .7s;
        }
        .scroll-fade.fade.show {
            opacity: 1 !important;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation: none !important; transition: none !important; }
            .scroll-fade.fade { opacity: 1; }
        }
        @media (max-width: 991.98px) {
            .site-nav { padding: .85rem 0; }
            .nav-frame {
                width: calc(100% - 1.25rem);
                padding: .8rem 1rem;
                border-radius: 28px;
                flex-wrap: wrap;
            }
            .site-nav.is-scrolled .nav-frame {
                padding: .75rem 1rem;
                width: calc(100% - 1.25rem);
            }
            .navbar-collapse {
                margin-top: 1rem;
                padding: 1rem;
                border-radius: 8px;
                background: #fff;
                box-shadow: var(--shadow);
            }
            .hero { min-height: auto; padding-top: 3.5rem; }
            .hero::before {
                position: relative;
                display: block;
                inset: auto;
                width: min(92vw, 640px);
                height: 360px;
                margin: 2rem auto 0;
                border-radius: 44% 0 0 44% / 34% 0 0 34%;
            }
            .why-pill {
                min-width: 0;
                width: 100%;
                font-size: 1rem;
            }
            .why-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 2.4rem 1.2rem;
            }
            .why-grid::before { display: none; }
            .why-photo {
                width: min(38vw, 210px);
                margin-bottom: 3.7rem;
            }
            .why-label { font-size: 1rem; }
            .plant-stage { min-height: 560px; }
            .plant-stage-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .plant-stage-image {
                width: min(78vw, 420px);
                margin-inline: auto;
            }
            .service-feature-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }
            .service-column { gap: 1.5rem; }
            .service-column:first-child .service-point,
            .service-column:last-child .service-point {
                margin: 0 auto;
                text-align: center;
            }
            .service-bubble {
                position: static;
                margin: 0 auto 1rem;
            }
            .service-plant { order: -1; }
            .expert-pill {
                min-width: 0;
                width: 100%;
            }
        }
        @media (max-width: 575.98px) {
            .why-grid { grid-template-columns: 1fr; }
            .why-photo { width: min(72vw, 240px); }
        }
    </style>
</head>
<body>
<div id="top" class="site-shell">
<nav id="siteNavbar" class="navbar navbar-expand-lg sticky-top site-nav">
    <div class="nav-frame">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="brand-mark"><i class="bi bi-flower1"></i></span>
            <span>
                <span class="brand-title">Sistem Pakar</span>
                <span class="brand-subtitle">Tanaman Hias</span>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-label="Toggle navigation"><i class="bi bi-list fs-2"></i></button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-lg-auto gap-lg-3">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('consultations.*') ? 'active' : '' }}" href="{{ route('consultations.create') }}">Konsultasi</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ auth()->check() ? route('admin.dashboard') : route('admin.login') }}">Admin</a></li>
            </ul>
            <a href="{{ route('consultations.create') }}" class="btn btn-success px-4 py-3 mt-3 mt-lg-0">Mulai Diagnosa</a>
        </div>
    </div>
</nav>

@if (session('success'))
    <div class="container mt-3"><div class="alert alert-success">{{ session('success') }}</div></div>
@endif

<main class="fade-up">
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container">
        <div class="footer-title">KELOMPOK 7</div>
        <p class="footer-copy">Metode Forward Chaining murni berbasis rule database.</p>
    </div>
</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    (() => {
        const navbar = document.getElementById('siteNavbar');
        const updateNavbar = () => navbar?.classList.toggle('is-scrolled', window.scrollY > 24);
        updateNavbar();
        window.addEventListener('scroll', updateNavbar, { passive: true });

        const scrollFadeItems = [...document.querySelectorAll('[data-scroll-fade]')];
        const showScrollFadeItem = item => item.classList.add('show');

        const revealVisibleItems = () => {
            const triggerLine = window.innerHeight * 0.88;

            scrollFadeItems.forEach(item => {
                if (item.classList.contains('show')) {
                    return;
                }

                const rect = item.getBoundingClientRect();
                if (rect.top <= triggerLine && rect.bottom >= 0) {
                    showScrollFadeItem(item);
                }
            });
        };

        revealVisibleItems();

        if (!('IntersectionObserver' in window)) {
            window.addEventListener('scroll', revealVisibleItems, { passive: true });
            window.addEventListener('resize', revealVisibleItems);
            return;
        }

        const scrollFadeObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) {
                    return;
                }

                showScrollFadeItem(entry.target);
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.16, rootMargin: '0px 0px -70px 0px' });

        scrollFadeItems.forEach(item => scrollFadeObserver.observe(item));
        window.addEventListener('scroll', revealVisibleItems, { passive: true });
        window.addEventListener('resize', revealVisibleItems);
    })();
</script>
@stack('scripts')
</body>
</html>
