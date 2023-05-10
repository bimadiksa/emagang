<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthLevel implements FilterInterface
{
    // inget tambahiin di filter biar mau
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        $level = $session->get('level');
        if ($level !== 'super_admin') {

            return redirect()->to('admin/dashboard_view');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
