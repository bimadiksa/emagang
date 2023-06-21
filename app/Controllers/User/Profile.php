<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index($id_magang)
    {
        // dd($id_magang);
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['active_sidebar'] = 'profile';
        $data['title'] = 'Profile';
        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoinById($id_magang);
        $data['instansiAsal'] = $this->anakMagangModel->getAnakMagangJoin();
        $data['instansiForm'] = $this->instansiModel->getInstansiJoin();
        // dd($data);
        //dd($data);
        return view('/user/profile', $data);
    }
    public function editProfile($id_magang)
    {
        // dd($id_magang);
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'max_length' => '{field} miksimal mempunyai {param} karakter.'
                ]
            ],
            'no_id' => [
                'label' => 'NIM/NISN',
                'rules' => 'required|min_length[4]|max_length[50]|numeric',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'min_length' => '{field} minimal mempunyai {param} karakter.',
                    'max_length' => '{field} miksimal mempunyai {param} karakter.',
                    'numeric' => 'Terdapat karakter bukan angka'
                ]
            ],
            'no_hp' => [
                'label' => 'No Hp',
                'rules' => 'required|min_length[4]|max_length[50]|numeric',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'min_length' => '{field} minimal mempunyai {param} karakter.',
                    'max_length' => '{field} miksimal mempunyai {param} karakter.',
                    'numeric' => 'Terdapat karakter bukan angka'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'max_length' => '{field} miksimal mempunyai {param} karakter.'
                ]
            ],


        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $cekId = $this->anakMagangModel->where('id_magang', $id_magang)->first();
        $no_hp = $this->request->getVar('no_hp');
        // dd($no_hp);
        if ($cekId) {
            $cekInstansiAsal = $this->request->getPost('id_prodi');
            // $data = [
            //     'id_magang' => $id_magang,
            //     'nama' => $this->request->getVar('nama'),
            //     'no_id' => $this->request->getVar('no_id'),
            //     'no_hp'    => $this->request->getVar('no_hp'),
            //     'alamat'    => $this->request->getVar('alamat'),
            // ];
            // dd($data);
            // dd($cekInstansiAsal);
            if ($cekInstansiAsal !== "") {
                $this->anakMagangModel->update($id_magang, [
                    'id_magang' => $id_magang,
                    'nama' => $this->request->getVar('nama'),
                    'no_id' => $this->request->getVar('no_id'),
                    'no_hp'    => $no_hp,
                    'alamat'    => $this->request->getVar('alamat'),
                    'id_prodi' => $cekInstansiAsal,

                ]);
            } else {
                $this->anakMagangModel->update($id_magang, [
                    'id_magang' => $id_magang,
                    'nama' => $this->request->getVar('nama'),
                    'no_id' => $this->request->getVar('no_id'),
                    'no_hp'    => $no_hp,
                    'alamat'    => $this->request->getVar('alamat'),

                ]);
            }


            session()->set('nama', $this->request->getVar('nama'));
            return redirect()->to('user/profile_magang/' . $id_magang)->with('success', 'Data berhasil dirubah');
        }
    }
    public function editFoto($id_magang)
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'foto_magang' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto_magang]|mime_in[foto_magang,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} harus diunggah.',
                    'mime_in' => '{field} harus berupa file gambar (JPG, JPEG, atau PNG).',
                ]
            ],


        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $cekId = $this->anakMagangModel->where('id_magang', $id_magang)->first();

        if ($cekId['foto'] === null) {
            $foto_magang = $this->request->getFile('foto_magang');
            $foto_magang->move(ROOTPATH . 'public/foto_magang/');
            $nama_foto_magang = $foto_magang->getName();
            $data = [
                'id_magang' => $id_magang,
                'foto' => $nama_foto_magang,
            ];
            $this->anakMagangModel->save($data);
        } else {
            $pathFoto = $cekId['foto'];
            unlink(ROOTPATH . 'public/foto_magang/' . $pathFoto);
            $foto_magang = $this->request->getFile('foto_magang');
            $foto_magang->move(ROOTPATH . 'public/foto_magang/');
            $nama_foto_magang = $foto_magang->getName();
            $this->anakMagangModel->update($id_magang, [
                'id_magang' => $id_magang,
                'foto' => $nama_foto_magang,
            ]);
        }

        session()->set('foto', $nama_foto_magang);
        return redirect()->to('user/profile_magang/' . $id_magang)->with('success', 'Data berhasil dirubah');
    }
}
