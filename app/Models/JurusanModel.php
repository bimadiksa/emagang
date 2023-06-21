<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $allowedFields = ['id_jurusan', 'nama_jurusan', 'id_instansi'];
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; // samain sama databae
    protected $deletedField  = 'deleted_at';

    public function getJurusan($id_jurusan = null)
    {
        if ($id_jurusan == null) {
            return $this->where('deleted_at', null)->findAll();
        }
        return $this->where('deleted_at', null)->find($id_jurusan);
    }

    public function countDataJurusan()
    {
        return $this->where('deleted_at', null)->countAllResults();
    }
    function getAll()
    {
        $builder = $this->db->table('jurusan');
        // fungsi untuk menjoinkan tabel basic dan jenis aplikasi
        // $builder->join('jenis_aplikasi', 'jenis_aplikasi.id_jenis = data_aplikasi.id_jenis');
        // $builder->join('basic', 'basic.id_basic = data_aplikasi.id_basic');
        $builder->where('jurusan.deleted_at', null);
        $query = $builder->get();
        return $query->getResult();
    }
}
