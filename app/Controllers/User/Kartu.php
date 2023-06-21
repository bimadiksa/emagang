<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Kartu extends BaseController
{
    public function index($id_magang)
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['title'] = 'Kartu Nama';
        $data['active_sidebar'] = 'dashboard';

        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoinById($id_magang);
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        //dd($data);
        return view('/user/kartu', $data);
    }
}
