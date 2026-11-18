# FINORA
### Lost & Found Information System

**Aplikasi Web Pencatatan Barang Hilang dan Ditemukan**

## 1. Deskripsi Aplikasi

FINORA (Find it. Report it. Return it.) merupakan aplikasi web sederhana yang dikembangkan untuk membantu proses pencatatan, pencarian, dan pengelolaan informasi barang hilang maupun ditemukan.

Aplikasi ini dirancang untuk memudahkan pengguna dalam menyampaikan informasi mengenai barang yang hilang atau ditemukan melalui laporan yang tersimpan secara terstruktur di dalam database.

FINORA dikembangkan sebagai proyek individu untuk memenuhi penugasan mata kuliah Pemrograman Web dengan menerapkan PHP, CodeIgniter 4, Bootstrap, dan MySQL.

## 2. Tujuan Aplikasi

Tujuan pengembangan FINORA adalah:

1. Mempermudah pencatatan informasi barang hilang dan ditemukan.
2. Membantu pengguna mencari informasi barang berdasarkan nama, jenis laporan, dan kategori.
3. Menyediakan pengelolaan data laporan barang melalui fitur tambah, tampil, ubah, dan hapus.
4. Menyimpan informasi barang secara terstruktur menggunakan database MySQL.
5. Menerapkan konsep pengembangan aplikasi web menggunakan CodeIgniter 4.

## 3. Fitur Aplikasi

FINORA memiliki beberapa fitur utama sebagai berikut.

### A. Beranda

Menampilkan identitas aplikasi FINORA, deskripsi singkat, navigasi, dan akses menuju fitur utama.

### B. Cari Barang

Digunakan untuk melihat informasi barang yang dilaporkan hilang maupun ditemukan. Fitur ini dilengkapi dengan:

- Pencarian berdasarkan nama barang.
- Filter berdasarkan jenis laporan.
- Filter berdasarkan kategori.
- Pengurutan berdasarkan tanggal kejadian.

### C. Buat Laporan

Digunakan untuk menambahkan laporan barang baru dengan mengisi informasi:

- Nama barang.
- Jenis laporan (Hilang atau Ditemukan).
- Kategori.
- Lokasi kejadian.
- Tanggal kejadian.
- Deskripsi barang.
- Foto barang.

### D. Kelola Laporan

Digunakan untuk mengelola laporan barang yang telah dimasukkan ke dalam sistem. Fitur yang tersedia meliputi:

- Menampilkan daftar laporan.
- Mengubah informasi laporan.
- Mengganti foto barang.
- Menandai laporan sebagai selesai.
- Menghapus laporan dengan konfirmasi terlebih dahulu.

### E. Riwayat Barang

Menampilkan laporan barang yang telah ditandai selesai. Laporan dengan status selesai tidak lagi ditampilkan pada daftar laporan aktif, tetapi dapat dilihat melalui halaman riwayat.

### F. Validasi dan Notifikasi

Aplikasi menerapkan validasi pada kolom wajib dan unggahan foto. Sistem juga menampilkan pesan kepada pengguna ketika proses penambahan, perubahan, atau penghapusan data berhasil maupun gagal.

## 4. Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| PHP | Bahasa pemrograman sisi server |
| CodeIgniter 4 | Framework pengembangan aplikasi |
| MySQL/MariaDB | Sistem manajemen database |
| Bootstrap 5.3.3 | Framework antarmuka |
| HTML | Struktur halaman web |
| CSS | Pengaturan tampilan aplikasi |
| JavaScript | Mendukung interaksi antarmuka |
| Laragon | Lingkungan pengembangan lokal |
| phpMyAdmin | Pengelolaan database |

## 5. Struktur Database

Nama database yang digunakan adalah `finora_db`, dengan tabel utama bernama `barang`.

Tabel `barang` digunakan untuk menyimpan informasi laporan barang.

| Nama Kolom | Keterangan |
|---|---|
| id | Primary key atau identitas data |
| nama_barang | Nama barang yang dilaporkan |
| jenis_laporan | Jenis laporan: Hilang atau Ditemukan |
| kategori | Kategori barang |
| lokasi | Lokasi kejadian |
| tanggal_kejadian | Tanggal barang hilang atau ditemukan |
| deskripsi | Keterangan tambahan barang |
| foto_barang | Nama file foto barang |
| status | Status laporan, seperti Dalam Pencarian atau Selesai |

Database menggunakan kolom `id` sebagai primary key untuk membedakan setiap laporan barang.

## 6. Struktur Folder Aplikasi

Struktur folder utama FINORA menggunakan pola pengembangan CodeIgniter 4.

```text
FINORA/
├── app/
│   ├── Config/
│   │   └── Routes.php
│   ├── Controllers/
│   │   └── Laporan.php
│   ├── Models/
│   └── Views/
│       ├── laporan_list.php
│       ├── laporan_form.php
│       ├── laporan_edit.php
│       ├── laporan_riwayat.php
│       ├── cari_barang.php
│       └── ...
│
├── public/
├── writable/
├── uploads/
│   └── barang/
├── vendor/
├── .env
├── composer.json
└── README.md
```

Keterangan:

- **Controllers:** Mengatur alur permintaan pengguna dan proses pengolahan data.
- **Models:** Tempat pengelolaan data dan interaksi dengan database apabila lapisan Model diterapkan.
- **Views:** Menampilkan halaman aplikasi kepada pengguna.
- **public:** Menyimpan file publik yang digunakan aplikasi.
- **uploads/barang:** Menyimpan foto barang yang diunggah.
- **writable:** Menyimpan file sementara, cache, dan log aplikasi.

## 7. Instalasi dan Konfigurasi

Berikut langkah-langkah untuk menjalankan FINORA pada komputer lokal.

### A. Persiapan

Pastikan perangkat telah memiliki:

- PHP 8.3 atau versi yang kompatibel.
- Composer.
- Laragon.
- MySQL/MariaDB.
- CodeIgniter 4.

### B. Menyiapkan Source Code

1. Salin folder proyek FINORA ke direktori web server Laragon.
2. Buka terminal pada direktori proyek.
3. Jalankan perintah berikut untuk memasang dependensi apabila diperlukan.

```bash
composer install
```

### C. Membuat Database

1. Jalankan Laragon.
2. Aktifkan Apache dan MySQL.
3. Buka phpMyAdmin.
4. Buat database baru dengan nama `finora_db`.
5. Impor file database hasil ekspor proyek yang berekstensi `.sql`.

Pastikan nama database sesuai dengan konfigurasi aplikasi.

### D. Konfigurasi Database

Buka file `.env` pada folder utama proyek.

Sesuaikan konfigurasi database dengan pengaturan MySQL pada komputer masing-masing.

Contoh konfigurasi:

```ini
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = finora_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Catatan: Username, password, dan port harus disesuaikan dengan konfigurasi MySQL yang digunakan.

### E. Menjalankan Aplikasi

Buka terminal pada folder proyek FINORA, kemudian jalankan:

```bash
php spark serve
```

Setelah server berjalan, buka browser dan akses:

```text
http://localhost:8080
```

Jika menggunakan konfigurasi server lokal Laragon, alamat akses dapat disesuaikan dengan konfigurasi virtual host atau web server yang digunakan.

## 8. Cara Menggunakan Aplikasi

### A. Membuat Laporan

1. Buka halaman beranda FINORA.
2. Pilih menu Buat Laporan.
3. Isi informasi barang sesuai formulir.
4. Unggah foto barang.
5. Klik tombol simpan.
6. Data laporan akan disimpan ke database.

### B. Mencari Barang

1. Pilih menu Cari Barang.
2. Masukkan nama barang pada kolom pencarian.
3. Gunakan filter jenis laporan atau kategori apabila diperlukan.
4. Sistem akan menampilkan data sesuai kriteria pencarian.

### C. Mengelola Laporan

1. Buka menu Kelola Laporan.
2. Pilih data barang yang ingin dikelola.
3. Klik Edit untuk mengubah informasi barang.
4. Klik Selesai untuk mengubah status laporan.
5. Klik Hapus untuk menghapus data setelah melakukan konfirmasi.

### D. Melihat Riwayat Barang

1. Buka halaman Kelola Laporan.
2. Pilih menu Riwayat.
3. Sistem akan menampilkan laporan barang yang berstatus Selesai.

## 9. Pengujian Aplikasi

Pengujian dilakukan secara langsung melalui browser untuk memastikan fitur utama aplikasi berjalan sesuai fungsinya.

Hasil pengujian yang telah dilakukan:

| No. | Fitur yang Diuji | Hasil |
|---|---|---|
| 1 | Menambahkan laporan barang | Berhasil |
| 2 | Menampilkan daftar barang | Berhasil |
| 3 | Mengedit laporan barang | Berhasil |
| 5 | Menghapus laporan barang | Berhasil |
| 6 | Menyelesaikan laporan barang | Berhasil |
| 7 | Menampilkan riwayat barang | Berhasil |
| 8 | Melakukan pencarian dan filter | Berhasil |
| 9 | Validasi kolom wajib | Berhasil |
| 10 | Validasi unggahan foto | Berhasil |

Berdasarkan pengujian yang telah dilakukan, fitur-fitur tersebut dapat dijalankan sesuai dengan fungsi yang dirancang.

## 10. Pengembang

**Nama:** Dhaevita Amartika  
**Program Studi:** Pendidikan Informatika  
**Fakultas:** Fakultas Keguruan dan Ilmu Pendidikan  
**Universitas:** Universitas Trunojoyo Madura  
**Mata Kuliah:** Pemrograman Web  
**Jenis Pengerjaan:** Individu

## 11. Catatan

FINORA dikembangkan sebagai aplikasi pembelajaran untuk memenuhi penugasan proyek Pemrograman Web. Aplikasi ini menggunakan data contoh atau dummy dan dikembangkan untuk lingkungan pengujian lokal.

Pengembangan dilakukan dengan memanfaatkan dokumentasi CodeIgniter 4, Bootstrap, serta bantuan AI dalam proses pembelajaran dan pengembangan kode. Pengembang tetap bertanggung jawab memahami, menguji, dan menjelaskan kode yang digunakan.

---

**FINORA.**

*Find it. Report it. Return it.*
