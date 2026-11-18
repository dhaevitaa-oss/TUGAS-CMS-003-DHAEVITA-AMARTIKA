<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan - FINORA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #F3F8FC;
            color: #102A43;
        }

        .navbar {
            background: #102A43;
        }

        .form-card {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(16, 42, 67, 0.08);
        }

        .btn-finora {
            background: #287FC1;
            color: white;
            border: none;
        }

        .btn-finora:hover {
            background: #1D659D;
            color: white;
        }

        .form-label {
            font-weight: 600;
        }

        .upload-info {
            font-size: 13px;
            color: #526579;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= site_url('/') ?>">FINORA</a>
        <a href="<?= site_url('laporan') ?>" class="btn btn-outline-light btn-sm">Daftar Barang</a>
    </div>
</nav>

<div class="container">
    <div class="form-card">
        <h2 class="fw-bold mb-2">Buat Laporan Barang</h2>
        <p class="text-secondary mb-4">Bantu orang lain mengenali barang melalui informasi dan foto yang jelas.</p>

        <?php $errors = session()->getFlashdata('errors') ?? []; ?>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <strong>Periksa kembali formulir kamu:</strong>
                <ul class="mb-0 mt-2">
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('laporan/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="foto_barang" class="form-label">Foto Barang</label>
                <input type="file" class="form-control" id="foto_barang" name="foto_barang" accept=".jpg,.jpeg,.png,.webp" required>
                <div class="upload-info mt-2">
                    Format: JPG, JPEG, PNG, atau WebP. Ukuran minimum 10 KB dan maksimum 2 MB.
                </div>
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" maxlength="100" value="<?= esc(old('nama_barang') ?? '') ?>" placeholder="Contoh: Dompet hitam" required>
            </div>

            <div class="mb-3">
                <label for="jenis_laporan" class="form-label">Jenis Laporan</label>
                <select class="form-select" id="jenis_laporan" name="jenis_laporan" required>
                    <option value="">Pilih jenis laporan</option>
                    <option value="Hilang" <?= old('jenis_laporan') === 'Hilang' ? 'selected' : '' ?>>Barang Hilang</option>
                    <option value="Ditemukan" <?= old('jenis_laporan') === 'Ditemukan' ? 'selected' : '' ?>>Barang Ditemukan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Barang</label>
                <select class="form-select" id="kategori" name="kategori" required>
                    <option value="">Pilih kategori</option>
                    <?php foreach (['Elektronik', 'Dokumen', 'Aksesori', 'Pakaian', 'Tas dan Dompet', 'Kunci', 'Alat Tulis', 'Lainnya'] as $kategori): ?>
                        <option value="<?= esc($kategori) ?>" <?= old('kategori') === $kategori ? 'selected' : '' ?>>
                            <?= esc($kategori) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Kejadian</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" maxlength="150" value="<?= esc(old('lokasi') ?? '') ?>" placeholder="Contoh: Perpustakaan kampus" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian</label>
                <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" value="<?= esc(old('tanggal_kejadian') ?? '') ?>" required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Jelaskan ciri-ciri barang, warna, merek, atau informasi lain yang membantu."><?= esc(old('deskripsi') ?? '') ?></textarea>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <button type="submit" class="btn btn-finora px-4">Kirim Laporan</button>
                <a href="<?= site_url('/') ?>" class="btn btn-outline-secondary px-4">Kembali</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
