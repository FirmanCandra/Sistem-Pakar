@extends('layouts.app')

@section('title', 'Beranda - Sistem Pakar Tanaman Hias')

@section('content')
<section class="hero d-flex align-items-center">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 py-lg-5 fade-up">
                <h1 class="hero-title mb-4">Rekomendasi tanaman hias yang bikin ruang lebih <span class="accent">hidup</span>.</h1>
                <p class="hero-copy mb-5">Jawab beberapa pertanyaan sederhana tentang cahaya, kelembapan, pengalaman merawat, dan budget. Sistem akan mencocokkan fakta Anda dengan rule Forward Chaining.</p>
                <div class="d-flex flex-wrap align-items-center gap-4">
                    <a href="{{ route('consultations.create') }}" class="btn btn-light btn-lg px-4 shadow"><i class="bi bi-play-circle me-2"></i>Mulai Konsultasi</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="why-section py-5">
    <div class="container py-lg-5">
        <div class="text-center mb-5 fade scroll-fade" data-scroll-fade>
            <h2 class="why-title mb-0">Kami bantu pilih tanaman hias, <span class="accent">lebih mudah!</span></h2>
        </div>
        <div class="why-grid">
            <div class="why-item fade scroll-fade" data-scroll-fade>
                <div class="why-photo" style="--image: url('https://www.ruparupa.com/blog/wp-content/uploads/2020/09/Screen-Shot-2020-09-01-at-12.40.38.png');">
                    <span class="why-badge"><i class="bi bi-flower1"></i></span>
                </div>
                <div class="why-label">{{ $plantsCount }} Data Tanaman</div>
            </div>
            <div class="why-item fade scroll-fade" data-scroll-fade>
                <div class="why-photo" style="--image: url('https://images.unsplash.com/photo-1520412099551-62b6bafeb5bb?auto=format&fit=crop&w=700&q=80');">
                    <span class="why-badge"><i class="bi bi-ui-checks"></i></span>
                </div>
                <div class="why-label">{{ $questionsCount }} Pertanyaan Terarah</div>
            </div>
            <div class="why-item fade scroll-fade" data-scroll-fade>
                <div class="why-photo" style="--image: url('https://images.unsplash.com/photo-1485955900006-10f4d324d411?auto=format&fit=crop&w=700&q=80');">
                    <span class="why-badge"><i class="bi bi-diagram-3"></i></span>
                </div>
                <div class="why-label">{{ $rulesCount }} Rule Inferensi</div>
            </div>
            <div class="why-item fade scroll-fade" data-scroll-fade>
                <div class="why-photo" style="--image: url('https://i.pinimg.com/736x/a3/e9/ab/a3e9ab90c10be9e3755688e94aaefcc6.jpg');">
                    <span class="why-badge"><i class="bi bi-check2-circle"></i></span>
                </div>
                <div class="why-label">Basis Siap Pakai</div>
            </div>
        </div>
    </div>
</section>
<section class="plant-stage py-5">
    <div class="plant-stage-content fade scroll-fade" data-scroll-fade>
        <img class="plant-stage-image" src="https://png.pngtree.com/png-vector/20241230/ourmid/pngtree-decorative-houseplant-in-a-modern-pot-png-image_14863381.png" alt="Tanaman hias ficus tanpa latar belakang">
    </div>
</section>
<section class="services-orbit py-5">
    <div class="container py-lg-5">
        <div class="text-center mb-5 fade scroll-fade" data-scroll-fade>
            <h2 class="services-title mb-0">Kami ahli membantu</h2>
        </div>
        <div class="service-feature-grid">
            <div class="service-column">
                <div class="service-point fade scroll-fade" data-scroll-fade>
                    <span class="service-bubble"><i class="bi bi-ui-checks"></i></span>
                    <h3>Jawab Pertanyaan</h3>
                    <p>Input berasal dari kondisi ruangan, intensitas cahaya, budget, dan profil perawatan.</p>
                </div>
                <div class="service-point fade scroll-fade" data-scroll-fade>
                    <span class="service-bubble"><i class="bi bi-sliders"></i></span>
                    <h3>Profil Perawatan</h3>
                    <p>Sistem membaca kebiasaan dan kemampuan pengguna agar rekomendasi lebih realistis.</p>
                </div>
            </div>
            <div class="service-plant fade scroll-fade" data-scroll-fade>
                <img src="https://png.pngtree.com/png-vector/20240710/ourmid/pngtree-indoor-plants-bird-of-paradise-strelitzia-reginae-in-a-white-pot-png-image_13051295.png" alt="Tanaman hias hijau tanpa latar belakang sebagai pusat layanan sistem pakar">
            </div>
            <div class="service-column">
                <div class="service-point fade scroll-fade" data-scroll-fade>
                    <span class="service-bubble"><i class="bi bi-diagram-3"></i></span>
                    <h3>Forward Chaining</h3>
                    <p>Fakta pengguna dicocokkan dengan seluruh rule aktif yang tersimpan di database.</p>
                </div>
                <div class="service-point fade scroll-fade" data-scroll-fade>
                    <span class="service-bubble"><i class="bi bi-flower2"></i></span>
                    <h3>Hasil Rekomendasi</h3>
                    <p>Tanaman yang cocok ditampilkan tanpa duplikasi agar mudah dibandingkan.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="expert-section py-5">
    <div class="container py-lg-5">
        <div class="text-center mb-5 fade scroll-fade" data-scroll-fade>
            <h2 class="expert-title mb-3">Keputusan terasa sederhana<br>rule tetap <span class="accent">transparan</span>.</h2>
            <p class="text-muted lh-lg mx-auto mb-0" style="max-width: 720px;">Cocok untuk pengguna yang ingin mulai merawat tanaman hias tanpa menebak-nebak. Admin tetap bisa mengelola tanaman, pertanyaan, opsi jawaban, dan rule dari dashboard.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-3 col-sm-6 fade scroll-fade" data-scroll-fade>
                <div class="expert-stat">
                    <div class="expert-number">01</div>
                    <div class="expert-label">Kumpulkan fakta</div>
                    <p class="text-muted small mt-3 mb-0">Jawaban konsultasi menjadi fakta awal.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 fade scroll-fade" data-scroll-fade>
                <div class="expert-stat">
                    <div class="expert-number">02</div>
                    <div class="expert-label">Cek rule</div>
                    <p class="text-muted small mt-3 mb-0">Semua kondisi rule harus terpenuhi. </br></p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 fade scroll-fade" data-scroll-fade>
                <div class="expert-stat">
                    <div class="expert-number">03</div>
                    <div class="expert-label">Ambil tanaman</div>
                    <p class="text-muted small mt-3 mb-0">Rule cocok = rekomendasi tanaman.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 fade scroll-fade" data-scroll-fade>
                <div class="expert-stat">
                    <div class="expert-number">04</div>
                    <div class="expert-label">Tampilkan hasil</div>
                    <p class="text-muted small mt-3 mb-0">Rekomendasi mudah dibaca.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
