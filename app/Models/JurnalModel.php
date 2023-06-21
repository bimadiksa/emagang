<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model\Concerns\SoftDeletes;
use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table      = 'logbook';
    protected $primaryKey = 'id_log_book'; //jangan huruf besar di database

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_log_book', 'tanggal_logbook', 'judul', 'deskripsi', 'foto', 'slug', 'created_at', 'updated_at', 'deleted_at', 'id_magang', 'kode_instansi_dinas'];

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
    public function getJurnal()
    {
        return $this->where('deleted_at', null)->findAll();
    }
    // public function getDataFromAPI()
    // {
    //     $url = '/api/instansi_utama';
    //     $method = 'GET';

    //     $base_link = 'https://egov.bulelengkab.go.id';
    //     $link = $base_link . $url;

    //     $client_id = 'emagang_buleleng123';
    //     $client_secret = '@Emagang2023';

    //     $auth = base64_encode($client_id . ':' . $client_secret);
    //     $headers = array(
    //         'Content-Type:multipart/form-data',
    //         'Authorization: Basic ' . $auth,
    //     );

    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_URL, $link);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //     $output = curl_exec($ch);
    //     curl_close($ch);

    //     $output = json_decode($output, TRUE);



    //     return $output['data'];
    // }

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

    public function showdata()
    {
        return $this->db->table('logbook')->where('deleted_at', null)->get()->getResultArray();
    }

    public function showdataJoin()
    {
        $builder = $this->db->table('logbook');
        $builder->select('*, anak_magang.foto AS anak_magang_foto');
        $builder->join('anak_magang', 'logbook.id_magang = anak_magang.id_magang');
        // $builder->join('instansi_dinas', 'anak_magang.kode_instansi_dinas = instansi_dinas.kode_instansi');
        $builder->where('logbook.deleted_at', null);
        // $builder->groupBy(' anak_magang.id_magang, logbook.id_magang');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
