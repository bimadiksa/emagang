<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Jurnal extends BaseController
{
    public function index()
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        //dd($data);
        return view('/user/jurnal');
    }
}
