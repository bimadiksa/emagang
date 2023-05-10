<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdmin implements FilterInterface
{
    // inget tambahiin di filter biar mau
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        $adminId = $session->get('id_admin');
        $db = \Config\Database::connect();

        // cek apakah pengguna terdaftar di tabel user
        $userQuery = $db->table('admin')->getWhere(['id_admin' => $adminId]);
        $user = $userQuery->getRow();
        // cek apakah pengguna memiliki level yang diperbolehkan
        if (!$user) {
            return redirect()->to('user/dashboard_magang');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
