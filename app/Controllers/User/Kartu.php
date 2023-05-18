<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Kartu extends BaseController
{
    public function index()
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        //dd($data);
        return view('/user/kartu');
    }
}
