<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model\Concerns\SoftDeletes;
use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'id_admin'; //jangan huruf besar di database

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_admin', 'email', 'username', 'password', 'level', 'status', 'reset_token', 'reset_token_expires_at', 'kode_instansi_dinas', 'deleted_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; // samain sama databae
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    //read data admin
    function getAll()
    {
        $builder = $this->db->table('admin');
        // fungsi untuk menjoinkan tabel basic dan jenis aplikasi
        // $builder->join('jenis_aplikasi', 'jenis_aplikasi.id_jenis = data_aplikasi.id_jenis');
        // $builder->join('basic', 'basic.id_basic = data_aplikasi.id_basic');
        $builder->where('admin.deleted_at', null);
        $query = $builder->get();
        return $query->getResult();
    }
    public function getAllAdmin()
    {
        return $this->findAll();
    }

    public function getAdminById($id_admin)
    {
        return $this->where('id_admin', $id_admin)->first();
    }

    //bikin fungsi untuk custom
    public function getDataEmail($email)
    {
        return $this->db->table($this->table)
            ->select('email')
            ->where('email', $email,)
            ->get()
            ->getResultArray();
    }
    public function getUsername($username)
    {
        return $this->db->table($this->table)
            ->select('username')
            ->where('username', $username,)
            ->get()
            ->getResultArray();
    }
    public function countData()
    {
        return $this->countAll();
    }

    public function getSameEmailAndPassword()
    {
        $builder = $this->db->table('admin');
        $builder->select('*');
        $builder->join('anak_magang', 'admin.email = anak_magang.email', 'LEFT');
        $builder->where('admin.email = anak_magang.email');
        $builder->where('admin.password = anak_magang.password'); // menambahkan kondisi untuk membandingkan password
        $query = $builder->get();
        // Jika ada record dengan email yang sama di kedua tabel, kembalikan nilai true
        if ($query->getNumRows() > 0) {
            return true;
        } else {
            return false;
        }
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
    // public function getSubInstansiData($kode_instansi)
    // {
    //     $url = '/api/sub_instansi/' . urlencode($kode_instansi);
    //     $method = 'GET';
    //     $base_link = 'https://egov.bulelengkab.go.id';
    //     $link = $base_link . $url;
    //     $client_id = 'emagang_buleleng123';
    //     $client_secret = '@Emagang2023';
    //     $auth = base64_encode($client_id . ':' . $client_secret);
    //     $headers = array(
    //         'Content-Type: application/json',
    //         'Authorization: Basic ' . $auth,
    //     );
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $link);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     $outputSub = curl_exec($ch);
    //     curl_close($ch);
    //     $outputSub = json_decode($outputSub, TRUE);

    //     return $outputSub['data'];
    // }
}
//pake soft delete
