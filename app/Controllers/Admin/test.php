<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\AplikasiModel;
use App\Models\JenisModel;
use App\Models\BasicModel;
use App\Models\HistoryUser;
use App\Models\UserModel;
use CodeIgniter\Commands\Server\Serve;

class DataAplikasi extends Controller
{
    protected $aplikasi;
    protected $history_user;
    protected $jenis;
    protected $basic;
    protected $user;
    protected $db;
    protected $validation;
    function __construct()
    {


        $this->aplikasi = new AplikasiModel();
        $this->jenis = new JenisModel();
        $this->basic = new BasicModel();
        $this->user = new UserModel();
        $this->history_user = new HistoryUser();
        $this->db = \Config\Database::connect();
        $this->validation =  \Config\Services::validation();
    }

    public function index()
    {
        // dd(session()->get('isLoggedIn'));
        $data['data_aplikasis'] = $this->aplikasi->getAll();
        // dd($data);
        return view('admin/dataView', $data);
    }
    public function new()
    {
        $data['jenis_aplikasis'] = $this->jenis->findAll();
        $data['basics'] = $this->db->table('basic')->get()->getResult();

        return view('admin/addAplikasi', $data);
    }

    public function create()
    {
        echo View('admin/templates/header');
        echo View('admin/templates/sidebar');
        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            $id_aplikasi = service('uuid')->uuid4()->toString();
            $data = [
                'id_aplikasi' => $id_aplikasi,
                'id_jenis' => $this->request->getPost('id_jenis'),
                'id_basic'  => $this->request->getPost('id_basic'),
                'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
                'deskipsi'  => $this->request->getPost('deskipsi'),
                'versi' => $this->request->getPost('versi'),
                'domain'  => $this->request->getPost('domain'),
                'server' => $this->request->getPost('server'),
                'ip'  => $this->request->getPost('ip'),
                'status'  => $this->request->getPost('status'),
                'instansi' => $this->request->getPost('instansi'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->aplikasi->insert($data);
            $db->transCommit();
            return redirect()->to(site_url('Admin/DataAplikasi'))->with('success', 'data berhasil disimpan');
        } catch (\Exception $e) {
            $db->transRollback();
            echo 'Terjadi kesalahan: ' . $e->getMessage();
        }
    }


    public function edit($id = null)
    {
        $aplikasi = $this->aplikasi->find($id);
        if (is_object($aplikasi)) {
            // $data['user'] = $this->user->findAll();
            $data['aplikasi'] = $aplikasi;
            $data['data_aplikasis'] = $this->aplikasi->getAll();
            $data['jenis_aplikasis'] = $this->jenis->findAll();
            $data['basics'] = $this->db->table('basic')->get()->getResult();
            return view('admin/updateAplikasi', $data);
            // return redirect()->to(site_url('Admin/DataAplikasi'));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update($id = null)
    {
        $id_aplikasi = service('uuid')->uuid4()->toString();
        $id_user = '';

        $data = [
            'id_jenis' => $this->request->getPost('id_jenis'),
            'id_basic'  => $this->request->getPost('id_basic'),
            'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
            'deskipsi'  => $this->request->getPost('deskipsi'),
            'versi' => $this->request->getPost('versi'),
            'domain'  => $this->request->getPost('domain'),
            'server' => $this->request->getPost('server'),
            'ip'  => $this->request->getPost('ip'),
            'instansi' => $this->request->getPost('instansi'),
            'status'  => $this->request->getPost('status'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];


        $this->db->table('data_aplikasi')->where('id_aplikasi', $id)->set($data)->update();

        return redirect()->to(site_url('admin/DataAplikasi'))->with('success', 'Data berhasil diubah.');
    }

    public function delete($id = null)
    {

        $this->aplikasi->table('data_aplikasi')->where('id_aplikasi', $id)->delete();
        return redirect()->to(site_url('admin/DataAplikasi'))->with('success', 'Data berhasil dihapus.');
    }
    public function detail($id = null)
    {
        $aplikasi = new AplikasiModel();
        $aplikasi = $this->aplikasi->find($id);
        if (is_object($aplikasi)) {

            $data['aplikasi'] = $aplikasi;
            $data['data_aplikasis'] = $this->aplikasi->getAll();

            $data['jenis_aplikasis'] = $this->jenis->find($aplikasi->id_jenis);
            $data['basics'] = $this->basic->find($aplikasi->id_basic);

            return view('admin/detail', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function versi($id = null)
    {
        $this->aplikasi = new AplikasiModel();
        $this->jenis = new JenisModel();
        $this->basic = new BasicModel();
        $aplikasi = $this->aplikasi->find($id);
        if (is_object($aplikasi)) {
            $data['aplikasi'] = $aplikasi;
            $data['data_aplikasis'] = $this->aplikasi->getAll();
            $data['jenis_aplikasis'] = $this->jenis->find($aplikasi->id_jenis);
            $data['basics'] = $this->basic->find($aplikasi->id_basic);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/upversi');
    }
    public function versii($id = null)
    {
        $id_aplikasi = service('uuid')->uuid4()->toString();
        // $id_user = '';
        $data = [
            'versi' => $this->request->getPost('versi'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('data_aplikasi')->where('id_aplikasi', $id)->set($data)->update();
        return redirect()->to(site_url('admin/DataAplikasi'))->with('success', 'Data berhasil diubah.');
    }

    public function domain($id = null)
    {
        $id_aplikasi = service('uuid')->uuid4()->toString();
        // $id_user = '';
        $data = [
            'domain' => $this->request->getPost('domain'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->table('data_aplikasi')->where('id_aplikasi', $id)->set($data)->update();
        return redirect()->to(site_url('admin/DataAplikasi'))->with('success', 'Data berhasil diubah.');
    }
}
