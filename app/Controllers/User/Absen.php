<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Absen extends BaseController
{
    public function index()
    {
        $data['title'] = 'Absen';
        $data['active_sidebar'] = 'absen';
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        //dd($data);
        return view('/user/absen', $data);
    }
}
