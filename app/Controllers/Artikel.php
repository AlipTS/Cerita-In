<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\I18n\Time;




class Artikel extends BaseController
{
    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->builder = $this->db->table('artikel');
        $this->builder1 = $this->db->table('kategori');
        $this->artikel = new \App\Models\ArtikelModel();
        $this->kategori = new \App\Models\KategoriModel();
    }


    public function index($kategori_id = false)
    {
        $data = [
            'artikel' => $this->artikel->getArtikel($kategori_id),
            'kategori' => $this->builder1
        ];
        // dd($data);
        return view('artikel/index', $data);
    }

    public function view($id)
    {
        $model = new ArtikelModel();
        $data = [
            'artikel' => $model->getArtikelById($id),
            'kategori' => $this->builder1
        ];
        return view('artikel/view', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Artikel',
            'kategori' => $this->kategori->get()->getResultArray(),
        ];
        // dd($data);
        return view('artikel/tambah', $data);
    }

    public function simpan()
    {
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {
            //generate nama file random
            $namaGambar = $gambar->getRandomName();
            //pindahkan file ke folder img
            $gambar->move('img/artikel', $namaGambar);
        }

        $nama_kategori = $this->request->getPost('kategori');
        $kategori = $this->builder1->where('id', $nama_kategori);
        $nama_kategori = $kategori->get()->getResultArray();
        $waktu = Time::today('Asia/Jakarta')->format('Y-m-d');

        $this->artikel->save([
            'judul' => $this->request->getPost('judul'),
            'konten' => $this->request->getPost('konten'),
            'kategori_id' => $nama_kategori[0]['id'],
            'gambar' => $namaGambar,
            'tanggal' => $waktu
        ]);
        return redirect()->to('artikel');
    }
}
