<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\AnakMagangModel;

class AuthLogin extends ResourceController
{
    use ResponseTrait;

    public function login()
    {
        $anakMagangModel = new AnakMagangModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $anakMagangModel->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->fail('Invalid login credentials');
        }

        // Generate a unique access token for authentication
        $accessToken = bin2hex(random_bytes(32));

        // Save the access token to the user's record in the database
        $anakMagangModel->update($user['id'], ['access_token' => $accessToken]);

        return $this->respond(['access_token' => $accessToken]);
    }
}
