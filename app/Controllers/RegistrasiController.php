<?php

namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\AdminModel;
use Ramsey\Uuid\Uuid;

class RegistrasiController extends BaseController
{

    public function index()
    {
        helper(['form']);
        $data = [];
        $data['instansi'] = $this->instansiModel->getInstansiJoin();
        //dd($data);
        return view('registrasi', $data);
    }

    public function store()
    {
        $uuid = Uuid::uuid4()->toString();
        helper(['form']);
        $data['instansi'] = $this->instansiModel->getInstansiJoin();
        // $rules = [
        //     'nama'          => 'required|min_length[2]|max_length[255]',
        //     'no_id'          => 'required|min_length[2]|max_length[50]|numeric',
        //     'email'             => 'required|min_length[4]|max_length[255]|valid_email|is_unique[admin.email]',
        //     'password'          => 'required|min_length[4]|max_length[255]',
        //     'confirmpassword'   => 'matches[password]',
        //     // 'level'             => 'required|in_list[super_admin,admin]'
        // ];
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
                    'numeric' => 'Terdapat karakter bukan numerik'
                ]
            ],
            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'valid_email' => 'Gunakan {field} yang valid!!.'
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'min_length' => '{field} minimal mempunyai {param} karakter.'
                ]
            ],
            'confirmpassword' => [
                'label' => 'password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'matches' => 'Kondirmasi Password tidak sesuai dengan password anda'
                ]
            ]
        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $email = $this->request->getVar('email');
        $data = $this->adminModel->where('email', $email)->first();
        if ($data) {
            $this->session->setFlashdata('errorRegister', 'Akun email ini sudah terdaftar sebagai admin tidak bisa didaftarkan lagi. Silahkan gunakan akun email lain!!');
            return redirect()->back()->withInput();
        }

        // $level = $this->request->getPost('level'); // Menangkap data jenis kelamin dari formulir
        $id_prodi = $this->request->getPost('id_prodi');
        // Generate kode verifikasi acak
        $verification_code = md5(rand(1, 1000000000));
        $reset_token_expires_at = date('Y-m-d H:i:s', time() + 3600); // Token expires in 1 hour
        $data = [
            'id_magang' => $uuid,
            'nama' => $this->request->getVar('nama'),
            'no_id' => $this->request->getVar('no_id'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'status'   => 'nonaktif',
            'status_magang'   => 'nonmagang',
            'verification_code' => $verification_code,
            'reset_token_expires_at' => $reset_token_expires_at,
            'id_prodi' => $id_prodi,
            'created_at' => date('Y-m-d H:i:s'), // Menangkap waktu saat data dibuat
            'updated_at' => null,

        ];
        // dd($data);
        $this->anakMagangModel->save($data);
        // Kirim email verifikasi
        $email = \Config\Services::email();
        // $email->setTo($this->anakMagangModel->email);
        $email->setTo($data['email']);
        $email->setSubject('Verifikasi Email');
        //$email->setMessage("Silahkan klik tautan ini untuk mengkonfirmasi alamat email Anda: " . base_url() . "verify_email/" . $verification_code);
        $email->setMessage(view('email_verification', ['verification_code' => $data['verification_code']]));
        // dd($email);
        $email->send();
        // return redirect()->to('/login_view');
        return redirect()->to('/login_view')->with('success', 'Registrasi berhasil! Silahkan cek email Anda untuk melakukan verifikasi.');

        // if ($this->validate($rules)) {
        //     // $level = $this->request->getPost('level'); // Menangkap data jenis kelamin dari formulir
        //     $id_prodi = $this->request->getPost('id_prodi');
        //     // Generate kode verifikasi acak
        //     $verification_code = md5(rand(1, 1000000000));
        //     $data = [
        //         'id_magang' => $uuid,
        //         'nama' => $this->request->getVar('nama'),
        //         'no_id' => $this->request->getVar('no_id'),
        //         'email'    => $this->request->getVar('email'),
        //         'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        //         'status'   => 'nonaktif',
        //         'status_magang'   => 'magang',
        //         'verification_code' => $verification_code,
        //         'id_prodi' => $id_prodi,
        //         'created_at' => date('Y-m-d H:i:s'), // Menangkap waktu saat data dibuat
        //         'updated_at' => null,

        //     ];
        //     // dd($data);
        //     $this->anakMagangModel->save($data);
        //     // Kirim email verifikasi
        //     $email = \Config\Services::email();
        //     // $email->setTo($this->anakMagangModel->email);
        //     $email->setTo($data['email']);
        //     $email->setSubject('Verifikasi Email');
        //     //$email->setMessage("Silahkan klik tautan ini untuk mengkonfirmasi alamat email Anda: " . base_url() . "verify_email/" . $verification_code);
        //     $email->setMessage(view('email_verification', ['verification_code' => $data['verification_code']]));
        //     // dd($email);
        //     $email->send();
        //     // return redirect()->to('/login_view');
        //     return redirect()->to('/login_view')->with('success', 'Registrasi berhasil! Silahkan cek email Anda untuk melakukan verifikasi.');
        // } else {
        //     $data['validation'] = $this->validator;
        //     echo view('/registrasi_view', $data);
        // }
    }

    public function verifyEmail($verification_code)
    {


        $user = $this->anakMagangModel->where('verification_code', $verification_code)->first();

        if ($user) {
            $data = ['is_verified' => true, 'status' => 'aktif', 'updated_at' => date('Y-m-d H:i:s'), 'reset_token_expires_at' => null];
            $this->anakMagangModel->update($user['id_magang'], $data);

            return redirect()->to('/login_view')->with('success', 'Email berhasil diverifikasi. Silahkan login.');
        } else {
            return redirect()->to('/register')->with('error', 'Token tidak valid.');
        }
    }
}
