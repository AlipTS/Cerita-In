<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'nama_kategori', 'bobot'];

    public function getKategori($nama_kategori = false)
    {
        if ($nama_kategori === false) {
            return $this->findAll();
        }

        return $this->where(['nama_kategori' => $nama_kategori])->findAll();
    }
}
