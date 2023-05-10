<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {


        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['active_sidebar'] = 'dashboard_view';
        $data['title'] = 'Dashboard E-Magang';
        $data['count'] = $this->adminModel->countData();
        $data['countInstansi'] = $this->instansiModel->countDataInstansi();
        $data['countJurusan'] = $this->jurusanModel->countDataJurusan();
        $data['countProdi'] = $this->prodiModel->countDataProdi();
        $data['admins'] = $this->adminModel->findAll();
        //dd($data);
        return view('admin/dashboard_view', $data);
    }
}
