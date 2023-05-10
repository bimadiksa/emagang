<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Model\SoftDeletes;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Database\Query;

class ApiModel extends Model
{

    protected $table      = 'api';
    protected $primaryKey = 'id_api';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType     = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;

    protected $allowedFields    = ['id_api', 'username', 'password', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getUsername($username)
    {
        return $this->db->table('api')
            ->select('username, password')
            ->where('username', $username)
            ->get()
            ->getRowArray();
    }
}
