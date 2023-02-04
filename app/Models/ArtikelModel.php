<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['judul', 'konten', 'gambar', 'kategori_id', 'tanggal'];

    public function getArtikel($kategori_id = false)
    {
        if ($kategori_id === false) {
            return $this->findAll();
        }

        return $this->where(['kategori_id' => $kategori_id])->findAll();
    }

    public function getArtikelById($id)
    {
        return $this->find($id);
    }
}
