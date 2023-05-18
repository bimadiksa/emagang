<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Location extends BaseController
{
    public function index()
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        //dd($data);
        $data['title'] = 'Instansi Dinas';
        $data['active_sidebar'] = 'instansi_dinas';
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        $data['deskripsiFoto'] = $this->instansiDinasModel->findAll();
        return view('/user/location', $data);
    }
    public function indexDetail($kode_instansi)
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
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
        // dd($data['tabel']);
        return view('/user/detailloc', $data);
    }
    public function pilih($kode_instansi)
    {
        $id_magang = session('id_magang');
        $cek = $this->anakMagangModel->where('id_magang', $id_magang)->first();
        if ($cek) {
            $data = [
                'id_magang' => $id_magang,
                'kode_instansi_dinas' => $kode_instansi,
            ];
            // dd($data);
            $this->session->set($data);
            $this->anakMagangModel->save($data);
            return redirect()->to('user/dashboard_magang')->with('success', 'Instansi Dinas berhasil dipilih, sekarang kamu bisa melakukan lebih banyak hal.');
        }
        //dd($id_magang);
        // dd($kode_instansi);
        // echo 'halo';
    }
}
