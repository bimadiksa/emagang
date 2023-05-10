<?php

namespace App\Models;

use CodeIgniter\Model;

class InstansiModel extends Model
{
    protected $table = 'instansi';
    protected $primaryKey = 'id_instansi';
    protected $allowedFields = ['id_instansi', 'nama_instansi', 'alamat_instansi', 'jenis_instansi'];
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; // samain sama databae
    protected $deletedField  = 'deleted_at';

    public function getInstansi($id_instansi = null)
    {
        if ($id_instansi == null) {
            return $this->findAll();
        }
        return $this->find($id_instansi);
    }
    public function getInstansiJoin()
    {
        $builder = $this->db->table('instansi');
        $builder->select('*');
        $builder->join('jurusan', 'instansi.id_instansi = jurusan.id_instansi', 'LEFT');
        $builder->join('prodi', 'jurusan.id_jurusan = prodi.id_jurusan', 'LEFT');
        // $builder->join('anak_magang', 'prodi.id_prodi = anak_magang.id_prodi', 'LEFT');
        $builder->where('instansi.deleted_at', null); // Tambahkan kondisi untuk instansi
        $builder->where('jurusan.deleted_at', null); // Tambahkan kondisi untuk jurusan
        $builder->where('prodi.deleted_at', null); // Tambahkan kondisi untuk prodi
        // $builder->where('anak_magang.deleted_at', null);
        // $builder->where('anak_magang.no_id IS NOT NULL');
        $builder->groupBy('instansi.id_instansi, jurusan.id_jurusan, prodi.id_prodi');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function countDataInstansi()
    {
        return $this->countAll();
    }
    // public function getInstansiById($id_instansi)
    // {
    //     return $this->where('id_instansi', $id_instansi)->first();
    // }

}
