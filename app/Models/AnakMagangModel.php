<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model\Concerns\SoftDeletes;
use CodeIgniter\Model;

class AnakMagangModel extends Model
{
    protected $table      = 'anak_magang';
    protected $primaryKey = 'id_magang'; //jangan huruf besar di database

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_magang', 'email', 'password', 'nama', 'no_id', 'status', 'status_magang', 'kode_instansi_dinas', 'verification_code', 'is_verified', 'reset_token', 'reset_token_expires_at', 'id_prodi', 'updated_at', 'deleted_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; // samain sama databae
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    function getToken($token)
    {
        return $this->db->table($this->table)->select('reset_token')->where('reset_token', $token)->get()->getRowArray();
    }


    public function getAllAnakMagang()
    {
        return $this->findAll();
    }


    public function countData()
    {
        return $this->countAll();
    }
    public function getAnakMagangById($id_magang)
    {
        return $this->where('id_magang', $id_magang)->first();
    }

    public function getAnakMagangJoin()
    {
        $builder = $this->db->table('anak_magang');
        $builder->select('*');
        $builder->join('prodi', 'anak_magang.id_prodi = prodi.id_prodi');
        $builder->join('jurusan', 'prodi.id_jurusan = jurusan.id_jurusan');
        $builder->join('instansi', 'jurusan.id_instansi = instansi.id_instansi');
        $builder->where('anak_magang.deleted_at', null);
        $builder->groupBy('prodi.id_prodi, jurusan.id_jurusan, instansi.id_instansi, anak_magang.id_magang');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getAnakMagangJoinById($id_magang)
    {
        $builder = $this->db->table('anak_magang');
        $builder->select('*');
        $builder->join('prodi', 'anak_magang.id_prodi = prodi.id_prodi');
        $builder->join('jurusan', 'prodi.id_jurusan = jurusan.id_jurusan');
        $builder->join('instansi', 'jurusan.id_instansi = instansi.id_instansi');
        $builder->where('anak_magang.deleted_at', null);
        $builder->where('id_magang', $id_magang);

        $query = $builder->get();
        return $query->getResultArray();
    }

    public function showdata()
    {
        return $this->db->table('anak_magang')->where('deleted_at', null)->get()->getResultArray();
    }
}
//pake soft delete
