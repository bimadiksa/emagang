<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $allowedFields = ['id_prodi', 'nama_prodi', 'id_jurusan', 'deleted_at'];
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; // samain sama databae
    protected $deletedField  = 'deleted_at';

    public function getProdi($id_prodi = null)
    {
        if ($id_prodi == null) {
            return $this->where('deleted_at', null)->findAll();
        }
        return $this->where('deleted_at', null)->find($id_prodi);
    }
    public function countDataProdi()
    {
        return $this->where('deleted_at', null)->countAllResults();
    }
    function getAll()
    {
        $builder = $this->db->table('prodi');
        // fungsi untuk menjoinkan tabel basic dan jenis aplikasi
        // $builder->join('jenis_aplikasi', 'jenis_aplikasi.id_jenis = data_aplikasi.id_jenis');
        // $builder->join('basic', 'basic.id_basic = data_aplikasi.id_basic');
        $builder->where('prodi.deleted_at', null);
        $query = $builder->get();
        return $query->getResult();
    }

    // public function getInstansiById($id_prodi)
    // {
    //     $builder = $this->db->table('prodi');
    //     $builder->select('instansi.*, jurusan.nama_jurusan, p.nama_prodi'); // Menggunakan alias 'p' untuk tabel 'prodi'
    //     $builder->join('jurusan j', 'instansi.id_instansi = j.id_instansi', 'LEFT'); // Menggunakan alias 'j' untuk tabel 'jurusan'
    //     $builder->join('prodi p', 'j.id_jurusan = p.id_jurusan', 'LEFT'); // Menggunakan alias 'p' untuk tabel 'prodi'
    //     $builder->where('instansi.deleted_at', null);
    //     $builder->where('jurusan.deleted_at', null);
    //     $builder->where('prodi.deleted_at', null);
    //     $builder->where('prodi.id_prodi', $id_prodi);
    //     $builder->groupBy('instansi.id_instansi, j.id_jurusan, p.id_prodi'); // Menggunakan alias 'j' dan 'p' untuk tabel 'jurusan' dan 'prodi'
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    public function getProdiById($id_prodi)
    {
        $builder = $this->db->table('prodi'); // Menggunakan nama tabel yang sudah diatur
        $builder->select('prodi.*, jurusan.nama_jurusan, instansi.*'); // Menambahkan kolom 'nama_jurusan' dan 'nama_instansi'
        $builder->join('jurusan', 'prodi.id_jurusan = jurusan.id_jurusan', 'LEFT');
        $builder->join('instansi', 'jurusan.id_instansi = instansi.id_instansi', 'LEFT');
        $builder->where('instansi.deleted_at', null);
        $builder->where('jurusan.deleted_at', null);
        $builder->where('prodi.deleted_at', null);
        $builder->where('prodi.id_prodi', $id_prodi);
        $builder->groupBy('instansi.id_instansi, jurusan.id_jurusan, prodi.id_prodi'); // Menggunakan alias 'j' dan 'p' untuk tabel 'jurusan' dan 'prodi'
        $query = $builder->get();
        return $query->getRowArray(); // Mengambil satu baris hasil query
    }
}
