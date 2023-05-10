<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index($id_magang)
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoinById($id_magang);
        $data['instansiAsal'] = $this->anakMagangModel->getAnakMagangJoin();
        //dd($data);
        return view('/user/profile', $data);
    }
}
