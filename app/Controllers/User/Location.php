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
        $id_magang = session('id_magang');
        $data['title'] = 'Pilih Lokasi';
        $data['title'] = 'Location';
        $data['active_sidebar'] = 'lokasi';
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        $data['deskripsiFoto'] = $this->instansiDinasModel->findAll();
        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoin();
        foreach ($data['anakMagang'] as $anakMagang) {
            if ($anakMagang['id_magang'] == $id_magang) {
                $data['kode_instansi_dinas'] = $anakMagang['kode_instansi_dinas'];
                break; // stop the loop if the matching code is found
            }
        }
        return view('/user/location', $data);
    }
    public function indexDetail($kode_instansi)
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['active_sidebar'] = 'lokasi';

        $id_magang = session('id_magang');
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        // dd($data);
        $data['tabel'] = $this->instansiDinasModel->where('kode_instansi', $kode_instansi)->first();
        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoin();
        foreach ($data['anakMagang'] as $anakMagang) {
            if ($anakMagang['id_magang'] == $id_magang) {
                $data['kode_instansi_dinas'] = $anakMagang['kode_instansi_dinas'];
                break; // stop the loop if the matching code is found
            }
        }
        // dd($data);
        $data['kode_instansi'] = $kode_instansi;
        foreach ($data['output'] as $output) {
            if ($output['kode_instansi'] == $kode_instansi) {
                $data['nama_instansi'] = $output['ket_ukerja'];
                $data['alamat_instansi'] = $output['alamat_ukerja'];
                $data['email_instansi'] = $output['email_ukerja'];
                break; // stop the loop if the matching code is found
            }
        }
        // dd($data);
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
    public function batalPilih($kode_instansi)
    {
        $id_magang = session('id_magang');
        $cek = $this->anakMagangModel->where('id_magang', $id_magang)->first();
        if ($cek) {
            $data = [
                'id_magang' => $id_magang,
                'kode_instansi_dinas' => null,
            ];
            // dd($data);
            $this->session->set($data);
            $this->anakMagangModel->save($data);
            return redirect()->to('user/dashboard_magang')->with('success', 'Instansi Dinas berhasil dipilih, sekarang kamu bisa melakukan lebih banyak hal.');
        }
    }
}
