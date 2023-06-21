<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
//use App\Models\AdminModel;
use Ramsey\Uuid\Uuid;
use App\Controllers\BaseController;

class CRUDAnakMagang extends BaseController
{
    public function read()
    {

        $data['title'] = 'Anak Magang';
        $data['active_sidebar'] = 'anakmagang';
        // $data['instansi'] = $this->instansiModel->getInstansiJoin();
        $data['anakMagang'] = $this->anakMagangModel->getAnakMagangJoin();
        $data['output'] = $this->instansiDinasModel->getDataFromAPI();
        foreach ($data['output'] as $instansi) {
            foreach ($data['anakMagang'] as $anakMagang) {
                if ($anakMagang['kode_instansi_dinas'] !== null) {
                    if ($instansi['kode_instansi'] == $anakMagang['kode_instansi_dinas']) {
                        $data['nama_instansi'] = $instansi['ket_ukerja'];
                    }
                }
            }
        }
        //dd($data);


        //dd($data);
        return view('/admin/anakMagang_view', $data);
    }

    public function deleteAnakMagang($id_magang)
    {
        $data = $this->anakMagangModel->find($id_magang);
        //dd($data);

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan: ' . $id_magang);
        }
        $status = $data['status_magang'];
        if ($status == 'nonmagang' || $status == 'tamat') {
            $this->anakMagangModel->table('anak_magang')->where('id_magang', $id_magang)->delete();
            //$this->adminModel->delete($id_admin);

            return redirect()->to('/admin/anakMagang_view/')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->back();
        }
    }

    public function change_status($id_magang)
    {
        // Ambil data dari database berdasarkan ID
        // dd($id_magang);
        $data = $this->anakMagangModel->find($id_magang);
        // Jika data tidak ditemukan, tampilkan halaman error 404
        // if (!$data) return $this->show_404();
        $status = $data['status'] == 'aktif' ? 'nonaktif' : 'aktif';

        // Update data di database
        $this->anakMagangModel->update($id_magang, ['status' => $status]);
        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil  di update');
    }

    public function change_status_magang($id_magang)
    {
        // Ambil data dari database berdasarkan ID
        $data = $this->anakMagangModel->find($id_magang);
        // Jika data tidak ditemukan, tampilkan halaman error 404
        // if (!$data) return $this->show_404();
        $status_magang = $data['status_magang'] == 'nonmagang' ? 'magang' : ($data['status_magang'] == 'magang' ? 'tamat' : 'nonmagang');
        // Update data di database
        $this->anakMagangModel->update($id_magang, ['status_magang' => $status_magang]);
        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil  di update');
    }

    public function turnBack($id_magang)
    {
        // Ambil data dari database berdasarkan ID
        // dd($id_magang);
        $data = $this->anakMagangModel->find($id_magang);
        // Jika data tidak ditemukan, tampilkan halaman error 404
        // if (!$data) return $this->show_404();
        $kode = [
            'kode_instansi_dinas' => null,
        ];

        // Update data di database
        $this->anakMagangModel->update($id_magang, $kode);
        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'BERHASIL DIUBAH. Anak magang telah dikembalikan karena memilih tempat magang yang salah');
    }

    public function rekapJurnal()
    {
        $data['title'] = 'Rekap Jurnal';
        $data['active_sidebar'] = 'rekapjurnal';
        $data['jurnal'] = $this->jurnalModel->getJurnal();
        $data['anakMagang'] = $this->anakMagangModel->getAllAnakMagang();
        $data['admin'] = $this->adminModel->getAllAdmin();
        $data['instansi'] = $this->instansiDinasModel->getDataFromAPI();
        // dd($data);
        return view('/admin/rekapJurnal_view', $data);
    }
}
