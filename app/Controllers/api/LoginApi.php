<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AdminModel;
use App\Models\AnakMagangModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\RequestTrait;
use CodeIgniter\Validation\Validation;
use Ramsey\Uuid\Uuid;

class LoginApi extends ResourceController
{
    protected $modelName = 'App\Models\ApiModel';
    protected $format    = 'json';

    use RequestTrait;
    public function test()
    {
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil menampilkan data'
            ]
        ];
        return $this->respond($response);
    }
    public function index()
    {
        $anakMagangModel = new AnakMagangModel();
        $response = [
            'showdata' => $anakMagangModel->showdata(),
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Berhasil menampilkan data'
            ]
        ];
        return $this->respond($response);
    }

    // public function registrasi()
    // {

    //     $uuid = Uuid::uuid4()->toString();
    //     $userModel = new AnakMagangModel();

    //     $data = [
    //         'id_user' => $uuid,
    //         'email_user'    => $this->request->getVar('email_user'),
    //         'no_hp'    => $this->request->getVar('no_hp'),
    //         'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
    //         'nik'    => $this->request->getVar('nik'),
    //         'nama_user'    => $this->request->getVar('nama_user'),
    //         'alamat'    => $this->request->getVar('alamat'),
    //         'status'   => 'aktif',
    //         'created_at' => date('Y-m-d H:i:s') // Menangkap waktu saat data dibuat
    //     ];

    //     $response = [
    //         'status' => 201,
    //         'error' => null,
    //         'messages' => [
    //             'success' => 'Berhasil menampilkan data'
    //         ]
    //     ];
    //     $userModel->save($data);
    //     return $this->respond($response);
    // }

    public function csrfToken()
    {
        $security = \Config\Services::getCSRFHash();
        $token = $security;

        return $this->response->setJSON(['csrf_token' => $token]);
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $anakMagangModel = new anakMagangModel();
        $user = $anakMagangModel->where('email', $email)->first();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_magang' => $user['id_magang'],
                    'email' => $user['email']
                ];
                $response = [
                    'status' => 200,
                    'data' => $data,
                    'error' => null,
                    'messages' => "berhasil"
                ];
            } else {
                $response = [
                    'status' => 500,
                    'error' => null,
                    'messages' => "Password salah"
                ];
            }
        } else {
            $response = [
                'status' => 500,
                'error' => null,
                'messages' => "User tidak ditemukan"
            ];
        }

        // if (!$user || !password_verify($password, $user['password'])) {
        //     $response = [
        //         'status' => 401,
        //         'error' => 'Email atau password salah',
        //         'messages' => [
        //             'error' => 'Autentikasi gagal'
        //         ]
        //     ];
        //     return $this->respond($response);
        // }

        // get the CSRF token
        // $csrf = csrf_hash();



        return $this->respond($response);
    }




    // ...
}
