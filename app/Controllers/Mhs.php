<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use Config\View;

class Mhs extends BaseController
{
    public function index()
    {
        $data['title'] = 'Mahasiswa';
        $data['activeMenu'] = 'mhs';

        $dataMhs = $this->viewdatamhs();

        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('dataMhs_view', $data);
        echo view('admin_footer');
    }

    public function viewdatamhs()
    {
        $mhs = new MahasiswaModel();
        $dataMhs = $mhs->tampildata();
        $data = array('dataq' => $dataMhs);
        return view('dataMhs_view', $data);
    }

    public function input()
    {
        $data['title'] = 'Mahasiswa';
        $data['activeMenu'] = 'mhs';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('input_mhs_ci', $data);
        echo view('admin_footer');
    }

    public function simpanmhs()
    {
        $nim = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');
        $jurusan = $this->request->getPost('jurusan');
        $alamat = $this->request->getPost('alamat');

        $data = ['nim' => $nim, 
        'nama' => $nama,
        'jurusan' => $jurusan,
        'alamat' => $alamat];

        $mhs = new MahasiswaModel();
        $tabelMhs = "tbl_mahasiswa";
        $simpan = $mhs->saveMhs($tabelMhs, $data);
        return redirect()->to(site_url('Mhs/'));
    }

    public function formeditmhs($id)
    {
        $mhs = new MahasiswaModel();
        $dataMhs = $mhs->getMhs($id);
        $data = array('dataa' => $dataMhs);
        $data['title'] = 'Mahasiswa';
        $data['activeMenu'] = 'mhs';
        echo view('admin_header', $data);
        echo view('admin_nav', $data);
        echo view('editmhs_ci', $data);
        echo view('admin_footer');
    }

    public function editmhs($id)
    {
        $nim = $this->request->getPost('nimMhs');
        $nama = $this->request->getPost('namaMhs');
        $jurusan = $this->request->getPost('jurusanMhs');
        $alamat = $this->request->getPost('alamatMhs');

        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'alamat' => $alamat
        ];
        $where = ['id_mhs' => $id];

        $mhs = new MahasiswaModel();
        $tabelMhs = "tbl_mahasiswa";
        $simpan = $mhs->prosesEditMhs($tabelMhs, $data, $where);
        return redirect()->to(site_url('Mhs/'));
    }

    public function deletemhs($id)
    {
        $mhs = new MahasiswaModel();
        $tabelMhs = "tbl_mahasiswa";
        $hapus = $mhs->hapusmhs($id);
        return redirect()->to(site_url('Mhs/'));
    }
}