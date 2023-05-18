<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model\Concerns\SoftDeletes;
use CodeIgniter\Model;

class InstansiDinasModel extends Model
{
    protected $table      = 'instansi_dinas';
    protected $primaryKey = 'kode_instansi'; //jangan huruf besar di database

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['kode_instansi', 'deskripsi', 'foto_instansi', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; // samain sama databae
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    //ambil data instansiDinas
    public function getInstansiDinas()
    {
        return $this->findAll();
    }
    public function getDataFromAPI()
    {
        $url = '/api/instansi_utama';
        $method = 'GET';

        $base_link = 'https://egov.bulelengkab.go.id';
        $link = $base_link . $url;

        $client_id = 'emagang_buleleng123';
        $client_secret = '@Emagang2023';

        $auth = base64_encode($client_id . ':' . $client_secret);
        $headers = array(
            'Content-Type:multipart/form-data',
            'Authorization: Basic ' . $auth,
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        curl_close($ch);

        $output = json_decode($output, TRUE);



        return $output['data'];
    }

    public function getFotoInstansiDinasById($kode_instansi)
    {
        return $this->where('kode_instansi', $kode_instansi)->first();
    }
    public function getDeskripsi($kode_instansi)
    {
        return $this->db->table($this->table)
            ->select('deskripsi')
            ->where('kode_instansi', $kode_instansi,)
            ->get()
            ->getRowArray();
    }
}
