<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Sertif extends BaseController
{
    public function index()
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['title'] = 'Sertifikat';
        $data['active_sidebar'] = 'sertifikat';

        //dd($data);
        return view('/user/sertif', $data);
    }
}
