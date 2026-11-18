<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    private function db()
    {
        return \Config\Database::connect();
    }

    private function hapusFileFoto($namaFoto)
    {
        if (empty($namaFoto)) {
            return;
        }

        $namaFoto = basename($namaFoto);
        $pathFoto = FCPATH . 'uploads/barang/' . $namaFoto;

        if (is_file($pathFoto)) {
            unlink($pathFoto);
        }
    }

    private function validasiFoto($file)
    {
        if (!$file || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if (!$file->isValid()) {
            return 'Foto gagal diunggah.';
        }

        $formatDiizinkan = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!in_array($file->getMimeType(), $formatDiizinkan, true)) {
            return 'Format foto harus JPG, JPEG, PNG, atau WebP.';
        }

        if ($file->getSize() < 10240 || $file->getSize() > 2097152) {
            return 'Ukuran foto harus antara 10 KB sampai 2 MB.';
        }

        return null;
    }

    public function index()
    {
        $data['barang'] = $this->db()
            ->table('barang')
            ->where('status', 'Dalam Pencarian')
            ->orderBy('tanggal_kejadian', 'DESC')
            ->get()
            ->getResultArray();

        return view('laporan_list', $data);
    }

    public function riwayat()
    {
        $data['barang'] = $this->db()
            ->table('barang')
            ->where('status', 'Selesai')
            ->orderBy('tanggal_kejadian', 'DESC')
            ->get()
            ->getResultArray();

        return view('laporan_riwayat', $data);
    }

    public function create()
    {
        return view('laporan_form');
    }

    public function store()
    {
        $rules = [
            'nama_barang' => 'required|max_length[100]',
            'jenis_laporan' => 'required|in_list[Hilang,Ditemukan]',
            'kategori' => 'required|max_length[50]',
            'lokasi' => 'required|max_length[150]',
            'tanggal_kejadian' => 'required|valid_date[Y-m-d]',
            'deskripsi' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(site_url('laporan/create'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('foto_barang');

        if (!$file || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return redirect()->back()
                ->withInput()
                ->with('errors', ['Foto barang wajib diunggah.']);
        }

        $errorFoto = $this->validasiFoto($file);

        if ($errorFoto) {
            return redirect()->back()
                ->withInput()
                ->with('errors', [$errorFoto]);
        }

        $folderUpload = FCPATH . 'uploads/barang/';

        if (!is_dir($folderUpload)) {
            mkdir($folderUpload, 0775, true);
        }

        $namaFoto = $file->getRandomName();

        if (!$file->move($folderUpload, $namaFoto)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', ['Foto gagal disimpan.']);
        }

        $dataBarang = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'jenis_laporan' => $this->request->getPost('jenis_laporan'),
            'kategori' => $this->request->getPost('kategori'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal_kejadian' => $this->request->getPost('tanggal_kejadian'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto_barang' => $namaFoto,
            'status' => 'Dalam Pencarian'
        ];

        $berhasil = $this->db()
            ->table('barang')
            ->insert($dataBarang);

        if (!$berhasil) {
            $this->hapusFileFoto($namaFoto);

            return redirect()->back()
                ->withInput()
                ->with('errors', ['Data barang gagal disimpan.']);
        }

        return redirect()->to(site_url('laporan'))
            ->with('success', 'Laporan barang berhasil disimpan!');
    }

    public function edit($id)
    {
        $item = $this->db()
            ->table('barang')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$item) {
            return redirect()->to(site_url('laporan'))
                ->with('error', 'Laporan tidak ditemukan.');
        }

        return view('laporan_edit', ['item' => $item]);
    }

    public function update($id)
    {
        $db = $this->db();

        $item = $db->table('barang')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$item) {
            return redirect()->to(site_url('laporan'))
                ->with('error', 'Laporan tidak ditemukan.');
        }

        $rules = [
            'nama_barang' => 'required|max_length[100]',
            'jenis_laporan' => 'required|in_list[Hilang,Ditemukan]',
            'kategori' => 'required|max_length[50]',
            'lokasi' => 'required|max_length[150]',
            'tanggal_kejadian' => 'required|valid_date[Y-m-d]',
            'deskripsi' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $namaFoto = $item['foto_barang'];
        $file = $this->request->getFile('foto_barang');
        $fotoBaru = null;

        if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
            $errorFoto = $this->validasiFoto($file);

            if ($errorFoto) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', [$errorFoto]);
            }

            $folderUpload = FCPATH . 'uploads/barang/';

            if (!is_dir($folderUpload)) {
                mkdir($folderUpload, 0775, true);
            }

            $fotoBaru = $file->getRandomName();

            if (!$file->move($folderUpload, $fotoBaru)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['Foto baru gagal disimpan.']);
            }

            $namaFoto = $fotoBaru;
        }

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'jenis_laporan' => $this->request->getPost('jenis_laporan'),
            'kategori' => $this->request->getPost('kategori'),
            'lokasi' => $this->request->getPost('lokasi'),
            'tanggal_kejadian' => $this->request->getPost('tanggal_kejadian'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto_barang' => $namaFoto
        ];

        $berhasil = $db->table('barang')
            ->where('id', $id)
            ->update($data);

        if (!$berhasil) {
            if ($fotoBaru) {
                $this->hapusFileFoto($fotoBaru);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Laporan gagal diperbarui.');
        }

        if ($fotoBaru && !empty($item['foto_barang'])) {
            $this->hapusFileFoto($item['foto_barang']);
        }

        return redirect()->to(site_url('laporan'))
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    public function selesai($id)
    {
        $db = $this->db();

        $item = $db->table('barang')
            ->where('id', $id)
            ->where('status', 'Dalam Pencarian')
            ->get()
            ->getRowArray();

        if (!$item) {
            return redirect()->to(site_url('laporan'))
                ->with('error', 'Laporan tidak ditemukan atau sudah selesai.');
        }

        $db->table('barang')
            ->where('id', $id)
            ->update([
                'status' => 'Selesai'
            ]);

        return redirect()->to(site_url('laporan'))
            ->with('success', 'Laporan berhasil ditandai selesai.');
    }

    public function hapus($id)
    {
        $db = $this->db();

        $item = $db->table('barang')
            ->where('id', $id)
            ->get()
            ->getRowArray();

        if (!$item) {
            return redirect()->to(site_url('laporan'))
                ->with('error', 'Laporan tidak ditemukan.');
        }

        $berhasil = $db->table('barang')
            ->where('id', $id)
            ->delete();

        if (!$berhasil) {
            return redirect()->to(site_url('laporan'))
                ->with('error', 'Laporan gagal dihapus.');
        }

        if (!empty($item['foto_barang'])) {
            $this->hapusFileFoto($item['foto_barang']);
        }

        return redirect()->to(site_url('laporan'))
            ->with('success', 'Laporan dan foto berhasil dihapus permanen.');
    }

    public function cari()
    {
        $builder = $this->db()->table('barang');

        $builder->where('status', 'Dalam Pencarian');

        $keyword = $this->request->getGet('keyword');
        $jenis = $this->request->getGet('jenis');
        $kategori = $this->request->getGet('kategori');
        $urutan = $this->request->getGet('urutan');

        if (!empty($keyword)) {
            $builder->like('nama_barang', $keyword);
        }

        if (!empty($jenis)) {
            $builder->where('jenis_laporan', $jenis);
        }

        if (!empty($kategori)) {
            $builder->where('kategori', $kategori);
        }

        if ($urutan === 'terlama') {
            $builder->orderBy('tanggal_kejadian', 'ASC');
        } else {
            $builder->orderBy('tanggal_kejadian', 'DESC');
        }

        $data['barang'] = $builder->get()->getResultArray();

        $data['keyword'] = $keyword;
        $data['jenis'] = $jenis;
        $data['kategori'] = $kategori;
        $data['urutan'] = $urutan;

        return view('cari_barang', $data);
    }
}
