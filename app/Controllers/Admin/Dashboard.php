<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {


        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $kode_instansi_dinas = session('kode_instansi_dinas');
        $data['active_sidebar'] = 'dashboard_view';
        $data['title'] = 'Dashboard E-Magang';
        $data['count'] = $this->adminModel->countData();
        $data['countMagang'] = $this->anakMagangModel->countDataMagang();
        $data['countMagangByKodeInstansi'] = $this->anakMagangModel->countDataMagangByKodeInstansi();
        $data['countInstansi'] = $this->instansiModel->countDataInstansi();
        $data['countJurusan'] = $this->jurusanModel->countDataJurusan();
        $data['countProdi'] = $this->prodiModel->countDataProdi();
        $data['admins'] = $this->adminModel->findAll();
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();

        $data['magang'] = $this->anakMagangModel->getAllAnakMagang();
        $countAnakMagang = 0;

        foreach ($data['magang'] as $b) {
            if ($b['kode_instansi_dinas'] == $kode_instansi_dinas) {
                $countAnakMagang++;
            }
        }

        $data['anakMagang'] = $countAnakMagang;
        //dd($data);
        return view('admin/dashboard_view', $data);
    }
}
