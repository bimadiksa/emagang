<?php

namespace Config;

use App\Controllers\Admin\RegistrasiController;


// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/widget', 'Widget::index');

//LANDING PAGE
$routes->get('/', 'LoginController::indexLandingPage');
//LOGIN
//$routes->get('/', 'LoginController::index');
$routes->get('/login_view', 'LoginController::index');
$routes->add('Admin/LoginController/loginAuth', 'LoginController::loginAuth', ['post']);
$routes->match(['get', 'post'], 'LoginController/loginAuth', 'LoginController::loginAuth');
//MODAL NEW PASSWORD
$routes->post('newPassword/(:any)', 'LoginController::resetModalPassword/$1');
//LOGOUT
$routes->get('/logout', 'LoginController::logout',);
//REGISTRASI
//$routes->get('/', 'RegistrasiController::index');
$routes->get('/registrasi', 'RegistrasiController::index');
$routes->match(['get', 'post'], 'RegistrasiController/store', 'RegistrasiController::store');
$routes->get('/verify_email/(:any)', 'RegistrasiController::verifyEmail/$1'); //untuk verifiy email
//FORGOT PASSWORD
$routes->get('/lupa_password', 'LoginController::indexPassword');
$routes->post('/forgot_password', 'LoginController::forgotPassword');
$routes->get('/reset_password/(:any)', 'LoginController::indexReset/$1');
$routes->post('konfirmasi_reset_password', 'LoginController::resetPassword');
//PASSWORD DEFAULT ADMIN
$routes->get('password_baru', 'LoginController::indexModal');
//CONTAC US
$routes->post('kontak_kami', 'LoginController::contactUs');




$routes->group('admin', ['filter' => 'authGuard'], function ($routes) {
    $routes->group('', ['filter' => 'authAdmin'], function ($routes) { //filter agar anak magang tidak masuk ke  halaman admin
        // PAGES JIKA SUDAH LOGIN
        $routes->get('dashboard_view', 'Admin\Dashboard::index');

        // CRUD Admin
        $routes->group('', ['filter' => 'authLevel'], function ($routes) {
            // add
            $routes->match(['get', 'post'], 'tambahAdmin', 'Admin\CRUDAdmin::store');
            $routes->get('tambahAdmin_view', 'Admin\CRUDAdmin::indexTambah');
            // read
            $routes->get('admin_view', 'Admin\CRUDAdmin::read');

            // edit
            $routes->post('edit_admin/(:segment)', 'Admin\CRUDAdmin::update/$1');
            $routes->get('edit_admin/(:segment)', 'Admin\CRUDAdmin::edit/$1');
            $routes->get('rubah_status/(:segment)', 'Admin\CRUDAdmin::change_status/$1');
            // delete
            $routes->get('hapus/(:segment)', 'Admin\CRUDAdmin::delete/$1');
            $routes->get('hapus_anak_magang/(:any)', 'Admin\CRUDAnakMagang::deleteAnakMagang/$1');
            // restore
            // $routes->match(['get', 'post'], 'kembalikan/(:segment)', 'CRUDAdmin::restore/$1');

            //lihat saran
            $routes->get('lihat_saran', 'Admin\CRUDAdmin::indexSaran');
        });

        // CRUD instansi anak magang
        // read
        $routes->get('instansiAsal_view', 'Admin\CRUDInstansiAsal::index');
        // add
        $routes->get('tambah_instansi', 'Admin\CRUDInstansiAsal::indexTambah');
        $routes->match(['get', 'post'], 'tambah_data_instansi', 'Admin\CRUDInstansiAsal::add');
        //edit
        $routes->get('editInstansi/(:segment)', 'Admin\CRUDInstansiAsal::edit/$1');
        // delete
        $routes->match(['get', 'post'], 'hapusInstansi/(:segment)', 'Admin\CRUDInstansiAsal::delete/$1');

        //CRUD instansi dinas
        $routes->get('instansiDinas_view', 'Admin\CRUDInstansiDinas::indexInstansiDinas');
        $routes->get('edit_instansi_dinas/(:segment)', 'Admin\CRUDInstansiDinas::indexDeskripsi/$1');
        $routes->post('simpan_data_instansi_dinas/(:segment)', 'Admin\CRUDInstansiDinas::tambahDataInstansiDinas/$1');
        $routes->get('pilih_instansi/(:segment)', 'Admin\CRUDInstansiDinas::indexDeskripsi/$1');
        $routes->get('titik_lokasi_instansi_dinas/(:segment)', 'Admin\CRUDInstansiDinas::indexPilihTitik/$1');
        $routes->post('pilih_titik/(:segment)', 'Admin\CRUDInstansiDinas::pilihTitik/$1');


        //CRUD ANAK MAGANG
        //read
        $routes->get('anakMagang_view', 'Admin\CRUDAnakMagang::read');
        //edit
        $routes->get('rubah_status_anak_magang/(:segment)', 'Admin\CRUDAnakMagang::change_status/$1'); //aktif nonaktif
        $routes->get('rubah_status_magang/(:segment)', 'Admin\CRUDAnakMagang::change_status_magang/$1');
        $routes->get('kembalikan/(:segment)', 'Admin\CRUDAnakMagang::turnBack/$1');

        //CRUD REKAP JURNAL
        $routes->get('rekapjurnal', 'Admin\CRUDAnakMagang::rekapJurnal');
    });
});
$routes->group('user', ['filter' => 'authGuard'], function ($routes) {
    //user anak magang
    $routes->get('dashboard_magang', 'User\Dashboard::index');
    $routes->get('profile_magang/(:segment)', 'User\Profile::index/$1');
    $routes->post('edit_profile_magang/(:segment)', 'User\Profile::editProfile/$1');
    $routes->post('edit_foto_magang/(:segment)', 'User\Profile::editFoto/$1');

    //jurnal
    $routes->get('jurnal_harian', 'User\Jurnal::index');
    $routes->post('tambah_jurnal/(:segment)', 'User\Jurnal::tambahJurnal/$1');
    $routes->post('edit_jurnal/(:segment)', 'User\Jurnal::updateJurnal/$1');
    $routes->get('hapus_jurnal/(:segment)', 'User\Jurnal::hapusJurnal/$1');


    $routes->get('absen', 'User\Absen::index');
    $routes->get('sertif', 'User\Sertif::index');
    $routes->get('location', 'User\Location::index');
    $routes->get('kartu/(:segment)', 'User\Kartu::index/$1');
    $routes->get('detail/(:segment)', 'User\Location::indexDetail/$1');
    $routes->get('pilih_instansi/(:segment)', 'User\Location::pilih/$1');
    $routes->get('batal_pilih_instansi/(:segment)', 'User\Location::batalPilih/$1');
});
// $routes->get('dashboard_magang', 'User\Dashboard::index');

$routes->group('api', ['namespace' => 'App\Controllers\api', 'filter' => 'ApiAuth'], function ($routes) {
    // Equivalent to the following:
    $routes->get('test', 'LoginApi::test');
    $routes->get('index', 'LoginApi::datamagang');
});
$routes->post('api/login', 'api\LoginApi::login');
$routes->get('api/datamagang/(:segment)', 'api\LoginApi::datamagang/$1');
$routes->get('api/jurnal/(:segment)', 'api\LoginApi::jurnal/$1');
$routes->get('api/anakMagangById/(:segment)', 'api\LoginApi::getAnakMagangById/$1');
$routes->get('api/editProfileById/(:segment)', 'api\LoginApi::editProfileById/$1');
$routes->get('api/editFotoById/(:segment)', 'api\LoginApi::editFotoById/$1');
$routes->get('api/tambahJurnalById/(:segment)', 'api\LoginApi::tambahJurnalById/$1');
$routes->get('api/editJurnalById/(:segment)', 'api\LoginApi::editJurnalById/$1');
$routes->get('api/hapusJurnalById/(:segment)', 'api\LoginApi::hapusJurnalById/$1');
$routes->get('api/logout', 'api\LoginApi::logout');







/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
