
<?php
$nilai = static function ($field) use ($item) {
    return old($field, $item[$field] ?? '');
};

$fotoLama = $item['foto_barang'] ?? '';
$pathFoto = base_url('uploads/barang/' . rawurlencode(basename($fotoLama)));
$errors = session()->getFlashdata('errors') ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - FINORA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #F3F8FC;
            color: #102A43;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #E5EDF5;
        }

        .brand {
            color: #287FC1;
            font-size: 23px;
            font-weight: 800;
            text-decoration: none;
        }

        .main-container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 18px;
        }

        .form-card {
            background: white;
            padding: 32px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(30, 70, 110, 0.06);
        }

        .page-title {
            font-weight: 750;
            color: #102A43;
        }

        .form-label {
            font-weight: 600;
            color: #334E68;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border: 1px solid #D8E2EC;
            border-radius: 9px;
            padding: 11px 13px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #287FC1;
            box-shadow: 0 0 0 3px rgba(40, 127, 193, 0.12);
        }

        .photo-preview {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #D8E2EC;
            background: #F3F8FC;
        }

        .btn-save {
            background: #287FC1;
            color: white;
            border: none;
            border-radius: 9px;
            padding: 11px 22px;
            font-weight: 600;
        }

        .btn-save:hover {
            background: #206BA5;
            color: white;
        }

        .btn-back {
            background: #EAF2FA;
            color: #287FC1;
            border-radius: 9px;
            padding: 11px 20px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-back:hover {
            background: #DCEAF7;
            color: #206BA5;
        }

        .required {
            color: #DC3545;
        }

        @media (max-width: 576px) {
            .form-card {
                padding: 22px 17px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="<?= site_url('/') ?>" class="brand">FINORA</a>
        <a href="<?= site_url('laporan') ?>" class="btn-back">
            Kembali
        </a>
    </div>
</nav>

<div class="main-container">

    <div class="mb-4">
        <h2 class="page-title">Edit Data Barang</h2>
        <p class="text-secondary mb-0">
            Perbarui informasi barang yang sudah dilaporkan.
        </p>
    </div>

    <div class="form-card">

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <strong>Periksa kembali data berikut:</strong>
                <ul class="mb-0 mt-2">
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('laporan/update/' . $item['id']) ?>"
              method="POST"
              enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">
                    Nama Barang <span class="required">*</span>
                </label>
                <input type="text"
                       name="nama_barang"
                       class="form-control"
                       value="<?= esc($nilai('nama_barang')) ?>"
                       maxlength="100"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Jenis Laporan <span class="required">*</span>
                </label>
                <select name="jenis_laporan" class="form-select" required>
                    <option value="">Pilih jenis laporan</option>
                    <option value="Hilang"
                        <?= $nilai('jenis_laporan') === 'Hilang' ? 'selected' : '' ?>>
                        Barang Hilang
                    </option>
                    <option value="Ditemukan"
                        <?= $nilai('jenis_laporan') === 'Ditemukan' ? 'selected' : '' ?>>
                        Barang Ditemukan
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Kategori <span class="required">*</span>
                </label>
                <input type="text"
                       name="kategori"
                       class="form-control"
                       value="<?= esc($nilai('kategori')) ?>"
                       maxlength="50"
                       placeholder="Contoh: Elektronik, Aksesoris"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Lokasi Kejadian <span class="required">*</span>
                </label>
                <input type="text"
                       name="lokasi"
                       class="form-control"
                       value="<?= esc($nilai('lokasi')) ?>"
                       maxlength="150"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Tanggal Kejadian <span class="required">*</span>
                </label>
                <input type="date"
                       name="tanggal_kejadian"
                       class="form-control"
                       value="<?= esc($nilai('tanggal_kejadian')) ?>"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Barang</label>
                <textarea name="deskripsi"
                          class="form-control"
                          rows="4"
                          placeholder="Tuliskan ciri-ciri atau keterangan barang..."><?= esc($nilai('deskripsi')) ?></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Foto Barang</label>

                <div class="mb-3">
                    <?php if (!empty($fotoLama)): ?>
                        <img src="<?= esc($pathFoto) ?>"
                             alt="Foto barang sebelumnya"
                             class="photo-preview"
                             onerror="this.style.display='none'">
                    <?php else: ?>
                        <p class="text-secondary">Belum ada foto barang.</p>
                    <?php endif; ?>
                </div>

                <input type="file"
                       name="foto_barang"
                       class="form-control"
                       accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                <small class="text-secondary d-block mt-2">
                    Pilih foto baru jika ingin mengganti foto sebelumnya.
                    Format JPG, JPEG, PNG, atau WebP. Maksimal 2 MB.
                </small>
            </div>

            <div class="d-flex justify-content-end gap-2 flex-wrap">
                <a href="<?= site_url('laporan') ?>" class="btn-back">
                    Batal
                </a>

                <button type="submit" class="btn-save">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
