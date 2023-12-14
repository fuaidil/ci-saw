<?php

namespace App\Controllers;

use App\Models\alternatif_model;
use App\Models\bobot_model;
use App\Models\MahasiswaModel;
use App\Models\JenisUsaha_Model;
use App\Models\kriteria_model;
use App\Models\umkm_model;
use Config\View;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['activeMenu'] = 'dashboard';

        $ju = new JenisUsaha_Model();
        $um = new umkm_model();
        $kr = new kriteria_model();
        $bo = new bobot_model();

        $getju = $ju->getAll();
        $getum = $um->getAll();
        $getkr = $kr->getAll();
        $getbo = $bo->getAll();

        $data1 = [
            "total1" => $getju,
            "total2" => $getum,
            "total3" => $getkr,
            "total4" => $getbo
        ];

        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('dashboard_view', $data1);
        echo view('admin_footer');
    }

    // Penilaian
    public function penilaian()
    {
        $kriteriaModel = new kriteria_model();
        $data['kriteria'] = $kriteriaModel->findAll();

        $v = [];

        foreach ($data['kriteria'] as $kriteria) {
            $kode_kriteria = $kriteria['kode_kriteria'];
            $nama_bobot = $kriteria['nama_bobot'];
            $nilai_bobot = $kriteria['nilai_bobot'];

            $bobotModel = new bobot_model();
            $bobot = $bobotModel->where('kode_kriteria', $kode_kriteria)->first();

            if ($bobot['tipe_kriteria'] == 'Benefit') {
                $v[] = $nilai_bobot * $bobot['nilai_kriteria'];
            } else {
                $v[] = $nilai_bobot / $bobot['nilai_kriteria'];
            }
        }

        $data['v'] = $v;

        return view('penilaian', $data);
    }
    private function hitungV($kriteria, $bobotData)
    {
        $total = 0;

        foreach ($bobotData as $bobot) {
            if ($bobot['kode_kriteria'] == $kriteria['kode_kriteria']) {
                if ($bobot['tipe_kriteria'] == 'Benefit') {
                    $total += ($bobot['nilai_kriteria'] / $this->maxBenefit($kriteria, $bobotData)) * $kriteria['nilai_bobot'];
                } else {
                    $total += ($this->minCost($kriteria, $bobotData) / $bobot['nilai_kriteria']) * $kriteria['nilai_bobot'];
                }
            }
        }

        return $total;
    }
    private function maxBenefit($kriteria, $bobotData)
    {
        $max = 0;

        foreach ($bobotData as $bobot) {
            if ($bobot['kode_kriteria'] == $kriteria['kode_kriteria'] && $bobot['tipe_kriteria'] == 'Benefit') {
                if ($bobot['nilai_kriteria'] > $max) {
                    $max = $bobot['nilai_kriteria'];
                }
            }
        }

        return $max;
    }
    private function minCost($kriteria, $bobotData)
    {
        $min = PHP_INT_MAX;

        foreach ($bobotData as $bobot) {
            if ($bobot['kode_kriteria'] == $kriteria['kode_kriteria'] && $bobot['tipe_kriteria'] == 'Cost') {
                if ($bobot['nilai_kriteria'] < $min) {
                    $min = $bobot['nilai_kriteria'];
                }
            }
        }

        return $min;
    }

    // Jenis Usaha
    public function view_ju()
    {
        $jenis_usaha = new JenisUsaha_Model();
        $dataMhs = $jenis_usaha->tampildata();
        $data = array('dataa' => $dataMhs);

        $data['title'] = 'Jenis Usaha';
        $data['activeMenu'] = 'ju';

        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('jenis_usaha/view', $data);
        echo view('admin_footer');

    }

    public function input_ju()
    {
        $data['title'] = 'Jenis Usaha';
        $data['activeMenu'] = 'ju';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('jenis_usaha/input', $data);
        echo view('admin_footer');
    }

    public function simpan_ju()
    {
        $ju = new JenisUsaha_Model();
        $nama = $this->request->getPost('nama');
        $id = $ju->getLastId();
        $data = [
            'kode_jenis_usaha' => $id,
            'nama' => $nama
        ];

        $tabelju = "jenis_usaha";
        if ($ju->saveju($tabelju, $data)) {
            return redirect()->to(site_url('Home/view_ju'))->with('success', 'Berhasil menambahkan data');
        } else {
            return redirect()->to(site_url('Home/view_ju'))->with('error', 'Gagal menambahkan data');
        }

    }

    public function form_edit_ju($id)
    {
        $model = new JenisUsaha_Model();
        $dataj = $model->getju($id);
        $dataa = array('dataju' => $dataj);
        
        $data['title'] = 'Jenis Usaha';
        $data['activeMenu'] = 'ju';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('jenis_usaha/edit', $dataa);
        echo view('admin_footer');
    }

    public function edit_ju($id)
    {
        $ju = new JenisUsaha_Model();
        $nama = $this->request->getPost('nama');

        $data = ['nama' => $nama];
        $where = ['kode_jenis_usaha' => $id];

        $tabelju = "jenis_usaha";
        $ju->prosesEditju($tabelju, $data, $where);
        return redirect()->to(site_url('home/view_ju'));
    }

    public function deleteju($id)
    {
        $ju = new JenisUsaha_Model();
        $ju->hapusju($id);
        return redirect()->to(site_url('home/view_ju'));
    }

    // UMKM
    public function view_umkm()
    {
        $umkm = new umkm_model();
        $dataumkm = $umkm->join();
        $data = array('dataa' => $dataumkm);

        $data['title'] = 'UMKM';
        $data['activeMenu'] = 'umkm';

        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('umkm/view', $data);
        echo view('admin_footer');
    }

    public function input_umkm()
    {
        $ju = new JenisUsaha_Model();
        $dataju = $ju->tampildata();
        $data = array('dataa' => $dataju);

        $data['title'] = 'UMKM';
        $data['activeMenu'] = 'umkm';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('umkm/input', $data);
        echo view('admin_footer');
    }

    public function simpan_umkm()
    {
        $ju = new umkm_model();
        $nama = $this->request->getPost('nama');
        $namap = $this->request->getPost('namap');
        $namaj = $this->request->getPost('namaj');
        $namad = $this->request->getPost('namad');
        $namak = $this->request->getPost('namak');
        $namaju = $this->request->getPost('ju');
        $id = $ju->getLastId();
        $data = [
            'kode_umkm' => $id,
            'nama_umkm' => $nama,
            'nama_pimpinan' => $namap,
            'jalan' => $namaj,
            'desa' => $namad,
            'kecamatan' => $namak,
            'jenis_usaha' => $namaju
        ];

        $tabel = "umkm";
        $ju->save_umkm($tabel, $data);
        return redirect()->to(site_url('Home/view_umkm'))->with('success', 'Berhasil menambahkan data');

    }

    public function form_edit_umkm($id)
    {
        $model = new umkm_model();
        $dataj = $model->get_umkm($id);
        $modelju = new JenisUsaha_Model();
        $join = $modelju->tampildata();

        $dataa = array('dataa' => $dataj, 'datajoin' => $join);
        
        $data['title'] = 'UMKM';
        $data['activeMenu'] = 'umkm';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('umkm/edit', $dataa);
        echo view('admin_footer');
    }

    public function edit_umkm($id)
    {
        $um = new umkm_model();
        $nama = $this->request->getPost('nama');
        $namap = $this->request->getPost('namap');
        $namaj = $this->request->getPost('namaj');
        $namad = $this->request->getPost('namad');
        $namak = $this->request->getPost('namak');
        $ju = $this->request->getPost('ju');

        $data = [
            'nama_umkm' => $nama,
            'nama_pimpinan' => $namap,
            'jalan' => $namaj,
            'desa' => $namad,
            'kecamatan' => $namak,
            'jenis_usaha' => $ju
        ];
        $where = ['kode_umkm' => $id];

        $tabelum = "umkm";
        $um->prosesEdit_umkm($tabelum, $data, $where);
        return redirect()->to(site_url('home/view_umkm'));
    }

    public function delete_umkm($id)
    {
        $um = new umkm_model();
        $um->hapus_umkm($id);
        return redirect()->to(site_url('home/view_umkm'));
    }

    // Kriteria
    public function view_kriteria()
    {
        $kriteria = new kriteria_model();
        $dataK = $kriteria->tampildata();
        $data = array('dataa' => $dataK);

        $data['title'] = 'Kriteria';
        $data['activeMenu'] = 'kriteria';

        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('kriteria/view', $data);
        echo view('admin_footer');
    }

    public function input_kriteria()
    {
        $bo = new bobot_model();
        $databo = $bo->tampildata();
        $data = array('dataa' => $databo);

        $data['title'] = 'Kriteria';
        $data['activeMenu'] = 'kriteria';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('kriteria/input', $data);
        echo view('admin_footer');
    }

    public function simpan_kriteria()
    {
        $nama = $this->request->getPost('nama');
        $namabo = $this->request->getPost('namabo');
        $nilai = $this->request->getPost('nilai');

        if($nama == 'Jenis Usaha'){
            $kode = "C1";
        } else if ($nama == 'Jumlah Pekerja'){
            $kode = "C2";
        } else {
            $kode = "C3";
        }

        $data = [
            'kode_kriteria' => $kode,
            'nama_kriteria' => $nama,
            'nama_bobot' => $namabo,
            'nilai_bobot' => $nilai
        ];

        $kri = new kriteria_model();
        $tabelMhs = "kriteria";
        $simpan = $kri->save_kriteria($tabelMhs, $data);
        return redirect()->to(site_url('home/view_kriteria'));
    }

    public function form_edit_kriteria(String $id)
    {
        $model = new kriteria_model();
        $dataj = $model->get_kriteria($id);
        $modelju = new bobot_model();
        $join = $modelju->tampildata();

        $dataa = array('dataa' => $dataj);
        // $dataa = array('dataa' => $dataj, 'datajoin' => $join);
        
        $data['title'] = 'Kriteria';
        $data['activeMenu'] = 'kriteria';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('kriteria/edit', $dataa);
        echo view('admin_footer');
    }

    public function edit_kriteria(String $id)
    {
        $um = new kriteria_model();
        $nama = $this->request->getPost('nama');
        $namabo = $this->request->getPost('namabo');
        $nilai = $this->request->getPost('nilai');

        if ($nama == 'Jenis Usaha') {
            $kode = "C1";
        } elseif ($nama == 'Jumlah Pekerja') {
            $kode = "C2";
        } elseif ($nama == 'Modal Usaha') {
            $kode = "C3";
        }

        $data = [
            'kode_kriteria' => $kode,
            'nama_kriteria' => $nama,
            'nama_bobot' => $namabo,
            'nilai_bobot' => $nilai
        ];
        $where = ['nama_bobot' => $id];

        $tabelk = "kriteria";
        $um->prosesEdit_kriteria($tabelk, $data, $where);
        return redirect()->to(site_url('home/view_kriteria'));
    }

    public function delete_kriteria(String $id)
    {
        $kr = new kriteria_model();
        $kr->hapus_kriteria($id);
        return redirect()->to(site_url('home/view_kriteria'));
    }

    // Bobot
    public function view_bobot()
    {
        $bobot = new bobot_model();
        $dataB = $bobot->tampildata();
        $data = array('dataa' => $dataB);

        $data['title'] = 'Bobot';
        $data['activeMenu'] = 'bobot';

        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('bobot/view', $data);
        echo view('admin_footer');

    }

    public function input_bobot()
    {
        $bo = new bobot_model();
        $databo = $bo->tampildata();
        $data = array('dataa' => $databo);

        $data['title'] = 'Bobot';
        $data['activeMenu'] = 'bobot';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('bobot/input', $data);
        echo view('admin_footer');
    }

    public function simpan_bobot()
    {
        $kri = new bobot_model();
        $nama = $this->request->getPost('nama');
        $tipe = $this->request->getPost('tipe');
        $nilai = $this->request->getPost('nilai');
        
        $kode = $kri->getLastId();

        $data = [
            'kode_kriteria' => $kode,
            'nama_kriteria' => $nama,
            'nilai_kriteria' => $nilai,
            'tipe_kriteria' => $tipe
        ];

        $tabelMhs = "bobot";
        $simpan = $kri->save_bobot($tabelMhs, $data);
        return redirect()->to(site_url('home/view_bobot'));
    }

    public function form_edit_bobot(String $id)
    {
        $model = new kriteria_model();
        $dataj = $model->tampildata($id);
        $modelju = new bobot_model();
        $join = $modelju->get_bobot($id);

        // $dataa = array('dataa' => $join);
        $dataa = array('dataa' => $join, 'datajoin' => $dataj);
        
        $data['title'] = 'Bobot';
        $data['activeMenu'] = 'bobot';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('bobot/edit', $dataa);
        echo view('admin_footer');
    }

    public function edit_bobot(String $id)
    {
        $ju = new bobot_model();
        $nama = $this->request->getPost('nama');
        $nilai = $this->request->getPost('nilai');
        $tipe = $this->request->getPost('tipe');

        $data = [
            'nama_kriteria' => $nama,
            'nilai_kriteria' => $nilai,
            'tipe_kriteria' => $tipe
        ];
        $where = ['kode_kriteria' => $id];

        $tabelju = "bobot";
        $ju->prosesEdit_bobot($tabelju, $data, $where);
        return redirect()->to(site_url('home/view_bobot'));
    }

    public function delete_bobot(String $id)
    {
        $ju = new bobot_model();
        $ju->hapus_bobot($id);
        return redirect()->to(site_url('home/view_bobot'));
    }

    

    // Alternatif
    public function view_alt() 
    {
        $alt = new alternatif_model();
        $datalt = $alt->tampildata();
        $data = array('dataa' => $datalt);

        $data['title'] = 'Alternatif';
        $data['activeMenu'] = 'alternatif';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('alternatif/view', $data);
        echo view('admin_footer');
    }

    public function simpan_alt()
    {
        $nama = $this->request->getPost('nama');
        $nilai1 = $this->request->getPost('nilai1');
        $nilai2 = $this->request->getPost('nilai2');
        $nilai3 = $this->request->getPost('nilai3');

        $data = [ 
            'nama_usaha'=> $nama,
            'C1' => $nilai1, 
            'C2' => $nilai2,
            'C3' => $nilai3
        ];

        $mhs = new alternatif_model();
        $tabel = "data_alternatif";
        $simpan = $mhs->save_alt($tabel, $data);
        return redirect()->to(site_url());
    }

    public function input_alt()
    {
        $alt = new alternatif_model();
        $dataalt = $alt->tampildata();
        $data = array('dataa' => $dataalt);

        $data['title'] = 'Alternatif';
        $data['activeMenu'] = 'alternatif';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('alternatif/input', $data);
        echo view('admin_footer');
    }

    public function formeditalt($id)
    {
        $alt = new alternatif_model();
        $datalt = $alt->get_alt($id);
        $data = array('dataa' => $datalt);

        $data['title'] = 'Alternatif';
        $data['activeMenu'] = 'alternatif';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('alternatif/edit', $data);
        echo view('admin_footer');
    }

    public function edit_alt($id)
    {
        $nama = $this->request->getPost('nama');
        $nilai1 = $this->request->getPost('nilai1');
        $nilai2 = $this->request->getPost('nilai2');
        $nilai3 = $this->request->getPost('nilai3');

        $data = [ 
            'nama_usaha'=> $nama,
            'C1' => $nilai1, 
            'C2' => $nilai2,
            'C3' => $nilai3
        ];

        $where = ['id_alternatif' => $id];

        $alt = new alternatif_model();
        $tabelMhs = "data_alternatif";
        $simpan = $alt->prosesEdit_alt($tabelMhs, $data, $where);
        return redirect()->to(site_url());
    }

    public function delete_alt($id)
    {
        $alt = new alternatif_model();
        $tabelMhs = "data_alternatif";
        $hapus = $alt->hapus_alt($id);
        return redirect()->to(site_url());
    }

    public function callviewhitung()
    {
        $mb = new alternatif_model();
        $datamb = $mb->tampilminmax();
        $data = array('dataMb'=> $datamb,);

        $data['title'] = 'Benefit or Cost';
        $data['activeMenu'] = 'cost';
        echo View('admin_header', $data);
        echo View('admin_nav');
        echo View ('alternatif/view_hitung',$data); 
        echo View('admin_footer');
    }
    
    public function callviewnormalisasi()
    {
        
        $mb = new alternatif_model();
        $datamb = $mb->tampilnormalisasi();
        $data = array('dataMb'=> $datamb);

        $data['title'] = 'Normalisasi';
        $data['activeMenu'] = 'normalisasi';
        echo View('admin_header', $data);
        echo View('admin_nav');
        echo View ('alternatif/viewnormalisasi',$data); 
        echo View('admin_footer');
    }

    public function callviewranking()
    {
        $mb = new alternatif_model();
        $datamb = $mb->tampilranking();
        $data = array('dataMb'=> $datamb);

        $data['title'] = 'Perankingan';
        $data['activeMenu'] = 'ranking';
        echo View('admin_header', $data);
        echo View('admin_nav');
        echo View ('alternatif/viewperankingan',$data); 
        echo View('admin_footer');
    }

    public function callviewkeputusan()
    {
        $mb = new alternatif_model();
        $datamb = $mb->tampilkeputusan();
        $data = array('dataMb'=> $datamb);

        $data['title'] = 'Keputusan';
        $data['activeMenu'] = 'keputusan';
        echo View('admin_header', $data);
        echo View('admin_nav');
        echo View ('alternatif/viewkeputusan',$data); 
        echo View('admin_footer');
    }
}
