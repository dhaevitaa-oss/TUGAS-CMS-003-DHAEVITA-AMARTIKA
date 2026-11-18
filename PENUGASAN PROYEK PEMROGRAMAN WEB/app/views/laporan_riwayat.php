
<?php
$daftarBarang = $barang ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Barang - FINORA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #F5F8FC;
            font-family: Arial, sans-serif;
            color: #334155;
        }

        .navbar {
            background-color: #FFFFFF;
            border-bottom: 1px solid #E8EEF5;
        }

        .navbar-brand {
            color: #287FC1;
            font-weight: 800;
            letter-spacing: 1px;
            text-decoration: none;
        }

        .navbar-brand:hover {
            color: #21699F;
        }

        .page-title {
            color: #287FC1;
            font-weight: 700;
        }

        .page-description {
            color: #64748B;
        }

        .content-card {
            background-color: #FFFFFF;
            border: 1px solid #E8EEF5;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(40, 127, 193, 0.05);
        }

        .table thead th {
            background-color: #EAF4FC;
            color: #287FC1;
            font-weight: 600;
            white-space: nowrap;
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .barang-foto {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 9px;
            border: 1px solid #E2E8F0;
        }

        .foto-kosong {
            width: 65px;
            height: 65px;
            border-radius: 9px;
            background-color: #EEF5FC;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .status-badge {
            background-color: #F0EBFF;
            color: #765CD0;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn {
            border-radius: 7px;
            font-weight: 500;
        }

        .btn-kembali {
            background-color: #287FC1;
            color: #FFFFFF;
            border: none;
        }

        .btn-kembali:hover {
            background-color: #21699F;
            color: #FFFFFF;
        }

        .btn-tambah {
            background-color: #D8C8FF;
            color: #5B45A5;
            border: none;
        }

        .btn-tambah:hover {
            background-color: #C9B5FA;
            color: #49358F;
        }

        .empty-state {
            padding: 50px 15px;
            text-align: center;
            color: #64748B;
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 15px;
            color: #8B72E8;
        }

        .history-info {
            background-color: #F0EBFF;
            color: #5B45A5;
            border-radius: 10px;
            padding: 13px 16px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert {
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .content-card {
                padding: 14px;
            }

            .page-header {
                gap: 12px;
                align-items: flex-start !important;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="<?= site_url('/') ?>">
            FINORA.
        </a>

        <div class="ms-auto">
            <a href="<?= site_url('cari-barang') ?>"
               class="btn btn-sm btn-outline-primary">
                Cari Barang
            </a>
        </div>

    </div>
</nav>


<!-- KONTEN UTAMA -->

<div class="container py-5">

    <!-- HEADER -->

    <div class="d-flex justify-content-between page-header mb-4">

        <div>
            <h3 class="page-title mb-1">
                Riwayat Barang
            </h3>

            <p class="page-description mb-0">
                Daftar laporan barang yang telah selesai ditangani.
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">

            <a href="<?= site_url('laporan') ?>"
               class="btn btn-kembali">
                <i class="bi bi-arrow-left"></i>
                Daftar Barang
            </a>

            <a href="<?= site_url('laporan/create') ?>"
               class="btn btn-tambah">
                + Tambah Laporan
            </a>

        </div>

    </div>


    <!-- NOTIFIKASI -->

    <?php if (session()->getFlashdata('success')): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <?= esc(session()->getFlashdata('success')) ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="alert alert-danger alert-dismissible fade show">

            <?= esc(session()->getFlashdata('error')) ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- INFORMASI RIWAYAT -->

    <div class="history-info">

        <i class="bi bi-info-circle me-2"></i>

        Halaman ini menyimpan laporan barang yang sudah selesai.
        Data riwayat tetap ditampilkan sebagai dokumentasi laporan.

    </div>


    <!-- TABEL RIWAYAT -->

    <div class="content-card">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead>

                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Nama Barang</th>
                        <th>Jenis Laporan</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if (!empty($daftarBarang)): ?>

                        <?php $no = 1; ?>

                        <?php foreach ($daftarBarang as $item): ?>

                            <tr>

                                <td>
                                    <?= $no++ ?>
                                </td>

                                <td>

                                    <?php if (!empty($item['foto_barang'])): ?>

                                        <img
                                            src="<?= base_url('uploads/barang/' . rawurlencode(basename($item['foto_barang']))) ?>"
                                            alt="Foto <?= esc($item['nama_barang']) ?>"
                                            class="barang-foto"
                                        >

                                    <?php else: ?>

                                        <div class="foto-kosong">
                                            📦
                                        </div>

                                    <?php endif; ?>

                                </td>

                                <td>
                                    <strong>
                                        <?= esc($item['nama_barang']) ?>
                                    </strong>
                                </td>

                                <td>
                                    <?= esc($item['jenis_laporan']) ?>
                                </td>

                                <td>
                                    <?= esc($item['kategori']) ?>
                                </td>

                                <td>
                                    <?= esc($item['lokasi']) ?>
                                </td>

                                <td>
                                    <?= esc(date('d-m-Y', strtotime($item['tanggal_kejadian']))) ?>
                                </td>

                                <td>
                                    <span class="status-badge">
                                        <i class="bi bi-check-circle me-1"></i>
                                        <?= esc($item['status']) ?>
                                    </span>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="8">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-clock-history"></i>
                                    </div>

                                    <h5 class="fw-bold">
                                        Belum Ada Riwayat Barang
                                    </h5>

                                    <p class="mb-3">
                                        Laporan yang sudah selesai akan muncul di halaman ini.
                                    </p>

                                    <a href="<?= site_url('laporan') ?>"
                                       class="btn btn-kembali">
                                        Lihat Daftar Barang
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
