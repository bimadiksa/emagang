<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['title'] = 'Dashboard';
        $data['active_sidebar'] = 'dashboard';
        // $data['instansi'] = $this->instansiModel->getInstansiJoin();
        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoin();
        //dd($data);
        return view('/user/dashboard', $data);
    }
}
