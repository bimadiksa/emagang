<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['title'] = 'Dashboard';
        $data['active_sidebar'] = 'dashboard';
        // $data['instansi'] = $this->instansiModel->getInstansiJoin();
        $kode_instansi = session('kode_instansi_dinas');
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        $data['deskripsiFoto'] = $this->instansiDinasModel->findAll();
        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoin();
        $data['tabel'] = $this->instansiDinasModel->where('kode_instansi', $kode_instansi)->first();
        $data['kode_instansi'] = $kode_instansi;
        foreach ($data['output'] as $output) {
            if ($output['kode_instansi'] == $kode_instansi) {
                $data['nama_instansi'] = $output['ket_ukerja'];
                $data['alamat_instansi'] = $output['alamat_ukerja'];
                $data['email_instansi'] = $output['email_ukerja'];
                break; // stop the loop if the matching code is found
            }
        }
        // $cek = session('kode_instansi_dinas');
        // dd($cek);
        return view('/user/dashboard', $data);
    }
}
