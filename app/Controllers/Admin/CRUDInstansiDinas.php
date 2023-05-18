<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
//use App\Models\AdminModel;
use Ramsey\Uuid\Uuid;
use App\Controllers\BaseController;
use SebastianBergmann\Type\NullType;

class CRUDInstansiDinas extends BaseController
{
    public function indexInstansiDinas()
    {
        $data['title'] = 'Instansi Dinas';
        $data['active_sidebar'] = 'instansi_dinas';

        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        $data['admins'] = $this->adminModel->findAll();
        $data['deskripsiFoto'] = $this->instansiDinasModel->findAll();

        // dd($data);
        return view('/admin/instansiDinas_view', $data);
    }

    public function indexDeskripsi($kode_instansi)
    {
        $data['title'] = 'Instansi Dinas';
        $data['active_sidebar'] = 'instansi_dinas';
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        $data['deskripsi'] = $this->instansiDinasModel->getDeskripsi($kode_instansi);
        $data['kode_instansi'] = $kode_instansi;
        foreach ($data['output'] as $output) {
            if ($output['kode_instansi'] == $kode_instansi) {
                $data['nama_instansi'] = $output['ket_ukerja'];
                break; // stop the loop if the matching code is found
            }
        }
        // dd($data);
        // dd($data['deskripsiFoto']);
        return view('/admin/instansiDinasDeskripsi_view', $data);
    }

    public function tambahDataInstansiDinas($kode_instansi)
    {
        //dd($kode_instansi);
        $data['title'] = 'Instansi Dinas';
        $data['active_sidebar'] = 'instansi_dinas';
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        // $nama_foto['nama_foto'] = $$this->instansiDinasModel->where('kode_instansi', $kode_instansi)->first();
        $data['kode_instansi'] = $kode_instansi;
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                ]
            ],
            'foto_instansi' => [
                'label' => 'Foto Instansi',
                'rules' => 'uploaded[foto_instansi]|mime_in[foto_instansi,image/jpg,image/jpeg,image/png]', // Aturan validasi
                'errors' => [
                    'uploaded' => '{field} harus diunggah.',
                    'mime_in' => '{field} harus berupa file gambar (JPG, JPEG, atau PNG).',
                ]
            ],


        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->with('errors', $validation->getErrors());
        }
        foreach ($data['output'] as $output) {
            $cekKodeInstansi = $output['kode_instansi'] == $kode_instansi;
            if ($cekKodeInstansi) {
                $cekIdInstansiDinas = $this->instansiDinasModel->where('kode_instansi', $kode_instansi)->first();

                if ($cekIdInstansiDinas) {
                    $pathFoto = $cekIdInstansiDinas['foto_instansi'];
                    unlink(ROOTPATH . 'public/images/' . $pathFoto);
                    $foto = $this->request->getFile('foto_instansi');
                    $foto->move(ROOTPATH . 'public/images/');
                    $foto_instansi =  $foto->getName();
                    $data = [
                        'kode_instansi' => $kode_instansi,
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'foto_instansi' => $foto_instansi,
                    ];
                    $this->instansiDinasModel->update($kode_instansi, $data);
                } else {
                    // Simpan foto ke direktori lokal
                    $foto = $this->request->getFile('foto_instansi');
                    $foto->move(ROOTPATH . 'public/images/');

                    // Simpan path foto ke database
                    $foto_instansi =  $foto->getName();
                    $data = [
                        'kode_instansi' => $kode_instansi,
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'foto_instansi' =>  $foto_instansi,
                    ];
                    //dd($data);
                    $this->instansiDinasModel->insert($data);
                }
            }
        }

        return redirect()->to('/admin/instansiDinas_view')->with('success', 'Data berhasil diedit');
    }
}
