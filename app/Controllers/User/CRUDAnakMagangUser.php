<?php

namespace App\Controllers\User;


//use App\Models\AdminModel;
use Ramsey\Uuid\Uuid;
use App\Controllers\BaseController;

class CRUDAnakMagang extends BaseController
{
    public function indexDashboardMagang()
    {

        $data['title'] = 'Dashboard';
        $data['active_sidebar'] = 'dashboard';
        // $data['instansi'] = $this->instansiModel->getInstansiJoin();
        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoin();
        //dd($data);


        //dd($data);
        return view('/user/dashboard', $data);
    }
}
