<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Barang - FINORA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #F3F8FC;
            color: #102A43;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            color: #287FC1;
            font-size: 25px;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #287FC1;
        }

        .nav-link {
            color: #102A43;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #287FC1;
        }

        .page-header {
            background: linear-gradient(135deg, #287FC1, #53B5E8);
            color: white;
            padding: 45px 20px;
            border-radius: 18px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .search-box {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #102A43;
        }

        .form-control,
        .form-select {
            border-radius: 9px;
            padding: 11px;
            border: 1px solid #D6E2EC;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #287FC1;
            box-shadow: 0 0 0 0.2rem rgba(40, 127, 193, 0.15);
        }

        .btn-search {
            background-color: #287FC1;
            color: white;
            border-radius: 9px;
            padding: 11px 20px;
            font-weight: bold;
            border: none;
        }

        .btn-search:hover {
            background-color: #1D639A;
            color: white;
        }

        .btn-reset {
            background-color: #E8F1F8;
            color: #287FC1;
            border-radius: 9px;
            padding: 11px 20px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-reset:hover {
            background-color: #D6E8F5;
            color: #1D639A;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .item-card {
            background: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        .item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 22px rgba(40, 127, 193, 0.15);
        }

        .item-image {
            width: 100%;
            height: 210px;
            object-fit: cover;
            background-color: #E8F1F8;
        }

        .item-image-placeholder {
            width: 100%;
            height: 210px;
            background: linear-gradient(135deg, #E8F1F8, #D6E8F5);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 65px;
        }

        .card-body {
            padding: 20px;
        }

        .item-title {
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 12px;
            color: #102A43;
        }

        .badge-hilang {
            background-color: #FCE4E4;
            color: #D64545;
            padding: 7px 12px;
            border-radius: 20px;
        }

        .badge-ditemukan {
            background-color: #DDF5E8;
            color: #198754;
            padding: 7px 12px;
            border-radius: 20px;
        }

        .item-info {
            font-size: 14px;
            color: #526777;
            margin-bottom: 8px;
        }

        .item-description {
            color: #526777;
            font-size: 14px;
            line-height: 1.6;
            margin-top: 12px;
        }

        .empty-box {
            background: white;
            border-radius: 15px;
            padding: 50px 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        footer {
            margin-top: 60px;
            padding: 25px;
            text-align: center;
            color: #718096;
            background: white;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('/') ?>">FINORA</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?= site_url('/') ?>">Beranda</a>
                <a class="nav-link active" href="<?= site_url('cari-barang') ?>">Cari Barang</a>
                <a class="nav-link" href="<?= site_url('laporan/create') ?>">Buat Laporan</a>
                <a class="nav-link" href="<?= site_url('laporan') ?>">Kelola Laporan</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">

    <div class="page-header text-center">
        <h1>Temukan Barangmu</h1>
        <p class="mb-0">
            Cari informasi barang hilang dan barang yang telah ditemukan.
        </p>
    </div>

    <div class="search-box">
        <h4 class="fw-bold mb-4">Cari Barang</h4>

        <form action="<?= site_url('cari-barang') ?>" method="GET">

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nama Barang</label>
                    <input
                        type="text"
                        name="keyword"
                        class="form-control"
                        placeholder="Masukkan nama barang..."
                        value="<?= esc($keyword ?? '') ?>"
                    >
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jenis Laporan</label>
                    <select name="jenis" class="form-select">
                        <option value="">Semua Jenis</option>
                        <option value="Hilang" <?= ($jenis ?? '') == 'Hilang' ? 'selected' : '' ?>>
                            Barang Hilang
                        </option>
                        <option value="Ditemukan" <?= ($jenis ?? '') == 'Ditemukan' ? 'selected' : '' ?>>
                            Barang Ditemukan
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kategori Barang</label>
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>

                        <?php
                        $daftarKategori = [
                            'Elektronik',
                            'Aksesoris',
                            'Dokumen',
                            'Pakaian',
                            'Alat Tulis',
                            'Lainnya'
                        ];
                        ?>

                        <?php foreach ($daftarKategori as $kategoriItem): ?>
                            <option
                                value="<?= esc($kategoriItem) ?>"
                                <?= ($kategori ?? '') == $kategoriItem ? 'selected' : '' ?>
                            >
                                <?= esc($kategoriItem) ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Urutkan Berdasarkan</label>
                    <select name="urutan" class="form-select">
                        <option value="terbaru" <?= ($urutan ?? 'terbaru') == 'terbaru' ? 'selected' : '' ?>>
                            Terbaru
                        </option>
                        <option value="terlama" <?= ($urutan ?? '') == 'terlama' ? 'selected' : '' ?>>
                            Terlama
                        </option>
                    </select>
                </div>

                <div class="col-12 d-flex gap-2 flex-wrap">
                    <button type="submit" class="btn btn-search">
                        🔍 Cari Barang
                    </button>

                    <a href="<?= site_url('cari-barang') ?>" class="btn-reset">
                        Reset
                    </a>
                </div>

            </div>
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="section-title mb-0">Daftar Barang</h4>
        <a href="<?= site_url('laporan/create') ?>" class="btn btn-search">
            + Buat Laporan
        </a>
    </div>

    <div class="row g-4">

        <?php if (!empty($barang)): ?>

            <?php foreach ($barang as $item): ?>

                <div class="col-md-6 col-lg-4">

                    <div class="item-card">

                        <?php
                        $foto = $item['foto_barang'] ?? '';
                        $lokasiFoto = FCPATH . 'uploads/barang/' . $foto;
                        ?>

                        <?php if (!empty($foto) && is_file($lokasiFoto)): ?>

                            <img
                                src="<?= base_url('uploads/barang/' . rawurlencode($foto)) ?>"
                                alt="<?= esc($item['nama_barang']) ?>"
                                class="item-image"
                            >

                        <?php else: ?>

                            <div class="item-image-placeholder">
                                📦
                            </div>

                        <?php endif; ?>

                        <div class="card-body">

                            <div class="mb-3">

                                <?php if (($item['jenis_laporan'] ?? '') == 'Hilang'): ?>

                                    <span class="badge-hilang">
                                        Barang Hilang
                                    </span>

                                <?php else: ?>

                                    <span class="badge-ditemukan">
                                        Barang Ditemukan
                                    </span>

                                <?php endif; ?>

                            </div>

                            <h5 class="item-title">
                                <?= esc($item['nama_barang'] ?? '-') ?>
                            </h5>

                            <div class="item-info">
                                📁 Kategori:
                                <?= esc($item['kategori'] ?? '-') ?>
                            </div>

                            <div class="item-info">
                                📍 Lokasi:
                                <?= esc($item['lokasi'] ?? '-') ?>
                            </div>

                            <div class="item-info">
                                📅 Tanggal:
                                <?= !empty($item['tanggal_kejadian'])
                                    ? date('d-m-Y', strtotime($item['tanggal_kejadian']))
                                    : '-' ?>
                            </div>

                            <p class="item-description">
                                <?= esc($item['deskripsi'] ?? 'Tidak ada deskripsi.') ?>
                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="col-12">
                <div class="empty-box">
                    <div class="empty-icon">🔎</div>

                    <h5 class="fw-bold">Barang Tidak Ditemukan</h5>

                    <p class="text-secondary mb-3">
                        Belum ada data barang yang sesuai dengan pencarianmu.
                    </p>

                    <a href="<?= site_url('laporan/create') ?>" class="btn btn-search">
                        Buat Laporan Barang
                    </a>
                </div>
            </div>

        <?php endif; ?>

    </div>

</div>

<footer>
    <p class="mb-0">
        © <?= date('Y') ?> FINORA - Sistem Informasi Lost and Found
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>