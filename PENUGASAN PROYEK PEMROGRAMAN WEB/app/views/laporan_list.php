
<?php
$daftarBarang = $laporan ?? $barang ?? $dataBarang ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - FINORA</title>

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

        .btn {
            border-radius: 7px;
            font-weight: 500;
            white-space: nowrap;
        }

        .btn-edit {
            background-color: #287FC1;
            color: #FFFFFF;
            border: none;
        }

        .btn-edit:hover {
            background-color: #21699F;
            color: #FFFFFF;
        }

        .btn-selesai {
            background-color: #8B72E8;
            color: #FFFFFF;
            border: none;
        }

        .btn-selesai:hover {
            background-color: #765CD0;
            color: #FFFFFF;
        }

        .btn-hapus {
            background-color: #64748B;
            color: #FFFFFF;
            border: none;
        }

        .btn-hapus:hover {
            background-color: #475569;
            color: #FFFFFF;
        }

        .btn-tambah {
            background-color: #287FC1;
            color: #FFFFFF;
            border: none;
        }

        .btn-tambah:hover {
            background-color: #21699F;
            color: #FFFFFF;
        }

        .btn-riwayat {
            background-color: #D8C8FF;
            color: #5B45A5;
            border: none;
        }

        .btn-riwayat:hover {
            background-color: #C9B5FA;
            color: #49358F;
        }

        .status-badge {
            background-color: #EAF4FC;
            color: #287FC1;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .empty-state {
            padding: 45px 15px;
            text-align: center;
            color: #64748B;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 10px;
        }

        .alert {
            border-radius: 10px;
        }

        /* MODAL KONFIRMASI */

        .modal-content {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(16, 42, 67, 0.12);
        }

        .modal-body {
            padding: 30px 25px 20px;
            color: #475569;
        }

        .modal-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin: 0 auto 18px;
        }

        .modal-icon-selesai {
            background-color: #F0EBFF;
            color: #8B72E8;
        }

        .modal-icon-hapus {
            background-color: #EEF2F7;
            color: #64748B;
        }

        .modal-body h5 {
            color: #102A43;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .modal-footer {
            border-top: 1px solid #E8EEF5;
            padding: 16px 24px;
        }

        .btn-batal {
            background-color: #EEF2F7;
            color: #475569;
            border: none;
        }

        .btn-batal:hover {
            background-color: #E2E8F0;
            color: #334155;
        }

        .btn-konfirmasi-selesai {
            background-color: #8B72E8;
            color: #FFFFFF;
            border: none;
        }

        .btn-konfirmasi-selesai:hover {
            background-color: #765CD0;
            color: #FFFFFF;
        }

        .btn-konfirmasi-hapus {
            background-color: #64748B;
            color: #FFFFFF;
            border: none;
        }

        .btn-konfirmasi-hapus:hover {
            background-color: #475569;
            color: #FFFFFF;
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

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('/') ?>">
            FINORA.
        </a>

        <div class="ms-auto">
            <a href="<?= site_url('cari-barang') ?>" class="btn btn-sm btn-outline-primary">
                Cari Barang
            </a>
        </div>
    </div>
</nav>

<div class="container py-5">

    <div class="d-flex justify-content-between page-header mb-4">
        <div>
            <h3 class="page-title mb-1">Daftar Barang</h3>
            <p class="page-description mb-0">
                Kelola laporan barang hilang dan ditemukan.
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="<?= site_url('laporan/riwayat') ?>" class="btn btn-riwayat">
                Riwayat
            </a>

            <a href="<?= site_url('laporan/create') ?>" class="btn btn-tambah">
                + Tambah Laporan
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= esc(session()->getFlashdata('success')) ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= esc(session()->getFlashdata('error')) ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

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
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($daftarBarang)): ?>

                        <?php $no = 1; ?>

                        <?php foreach ($daftarBarang as $item): ?>

                            <tr>
                                <td><?= $no++ ?></td>

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
                                    <strong><?= esc($item['nama_barang']) ?></strong>
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
                                        <?= esc($item['status']) ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex gap-1 flex-wrap">

                                        <a
                                            href="<?= site_url('laporan/edit/' . $item['id']) ?>"
                                            class="btn btn-sm btn-edit"
                                        >
                                            <i class="bi bi-pencil-square"></i>
                                            Edit
                                        </a>

                                        <button
                                            type="button"
                                            class="btn btn-sm btn-selesai"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalSelesai<?= $item['id'] ?>"
                                        >
                                            <i class="bi bi-check-circle"></i>
                                            Selesai
                                        </button>

                                        <button
                                            type="button"
                                            class="btn btn-sm btn-hapus"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalHapus<?= $item['id'] ?>"
                                        >
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </button>

                                    </div>
                                </td>
                            </tr>

                            <!-- MODAL SELESAI -->

                            <div
                                class="modal fade"
                                id="modalSelesai<?= $item['id'] ?>"
                                tabindex="-1"
                                aria-labelledby="judulSelesai<?= $item['id'] ?>"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-body text-center">

                                            <div class="modal-icon modal-icon-selesai">
                                                <i class="bi bi-check-circle"></i>
                                            </div>

                                            <h5 id="judulSelesai<?= $item['id'] ?>">
                                                Selesaikan Laporan?
                                            </h5>

                                            <p class="text-secondary mb-0">
                                                Apakah kamu yakin ingin menyelesaikan laporan barang
                                                <strong><?= esc($item['nama_barang']) ?></strong>?
                                            </p>

                                            <p class="small text-secondary mt-2 mb-0">
                                                Laporan ini akan dipindahkan ke halaman riwayat barang.
                                            </p>

                                        </div>

                                        <div class="modal-footer justify-content-center">

                                            <button
                                                type="button"
                                                class="btn btn-batal px-4"
                                                data-bs-dismiss="modal"
                                            >
                                                Batal
                                            </button>

                                            <form
                                                action="<?= site_url('laporan/selesai/' . $item['id']) ?>"
                                                method="post"
                                            >
                                                <?= csrf_field() ?>

                                                <button
                                                    type="submit"
                                                    class="btn btn-konfirmasi-selesai px-4"
                                                >
                                                    Ya, Selesaikan
                                                </button>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- MODAL HAPUS -->

                            <div
                                class="modal fade"
                                id="modalHapus<?= $item['id'] ?>"
                                tabindex="-1"
                                aria-labelledby="judulHapus<?= $item['id'] ?>"
                                aria-hidden="true"
                            >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-body text-center">

                                            <div class="modal-icon modal-icon-hapus">
                                                <i class="bi bi-trash"></i>
                                            </div>

                                            <h5 id="judulHapus<?= $item['id'] ?>">
                                                Hapus Laporan?
                                            </h5>

                                            <p class="text-secondary mb-0">
                                                Apakah kamu yakin ingin menghapus laporan barang
                                                <strong><?= esc($item['nama_barang']) ?></strong>?
                                            </p>

                                            <p class="small text-secondary mt-2 mb-0">
                                                Data yang dihapus tidak dapat dikembalikan.
                                            </p>

                                        </div>

                                        <div class="modal-footer justify-content-center">

                                            <button
                                                type="button"
                                                class="btn btn-batal px-4"
                                                data-bs-dismiss="modal"
                                            >
                                                Batal
                                            </button>

                                            <form
                                                action="<?= site_url('laporan/hapus/' . $item['id']) ?>"
                                                method="post"
                                            >
                                                <?= csrf_field() ?>

                                                <button
                                                    type="submit"
                                                    class="btn btn-konfirmasi-hapus px-4"
                                                >
                                                    Ya, Hapus
                                                </button>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="9">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        📦
                                    </div>

                                    <h5>Belum Ada Laporan Aktif</h5>

                                    <p class="mb-0">
                                        Laporan barang yang masih dalam pencarian akan ditampilkan di sini.
                                    </p>

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
