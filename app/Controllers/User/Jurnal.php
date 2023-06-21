<?php

namespace App\Controllers\User;

use Ramsey\Uuid\Uuid;
use App\Controllers\BaseController;

class Jurnal extends BaseController
{
    public function index()
    {
        // Kode untuk menampilkan halaman dashboard
        helper('uri');
        $data['title'] = 'Jurnal Harian';
        $data['active_sidebar'] = 'jurnal';
        $data['jurnal'] = $this->jurnalModel->getJurnal();
        // dd($data);
        return view('/user/jurnal', $data);
    }

    public function tambahJurnal($id_magang)
    {
        $data['title'] = 'Jurnal Harian';
        $data['active_sidebar'] = 'jurnal';
        $uuid = Uuid::uuid4()->toString();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'haritanggal' => [
                'label' => 'Hari dan Tanggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                ]
            ],
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                ]
            ],
            'isijurnal' => [
                'label' => 'Isi Jurnal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                ]
            ],
            'dokumentasi' => [
                'label' => 'Bukti Dokumentasi',
                'rules' => 'uploaded[dokumentasi]|mime_in[dokumentasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} harus diunggah.',
                    'mime_in' => '{field} harus berupa file gambar (JPG, JPEG, atau PNG).',
                ]
            ],



        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        // $this->session->set('showModal', false);
        // $id_magang = session('id_magang');
        $cekId = $this->anakMagangModel->where('id_magang', $id_magang)->first();
        // dd($cekId);
        if ($cekId) {

            // $ses_jurnal = [
            //     'showModal' => TRUE
            // ];
            // $this->session->set($ses_jurnal);
            $dokumentasi = $this->request->getFile('dokumentasi');
            // dd($dokumentasi);
            $dokumentasi->move(ROOTPATH . 'public/jurnal/');
            $nama_dokumentasi = $dokumentasi->getName();
            $data = [
                'id_log_book' => $uuid,
                'tanggal_logbook' => $this->request->getVar('haritanggal'),
                'judul' => $this->request->getVar('judul'),
                'deskripsi'    => $this->request->getVar('isijurnal'),
                'foto' => $nama_dokumentasi,
                'id_magang'   => $id_magang,
                'created_at' => date('Y-m-d H:i:s'), // Menangkap waktu saat data dibuat
                'updated_at' => null,

            ];
            // dd($data);
            $this->jurnalModel->save($data);
            return redirect()->to('user/jurnal_harian')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function updateJurnal($id_log_book)
    {
        $data['title'] = 'Jurnal Harian';
        $data['active_sidebar'] = 'jurnal_harian';
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'haritanggal' => [
                'label' => 'Hari dan Tanggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                ]
            ],
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                ]
            ],
            'isijurnal' => [
                'label' => 'Isi Jurnal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!!.',
                ]
            ],
            'dokumentasi' => [
                'label' => 'Bukti Dokumentasi',
                'rules' => 'uploaded[dokumentasi]|mime_in[dokumentasi,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => '{field} harus diunggah.',
                    'mime_in' => '{field} harus berupa file gambar (JPG, JPEG, atau PNG).',
                ]
            ],



        ]);
        // Jika validasi tidak terpenuhi
        if (!$validation->withRequest($this->request)->run()) {
            // dd($validation);
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        // $this->session->set('showModal', false);
        // $id_magang = session('id_magang');
        $cekId = $this->jurnalModel->where('id_log_book', $id_log_book)->first();
        // dd($cekId);
        if ($cekId) {
            //dd($cekId);
            $pathFoto = $cekId['foto'];
            unlink(ROOTPATH . 'public/jurnal/' . $pathFoto);

            // $ses_jurnal = [
            //     'showModal' => TRUE
            // ];
            // $this->session->set($ses_jurnal);
            $dokumentasi = $this->request->getFile('dokumentasi');
            $dokumentasi->move(ROOTPATH . 'public/jurnal/');
            $nama_dokumentasi = $dokumentasi->getName();
            $this->jurnalModel->update($id_log_book, [
                'id_log_book' => $id_log_book,
                'tanggal_logbook' => $this->request->getVar('haritanggal'),
                'judul' => $this->request->getVar('judul'),
                'deskripsi'    => $this->request->getVar('isijurnal'),
                'foto' => $nama_dokumentasi,
            ]);
            // $data = [
            //     'id_log_book' => $id_log_book,
            //     'tanggal_logbook' => $this->request->getVar('haritanggal'),
            //     'judul' => $this->request->getVar('judul'),
            //     'deskripsi'    => $this->request->getVar('isijurnal'),
            //     'foto' => $nama_dokumentasi,

            // ];
            // // dd($data);
            // $this->jurnalModel->update($data);
            return redirect()->to('user/jurnal_harian')->with('success', 'Data berhasil dihapus');
        }
    }

    public function hapusJurnal($id_log_book)
    {

        $data = $this->jurnalModel->find($id_log_book);
        $pathFoto = $data['foto'];
        unlink(ROOTPATH . 'public/jurnal/' . $pathFoto);
        //dd($id_log_book);

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan: ' . $id_log_book);
        }
        $this->jurnalModel->table('logbook')->where('id_log_book', $id_log_book)->delete();
        //$this->adminModel->delete($id_admin);

        return redirect()->to('/user/jurnal_harian')->with('success', 'Data berhasil dihapus.');
    }
}
