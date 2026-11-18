
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINORA | Lost & Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #102A43;
            --blue: #287FC1;
            --cyan: #53DDF2;
            --light: #F3F8FC;
            --purple: #8B72E8;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--light);
            color: var(--navy);
        }

        .navbar {
            background: white;
            padding: 18px 0;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            color: var(--blue);
            letter-spacing: 2px;
        }

        .nav-link {
            color: var(--navy);
            font-weight: 600;
        }

        .hero {
            background: linear-gradient(120deg, #102A43, #287FC1);
            color: white;
            padding: 90px 0;
            border-radius: 0 0 35px 35px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 800;
        }

        .hero p {
            color: #E1F4FF;
            font-size: 17px;
            line-height: 1.8;
        }

        .btn-main {
            background: var(--cyan);
            color: var(--navy);
            border: none;
            padding: 13px 25px;
            font-weight: 700;
            border-radius: 10px;
        }

        .btn-main:hover {
            background: #32c8df;
            color: var(--navy);
        }

        .section-title {
            font-weight: 800;
            color: var(--navy);
        }

        .feature-card {
            background: white;
            border: none;
            border-radius: 18px;
            padding: 28px;
            height: 100%;
            box-shadow: 0 5px 20px rgba(16, 42, 67, 0.06);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(40, 127, 193, 0.15);
        }

        .feature-icon {
            font-size: 35px;
            margin-bottom: 15px;
        }

        .feature-card h5 {
            font-weight: 700;
        }

        .feature-card p {
            color: #64748B;
            line-height: 1.7;
        }

        .feature-link {
            text-decoration: none;
            color: var(--navy);
            display: block;
            height: 100%;
        }

        .feature-link:hover {
            color: var(--navy);
        }

        .feature-action {
            color: var(--blue);
            font-weight: 700;
        }

        .report-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
        }

        footer {
            background: var(--navy);
            color: white;
            padding: 25px 0;
            margin-top: 70px;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 65px 0;
            }

            .hero h1 {
                font-size: 36px;
            }

            .report-section {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand brand" href="<?= site_url('/') ?>">FINORA.</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/') ?>">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#fitur">Fitur</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-primary px-4" href="<?= site_url('laporan/create') ?>">
                        Buat Laporan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge rounded-pill text-bg-info mb-3">
                    LOST & FOUND INFORMATION SYSTEM
                </span>

                <h1>Barang Hilang?<br>Temukan Kembali di FINORA.</h1>

                <p class="mt-3 mb-4">
                    Platform informasi barang hilang dan ditemukan.
                    Laporkan barang yang hilang atau bantu orang lain
                    menemukan barang miliknya dengan lebih mudah.
                </p>

                <a href="<?= site_url('laporan/create') ?>" class="btn btn-main">
                    Mulai Buat Laporan →
                </a>
            </div>

            <div class="col-lg-5 text-center mt-5 mt-lg-0">
                <div style="font-size: 120px;">🔎</div>
                <h4 class="fw-bold">Find it. Report it. Return it.</h4>
                <p>Setiap barang memiliki kesempatan untuk ditemukan.</p>
            </div>
        </div>
    </div>
</section>

<section class="container py-5" id="fitur">

    <div class="text-center mb-5">
        <h2 class="section-title">Apa yang Bisa Kamu Lakukan?</h2>
        <p class="text-secondary">
            Temukan fitur utama yang tersedia di FINORA.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <a href="<?= site_url('cari-barang') ?>" class="feature-link">
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h5>Cari Barang</h5>
                    <p>
                        Lihat informasi barang yang dilaporkan hilang
                        maupun ditemukan.
                    </p>
                    <span class="feature-action">Cari Sekarang →</span>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= site_url('laporan/create') ?>" class="feature-link">
                <div class="feature-card">
                    <div class="feature-icon">📝</div>
                    <h5>Buat Laporan</h5>
                    <p>
                        Masukkan informasi barang, kategori, lokasi,
                        dan tanggal kejadian.
                    </p>
                    <span class="feature-action">Buat Laporan →</span>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="<?= site_url('laporan') ?>" class="feature-link">
                <div class="feature-card">
                    <div class="feature-icon">📦</div>
                    <h5>Kelola Laporan</h5>
                    <p>
                        Lihat informasi daftar laporan barang yang
                        telah dimasukkan ke dalam sistem.
                    </p>
                    <span class="feature-action">Lihat Laporan →</span>
                </div>
            </a>
        </div>

    </div>
</section>

<section class="container" id="tentang">
    <div class="report-section text-center">
        <h2 class="section-title">Tentang FINORA</h2>

        <p class="text-secondary mt-3 mb-0">
            FINORA merupakan sistem informasi barang hilang dan ditemukan
            yang dirancang untuk membantu pengguna mencatat, mencari,
            dan mengelola laporan barang secara terstruktur.
        </p>
    </div>
</section>

<section class="container py-5">
    <div class="text-center">
        <h2 class="section-title">Punya Informasi Barang?</h2>
        <p class="text-secondary">
            Bantu proses pencarian dengan membuat laporan.
        </p>

        <a href="<?= site_url('laporan/create') ?>" class="btn btn-primary px-4 py-2">
            Laporkan Barang
        </a>
    </div>
</section>

<footer>
    <div class="container text-center">
        <h4 class="fw-bold">FINORA.</h4>
        <p class="mb-1">Find it. Report it. Return it.</p>
        <small>© 2026 FINORA. Lost & Found Information System.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
