<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
//use App\Models\AdminModel;
use Ramsey\Uuid\Uuid;
use App\Controllers\BaseController;

class CRUDAdmin extends BaseController
{
    public function indexTambah()
    {
        helper(['form']);
        $data = [];
        // $data['instansiDinas'] = $this->adminModel->getInstansiUtama();
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        $data['title'] = 'Tambah Akun Admin';
        $data['active_sidebar'] = 'admin_view';
        // dd($data);
        return view('/admin/tambahAdmin_view', $data);
    }

    public function store()
    {
        $uuid = Uuid::uuid4()->toString();
        helper(['form']);
        $data['title'] = 'Tambah Akun Admin';
        $data['active_sidebar'] = 'admin_view';
        // Validasi input dari form login
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'label' => 'usernmae',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'valid_email' => 'Gunakan {field} yang valid!!.'
                ]
            ],

        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->with('errors', $validation->getErrors());
        }


        if ($validation) {
            // Ambil kode instansi dari API sub_instansi

            $kode_instansi = $this->request->getPost('kode_instansi');
            $default_password = 'password123';
            $data = [
                'id_admin' => $uuid,
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => $default_password,
                'level' => 'admin',
                'status'   => 'aktif',
                'created_at' => date('Y-m-d H:i:s'), // Menangkap waktu saat data dibuat
                'updated_at' => null,
                'kode_instansi_dinas' => $kode_instansi // kode instansi yang didapat dari API
            ];
            //dd($data);
            $this->adminModel->save($data);
            // session()->setFlashdata('success', 'Data admin berhasil ditambahkan.');
            return redirect()->to('admin/admin_view')->with('success', 'Tambah Akun Admin Berhasil');
        } else {
            return redirect()->back()->withInput()->with('validation', $this->validator, 'Gagal tambah akun');
            // return redirect()->to('admin/tambahAdmin_view')->withInput();
        }
    }

    public function read()
    {

        $data['title'] = 'Akun Admin';
        $data['active_sidebar'] = 'admin_view';
        $data['admins'] = $this->adminModel->findAll();
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        // dd($data);
        return view('/admin/admin_view', $data);
    }
    public function edit($id_admin)
    {
        $datalevel = $this->adminModel->find($id_admin);
        $level = $datalevel['level'];
        if ($level == 'admin') {
            $data['title'] = 'Edit Akun Admin';
            $data['active_sidebar'] = 'admin_view';
            $data['admin'] = $this->adminModel->find($id_admin);

            if (empty($data)) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
            }

            $data['validation'] = null;
            $data['admins'] = $this->adminModel->getAdminById($id_admin);

            return view('admin/editAdmin_view', $data);
        } else {
            return redirect()->back();
        }
    }

    public function update($id_admin)
    {
        $data = $this->adminModel->find($id_admin);

        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $rules = [
            'username' => 'required',
        ];

        if ($this->validate($rules)) {
            $this->adminModel->update($id_admin, [
                'username' => $this->request->getPost('username'),
            ]);

            return redirect()->to('/admin/admin_view')->with('success', 'Data berhasil diedit');
        }

        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    public function change_status($id_admin)
    {
        // Ambil data dari database berdasarkan ID
        $data = $this->adminModel->find($id_admin);

        // Jika data tidak ditemukan, tampilkan halaman error 404
        // if (!$data) return $this->show_404();
        $level = $data['level'];
        if ($level == 'admin') {
            // Jika status aktif, ubah menjadi nonaktif, dan sebaliknya
            $status = $data['status'] == 'aktif' ? 'nonaktif' : 'aktif';

            // Update data di database
            $this->adminModel->update($id_admin, ['status' => $status]);
        } else {
            return redirect()->back();
        }
        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil  di update');
    }


    public function delete($id_admin)
    {

        $data = $this->adminModel->find($id_admin);
        //dd($id_admin);

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan: ' . $id_admin);
        }
        $level = $data['level'];
        if ($level == 'admin') {
            $this->adminModel->table('admin')->where('id_admin', $id_admin)->delete();
            //$this->adminModel->delete($id_admin);

            return redirect()->to('/admin/admin_view/')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->back();
        }
    }

    public function indexSaran()
    {
        $data['output'] = $this->saranModel->findAll();
        // dd($data);
        $data['title'] = 'Saran';
        $data['active_sidebar'] = 'lihat_saran';
        // dd($data);
        return view('/admin/saran_view', $data);
    }

    // public function restore($id_admin)
    // {


    //     $data = $this->adminModel->onlyDeleted()->find($id_admin); // hanya mencari data yang sudah dihapus

    //     if (!$data) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan: ' . $id_admin);
    //     }
    //     $data = [
    //         'deleted_at' => null
    //     ];
    //     $this->adminModel->restore($id_admin);

    //     return redirect()->to('/admin/admin_view/')->with('success', 'Data berhasil dikembalikan.');
    // }
}
