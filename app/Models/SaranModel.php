<?php

namespace App\Models;

use CodeIgniter\Model;

class SaranModel extends Model
{
    protected $table = 'saran';
    protected $primaryKey = 'id_saran';
    protected $allowedFields = ['id_saran', 'nama', 'email', 'deskripsi'];
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; // samain sama databae
    protected $deletedField  = 'deleted_at';

    public function getAllSaran()
    {
        return $this->findAll();
    }
}
