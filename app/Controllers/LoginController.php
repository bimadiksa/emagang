<?php

namespace App\Controllers;


use CodeIgniter\Validation\Validation;
use CodeIgniter\HTTP\Cookie\Cookie;
// use CodeIgniter\Controller;


class LoginController extends BaseController
{
    protected $loginAttempts = 0;

    public function indexLandingPage()
    {
        return view('/landing_page');
    }
    public function index()
    {
        helper(['form']);

        // Cek apakah pengguna sudah login
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('admin/dashboard_view');
        }
        $data['error'] = session()->getFlashdata('error');
        //$id = service('uuid')->uuid4()->toString();
        // dd($id);
        return view('/login', $data);
    }

    public function loginAuth()
    {
        $count = 3;
        $attempt_count = (int) session()->get('attempt_count');
        if ($attempt_count >= 3) {
            // jika percobaan login gagal sudah mencapai 3 kali
            // tampilkan pesan error atau kirim ke halaman lain
            // yang memberikan informasi bahwa akun sudah terkunci
            return redirect()->to('/login_view')->with('error', 'Akun Anda sudah terkunci!');
        }
        if ($attempt_count >= 3) {
            $lockout_time = 30; // waktu dalam detik (di sini: 30 menit)
            session()->set('attempt_count', 0);
            session()->set('lockout_time', time() + $lockout_time);
            return redirect()->to('/login_view')->with('error', 'Akun Anda sudah terkunci!');
        }
        $lockout_time = session()->get('lockout_time');
        if ($lockout_time !== null && $lockout_time > time()) {
            // jika masih dalam masa terkunci
            $time_left = max(0, $lockout_time - time());
            return redirect()->to('/login_view')->with('error', 'Akun Anda terkunci selama ' . $time_left . ' detik!');
        }
        if ($lockout_time !== null && $lockout_time - time()) {
            // jika sudah melewati jangka waktu terkunci
            session()->remove('attempt_count');
            session()->remove('lockout_time');
        }

        // Validasi input dari form login
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'valid_email' => 'Gunakan {field} yang valid!!.'
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'min_length' => '{field} minimal mempunyai {param} karakter.'
                ]
            ]
        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');  //buat create user untuk ekripsi password lalu masukkan ke database
        //dd($dataMagang);
        if ($data = $this->adminModel->where('email', $email)->first()) {
            // dd($data);
            if ($data['status'] == 'nonaktif') {
                return redirect()->to('/login_view')->with('errorLogin', 'Akun Anda nonaktif. Mohon hubungi administrator.');
            }
            // dd($data);
            if ($data) {
                $this->session->set('showModal', false);
                if ($data) {
                    //$passwordDefault =  $this->adminModel->where('password123', $password)->first();
                    $cekPassword = $this->adminModel->where('email', $email)->where('password', $password)->first();
                    if ($cekPassword) {
                        $ses_modal = [
                            'id_admin' => $cekPassword['id_admin'],
                            'username' => $cekPassword['username'],
                            'showModal' => TRUE
                        ];

                        $this->session->set($ses_modal);
                        //dd($ses_modal);
                        //return redirect()->to('login_view')->with('showModal', TRUE);
                        //$this->session->setFlashdata('modal', view('modalLogin'));

                        // redirect ke halaman utama
                        return redirect()->to('/login_view');
                    } else {
                        $pass = $data['password'];
                        $authenticatePassword = password_verify($password, $pass); //manual di database tidak dienkripsi cari create uuid di google
                        //dd($authenticatePassword);
                        //dd($authenticatePassword);
                        if ($authenticatePassword) {
                            $ses_data = [
                                'id_admin' => $data['id_admin'],
                                'username' => $data['username'],
                                'email' => $data['email'],
                                'level' => $data['level'],
                                'kode_instansi_dinas' => $data['kode_instansi_dinas'],
                                'isLoggedIn' => TRUE
                            ];
                            $this->session->set($ses_data);
                            // Reset jumlah percobaan login dan waktu tunggu
                            $this->session->setFlashdata('success', 'Login berhasil');
                            // Jika username dan password benar, login berhasil
                            return redirect()->to('admin/dashboard_view')->with('succes', 'Login Berhasil'); //jika ingin multi  level beri kondisi disini
                        } else {
                            $this->session->setFlashdata('error', ' atau password salah.');
                            // Jika login gagal, tambahkan variabel session attempt_count
                            $attempt_count = (int) session()->get('attempt_count') + 1;
                            session()->set('attempt_count', $attempt_count);
                            $this->session->setFlashdata('errorLogin', 'email atau password salah. Anda memiliki kesempatan ' . ($count - $attempt_count) . ' kali lagi ');
                            // Jika percobaan login gagal sudah mencapai 3 kali
                            if ($attempt_count >= 3) {
                                // set variabel session lockout_time untuk mengunci form login
                                $lockout_time = 30; // waktu dalam detik (di sini: 30 menit)
                                session()->set('lockout_time', time() + $lockout_time);
                            }
                            return redirect()->to('login_view')->withInput();
                        }
                    }
                }
            } else {
                $this->session->setFlashdata('error', 'email atau salah..');
                // Jika login gagal, tambahkan variabel session attempt_count
                $attempt_count = (int) session()->get('attempt_count') + 1;
                session()->set('attempt_count', $attempt_count);
                $this->session->setFlashdata('errorLogin', 'email atau password salah. Anda memiliki kesempatan ' .  ($count - $attempt_count) . ' kali lagi ');
                // Jika percobaan login gagal sudah mencapai 3 kali
                if ($attempt_count >= 3) {
                    // set variabel session lockout_time untuk mengunci form login
                    $lockout_time = 30; // waktu dalam detik (di sini: 30 menit)
                    session()->set('lockout_time', time() + $lockout_time);
                }
                return redirect()->to('login_view')->withInput();
            }
            session()->remove(['attempt_count', 'lockout_time']);
        } elseif ($data = $this->anakMagangModel->where('email', $email)->first()) {
            // dd($data);
            if ($data) {
                if ($data['status'] !== 'aktif') {
                    return redirect()->to('/login_view')->with('errorLogin', 'Akun anda belum aktif silahkan daftar kembali dan lakukan verifikasi email!');
                } elseif ($data['status_magang'] !== 'magang') {
                    return redirect()->to('/login_view')->with('errorLogin', 'Akun anda masih berstatus non-magang. Mohon hubungi admin pada dinas anda!');
                }
                $authenticatePassword = password_verify($password, $data['password']);
                //dd($authenticatePassword);
                if ($authenticatePassword) {
                    $ses_data = [
                        'id_magang' => $data['id_magang'],
                        'nama' => $data['nama'],
                        'no_id' => $data['no_id'],
                        'email' => $data['email'],
                        'status_magang' => $data['status_magang'],
                        'kode_instansi_dinas' => $data['kode_instansi_dinas'],
                        'isLoggedIn' => TRUE
                    ];
                    $this->session->set($ses_data);
                    // Jika username dan password benar, login berhasil
                    return redirect()->to('user/dashboard_magang')->with('success', 'Login Berhasil'); //jika ingin multi  level beri kondisi disini
                } else {
                    $this->session->setFlashdata('error', 'email atau password salah.');
                    // Jika login gagal, tambahkan variabel session attempt_count
                    $attempt_count = (int) session()->get('attempt_count') + 1;
                    session()->set('attempt_count', $attempt_count);
                    $this->session->setFlashdata('errorLogin', 'email atau password salah. Anda memiliki kesempatan ' . ($count - $attempt_count) . ' kali lagi ');
                    // Jika percobaan login gagal sudah mencapai 3 kali
                    if ($attempt_count >= 3) {
                        // set variabel session lockout_time untuk mengunci form login
                        $lockout_time = 30; // waktu dalam detik (di sini: 30 menit)
                        session()->set('lockout_time', time() + $lockout_time);
                    }
                    return redirect()->to('login_view')->withInput();
                }
            } else {
                $this->session->setFlashdata('error', 'email atau password salah..');
                // Jika login gagal, tambahkan variabel session attempt_count
                $attempt_count = (int) session()->get('attempt_count') + 1;
                session()->set('attempt_count', $attempt_count);
                $this->session->setFlashdata('errorLogin', 'email atau password salah. Anda memiliki kesempatan ' .  ($count - $attempt_count) . ' kali lagi ');
                // Jika percobaan login gagal sudah mencapai 3 kali
                if ($attempt_count >= 3) {
                    // set variabel session lockout_time untuk mengunci form login
                    $lockout_time = 30; // waktu dalam detik (di sini: 30 menit)
                    session()->set('lockout_time', time() + $lockout_time);
                }
                return redirect()->to('login_view')->withInput();
            }
            session()->remove(['attempt_count', 'lockout_time']);
        }
    }

    public function logout()
    {
        // menghapus session login
        session_unset();
        session()->destroy();
        // redirect ke halaman login
        return redirect()->to('/login_view');
    }

    public function indexPassword()
    {
        return view('forgotPassword_view');
    }

    public function forgotPassword()
    {
        // Validasi input dari form login
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'label' => 'email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'valid_email' => 'Gunakan {field} yang valid!!.'
                ]
            ]
        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // Ambil email dari form
        $email = $this->request->getPost('email');
        // Cek apakah email terdaftar pada database
        if ($user = $this->anakMagangModel->where('email', $email)->where('no_id IS NOT NULL')->first()) {
            if (!$user) {
                return redirect()->back()->with('error', 'Email tidak ditemukan');
            }
            // Generate token reset password
            $token = md5(rand(1, 1000000000));
            $data = [
                'id_magang' => $user['id_magang'],
                'reset_token' => $token,
                'reset_token_expires_at' => date('Y-m-d H:i:s', time() + 3600) // Token expires in 1 hour
            ];
            // dd($data);
            $this->anakMagangModel->save($data);
            // Kirim email reset password
            $email = \Config\Services::email();
            $email->setTo($user['email']);
            $email->setSubject('Reset Password');
            $email->setMessage(view('emailResetPassword', ['token' => $token]));
            if ($email->send()) {
                return redirect()->back()->with('success', 'Silahkan cek email anda untuk merubah password!');
            } else {
                return redirect()->back()->with('error', 'Gagal mengirim email rubah password!');
            }
        } elseif ($user = $this->adminModel->where('email', $email)->where('level IS NOT NULL')->first()) {
            if (!$user) {
                return redirect()->back()->with('error', 'Email tidak ditemukan');
            }
            // Generate token reset password
            $token = md5(rand(1, 1000000000));
            $data = [
                'id_admin' => $user['id_admin'],
                'reset_token' => $token,
                'reset_token_expires_at' => date('Y-m-d H:i:s', time() + 3600) // Token expires in 1 hour
            ];
            // dd($data);
            $this->adminModel->save($data);
            // Kirim email reset password
            $email = \Config\Services::email();
            $email->setTo($user['email']);
            $email->setSubject('Reset Password');
            $email->setMessage(view('emailResetPassword', ['token' => $token]));
            if ($email->send()) {
                return redirect()->back()->with('success', 'Silahkan cek email anda untuk merubah password!');
            } else {
                return redirect()->back()->with('error', 'Gagal mengirim email rubah password!');
            }
        }


        return view('forgotPassword_view');
    }

    public function indexReset($token)
    {
        if ($user = $this->anakMagangModel->where('reset_token', $token)->where('reset_token_expires_at >', date('Y-m-d H:i:s'))->where('no_id IS NOT NULL')->first()) {
            if (!$user) {
                return redirect()->to('forgotPassword_view')->with('error', 'Token tidak cocok');
            }
        } elseif ($user = $this->adminModel->where('reset_token', $token)->where('reset_token_expires_at >', date('Y-m-d H:i:s'))->where('level IS NOT NULL')->first()) {
            if (!$user) {
                return redirect()->to('forgotPassword_view')->with('error', 'Token tidak cocok');
            }
        }

        return view('resetPassword_view', $user);
    }

    public function resetPassword()
    {
        // Validasi input dari form login
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'password' => [
                'label' => 'password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'min_length' => '{field} minimal mempunyai {param} karakter.'
                ]
            ],
            'confirmpassword' => [
                'label' => 'password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password anda'
                ]
            ],
        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // // Cek apakah token valid

        if ($user = $this->anakMagangModel->where('reset_token_expires_at IS NOT NULL')->where('reset_token_expires_at >', date('Y-m-d H:i:s'))->where('no_id IS NOT NULL')->first()) {
            if (!$user) {
                return redirect()->to('/')->with('errorToken', 'Invalid token sudah kadaluarsa silahkan ulangi lagi nanti!');
            }
            // Simpan password baru
            $this->anakMagangModel->save([
                'id_magang' => $user['id_magang'],
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'reset_token' => null,
                'reset_token_expires_at' => null
            ]);
        } elseif ($user = $this->adminModel->where('reset_token_expires_at IS NOT NULL')->where('reset_token_expires_at >', date('Y-m-d H:i:s'))->where('level IS NOT NULL')->first()) {
            if (!$user) {
                return redirect()->to('/')->with('errorToken', 'Invalid token sudah kadaluarsa silahkan ulangi lagi nanti!');
            }
            // Simpan password baru
            $this->adminModel->save([
                'id_admin' => $user['id_admin'],
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'reset_token' => null,
                'reset_token_expires_at' => null
            ]);
        }
        return redirect()->to('/login_view')->with('success', 'Password berhasil diubah');
    }
    public function resetModalPassword($id_admin)
    {
        // Validasi input dari form login
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'new_password' => [
                'label' => 'password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'min_length' => '{field} minimal mempunyai {param} karakter.'
                ]
            ],
            'new_confirmpassword' => [
                'label' => 'password',
                'rules' => 'required|matches[new_password]',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password anda'
                ]
            ],
        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            $this->session->set('showModal', true);
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // // Cek apakah token valid
        // $user = $this->anakMagangModel->where('reset_token', $token)->first();
        $user = $this->adminModel->where('email IS NOT NULL')->first();

        if (!$user) {
            return redirect()->to('/login_view')->with('errorNewPassword', 'Email atau password salah silahkan login dengan email dan password yang benar!!');
        }

        // Simpan password baru
        $this->adminModel->update($id_admin, [
            'password' => password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login_view')->with('success', 'Password berhasil diubah');
    }

    public function contactUs()
    {
        // Ambil data dari form
        //$subject['subjek'] = $this->request->getVar('subject');
        $fromEmail = (string) $this->request->getVar('email');
        $message = $this->request->getVar('message');

        //dd($subject);
        // Inisialisasi library email

        // Konfigurasi email
        $emailConfig = config('Email');
        // Inisialisasi library email
        $email = \Config\Services::email();
        $email->initialize($emailConfig);

        // Set alamat email pengirim dan penerima
        //$fromEmail = $emailConfig->$this->request->getVar('email');

        $fromName = $this->request->getVar('name');

        // Set alamat email pengirim dan penerima
        $email->setTo('emagangkominfosanti@gmail.com');
        $email->setFrom($fromEmail, $fromName);

        // Set subjek dan isi pesan
        $email->setSubject($fromEmail);
        $email->setMessage($message);

        // Kirim email
        if ($email->send()) {
            // Email berhasil dikirim
            return redirect()->back()->with('success', 'Pesan telah berhasil dikirim!');
        } else {
            // Email gagal dikirim
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.');
        }
    }
}
