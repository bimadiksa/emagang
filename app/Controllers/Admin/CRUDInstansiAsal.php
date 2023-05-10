<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
//use App\Models\AdminModel;
use Ramsey\Uuid\Uuid;
use App\Controllers\BaseController;

class CRUDInstansiAsal extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        helper(['form']);
        $data = [];
        $data['title'] = 'Instansi Anak Magang';
        $data['active_sidebar'] = 'asal_instansi';
        $data['instansi'] = $this->instansiModel->getInstansiJoin();
        // dd($data);
        return view('/admin/instansiAsal_view', $data);
    }
    public function indexTambah()
    {
        helper(['form']);
        $data = [];
        $data['title'] = 'Tambah Instansi Anak Magang';
        $data['active_sidebar'] = 'asal_instansi';
        return view('/admin/tambahInstansiAsal_view', $data);
    }

    public function add()
    {
        helper(['form']);
        $data['title'] = 'Tambah Instansi Anak Magang';
        $data['active_sidebar'] = 'asal_instansi';

        if ($this->request->getPost()) {
            $nama_instansi = $this->request->getPost('nama_instansi');
            $instansi = $this->instansiModel->where('nama_instansi', $nama_instansi)->first();
            if ($instansi) {
                $id_instansi = $instansi['id_instansi'];
                $nama_jurusan = $this->request->getPost('nama_jurusan');
                $jurusan = $this->jurusanModel->where('nama_jurusan', $nama_jurusan)->first();
                if ($jurusan) {
                    $id_jurusan = $jurusan['id_jurusan'];
                    $nama_prodi = $this->request->getPost('nama_prodi');
                    $prodi = $this->prodiModel->where('nama_prodi', $nama_prodi)->first();
                    if ($prodi) {
                        $id_prodi = $prodi['id_prodi'];
                    } else {
                        $id_prodi = Uuid::uuid4()->toString();
                        $prodiData = [
                            'id_prodi' => $id_prodi,
                            'nama_prodi' => $this->request->getPost('nama_prodi'),
                            'id_jurusan' => $id_jurusan,
                            'created_at' => date('Y-m-d H:i:s'),
                        ];

                        $jurusanExist = $this->jurusanModel->find($id_jurusan);
                        if ($jurusanExist) {
                            $this->prodiModel->insert($prodiData);
                            return redirect()->to('/admin/instansiAsal_view')->with('success', 'Tambah Instansi Asal Berhasil');
                        } else {
                            // handle error here, instansi not found
                        }
                    }
                } else {
                    $id_jurusan = Uuid::uuid4()->toString();
                    $jurusanData = [
                        'id_jurusan' => $id_jurusan,
                        'nama_jurusan' => $this->request->getPost('nama_jurusan'),
                        'id_instansi' => $id_instansi,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                    $instansiExist = $this->instansiModel->find($id_instansi);
                    if ($instansiExist) {
                        $this->jurusanModel->insert($jurusanData);
                    } else {
                        // handle error here, instansi not found
                    }

                    $id_prodi = Uuid::uuid4()->toString();
                    $prodiData = [
                        'id_prodi' => $id_prodi,
                        'nama_prodi' => $this->request->getPost('nama_prodi'),
                        'id_jurusan' => $id_jurusan,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                    $this->prodiModel->insert($prodiData);
                    return redirect()->to('/admin/instansiAsal_view')->with('success', 'Tambah Instansi Asal Berhasil');
                }
            } else {
                $id_instansi = Uuid::uuid4()->toString();
                $instansiData = [
                    'id_instansi' => $id_instansi,
                    'nama_instansi' => $this->request->getPost('nama_instansi'),
                    'alamat_instansi' => $this->request->getPost('alamat_instansi'),
                    'jenis_instansi' => $this->request->getPost('jenis_instansi'),
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $this->instansiModel->insert($instansiData);

                $id_jurusan = Uuid::uuid4()->toString();
                $jurusanData = [
                    'id_jurusan' => $id_jurusan,
                    'nama_jurusan' => $this->request->getPost('nama_jurusan'),
                    'id_instansi' => $id_instansi,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->jurusanModel->insert($jurusanData);

                $id_prodi = Uuid::uuid4()->toString();

                $prodiData = [
                    'id_prodi' => $id_prodi,
                    'nama_prodi' => $this->request->getPost('nama_prodi'),
                    'id_jurusan' => $id_jurusan,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->prodiModel->insert($prodiData);
                return redirect()->to('/admin/instansiAsal_view')->with('success', 'Tambah Instansi Asal Berhasil');
            }
        }


        return view('admin/tambahInstansiAsal_view', [
            'jurusan' => $this->jurusanModel->findAll(),
            'prodi' => $this->prodiModel->findAll(),
        ]);
    }

    public function edit($id_prodi)
    {
        // dd($id_admin);
        $data['title'] = 'Edit Data Instansi Anak Magang';
        $data['active_sidebar'] = 'instansi_asal';
        //$data['instansi'] = $this->instansiModel->find($id_instansi);
        $data['prodi'] = $this->prodiModel->find($id_prodi);
        //dd($data['instansi']);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data not found');
        }

        $data['validation'] = null;
        $data['instansis'] = $this->prodiModel->getProdiById($id_prodi);
        //dd($data['instansis']);

        return view('admin/editInstansiAsal_view', $data);
    }

    public function delete($id_prodi)
    {
        // Cari data prodi berdasarkan id_prodi
        $prodi = $this->prodiModel->find($id_prodi);

        // Jika prodi ditemukan
        if ($prodi) {
            // Cek apakah prodi masih memiliki jurusan yang terhubung
            $jurusan = $this->jurusanModel->where('id_jurusan', $prodi['id_jurusan'])->first();
            if (!$jurusan) {
                $instansi = $this->instansiModel->where('id_instansi', $jurusan['id_instansi'])->first();
                if (!$instansi) {
                    // Jika jurusan tidak memiliki prodi lainnya, hapus prodi berdasarkan id_prodi
                    // dan hapus juga jurusan berdasarkan id_jurusan
                    // $this->prodiModel->table('prodi')->where('id_prodi', $id_prodi)->delete();
                    // $this->jurusanModel->table('jurusan')->where('id_jurusan', $prodi['id_jurusan'])->delete();
                    // $this->instansiModel->table('instansi')->where('id_instansi', $jurusan['id_instansi'])->delete();

                    $this->db->transStart(); // Memulai transaksi

                    try {
                        // Menghapus data dari tabel instansi
                        $this->instansiModel->table('instansi')->where('id_instansi', $jurusan['id_instansi'])->delete();
                        // Menghapus data dari tabel jurusan
                        $this->jurusanModel->table('jurusan')->where('id_jurusan', $prodi['id_jurusan'])->delete();
                        // Menghapus data dari tabel prodi
                        $this->prodiModel->table('prodi')->where('id_prodi', $id_prodi)->delete();

                        $this->db->transCommit(); // Melakukan commit transaksi jika semua operasi berhasil
                        return true; // Mengembalikan true sebagai indikasi sukses
                    } catch (\Exception $e) {
                        $this->db->transRollback(); // Melakukan rollback transaksi jika terjadi kesalahan
                        return false; // Mengembalikan false sebagai indikasi gagal
                    }

                    // $this->prodiModel->delete($id_prodi);
                    // $this->jurusanModel->delete($prodi['id_jurusan']);
                    // $this->instansiModel->delete($jurusan['id_instansi']);
                    return redirect()->to('/admin/instansiAsal_view')->with('success', 'Hapus Prodi dan Jurusan Berhasil');
                }
                // Jika jurusan tidak memiliki prodi lainnya, hapus prodi berdasarkan id_prodi
                // dan hapus juga jurusan berdasarkan id_jurusan

                // $this->prodiModel->table('prodi')->where('id_prodi', $id_prodi)->delete();
                // $this->jurusanModel->table('jurusan')->where('id_jurusan', $prodi['id_jurusan'])->delete();

                $this->db->transStart(); // Memulai transaksi

                try {
                    // Menghapus data dari tabel jurusan
                    $this->jurusanModel->table('jurusan')->where('id_jurusan', $prodi['id_jurusan'])->delete();
                    // Menghapus data dari tabel prodi
                    $this->prodiModel->table('prodi')->where('id_prodi', $id_prodi)->delete();
                    $this->db->transCommit(); // Melakukan commit transaksi jika semua operasi berhasil
                    return true; // Mengembalikan true sebagai indikasi sukses
                } catch (\Exception $e) {
                    $this->db->transRollback(); // Melakukan rollback transaksi jika terjadi kesalahan
                    return false; // Mengembalikan false sebagai indikasi gagal
                }

                // $this->prodiModel->delete($id_prodi);
                // $this->jurusanModel->delete($prodi['id_jurusan']);
                return redirect()->to('/admin/instansiAsal_view')->with('success', 'Hapus Prodi dan Jurusan Berhasil');
            } else {

                // Jika jurusan masih memiliki prodi lainnya, hapus prodi berdasarkan id_prodi
                $this->prodiModel->table('prodi')->where('id_prodi', $id_prodi)->delete();
                // $this->prodiModel->delete($id_prodi);
                return redirect()->to('/admin/instansiAsal_view')->with('success', 'Hapus Prodi Berhasil');
            }
        } else {
            // Jika prodi tidak ditemukan, kembalikan error atau lakukan penanganan error sesuai kebutuhan
            // ...
        }
    }
}
