<?php

namespace App\Models;

use CodeIgniter\Model;

class alternatif_model extends Model
{
    protected $table = 'data_alternatif';
    function __construct()
    {
        parent::__construct();
        $this->db = db_connect(); 
    }

    function getAll()
    {
        return $this->countAll();
    }

    function save_alt($tabel, $data)
    {
        $this->db->table($tabel)->insert($data);
        return true;
    }

    function tampildata()
    {
        $dataquery = $this->db->query("SELECT * FROM data_alternatif");
        return $dataquery->getResult();
    }

    function get_alt(String $id)
    {
        $dataquery = $this->db->query("SELECT * FROM data_alternatif WHERE id_alternatif='$id'");
        return $dataquery->getResult();
    }

    function prosesEdit_alt($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);
        return true;
    }

    function hapus_alt(String $id)
    {
        $dataquery = $this->db->query("DELETE FROM data_alternatif WHERE id_alternatif='$id'");
        return true;
    }

    function tampilkeputusan()
    {
        $dataquery1=$this->db->query("select min(C1) as maxminK1, max(C2) as maxminK2, max(C3) as maxminK3, max(C4) as maxminK4, max(C5) as maxminK5, max(C6) as maxminK6, max(C7) as maxminK7, min(C8) as maxminK8 from data_alternatif");
        $rdataquery1=$dataquery1->getResult();


        $dataquery2=$this->db->query("select * from data_alternatif");
        $rdataquery2=$dataquery2->getResult();

        $ranking = $this->db->query("select * from data_alternatif order by nama_barang");
        $rank = $ranking->getResult();

        //proses ambil bobot 
        $dataquery3=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C1'");
        $rdataquery3=$dataquery3->getResult();
        $dataquery4=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C2'");
        $rdataquery4=$dataquery4->getResult();
        $dataquery5=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C3'");
        $rdataquery5=$dataquery5->getResult();
        $dataquery6=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C4'");
        $rdataquery6=$dataquery6->getResult();
        $dataquery7=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C5'");
        $rdataquery7=$dataquery7->getResult();
        $dataquery8=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C6'");
        $rdataquery8=$dataquery8->getResult();
        $dataquery9=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C7'");
        $rdataquery9=$dataquery9->getResult();
        $dataquery10=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C8'");
        $rdataquery10=$dataquery10->getResult();
        
        return array('maxmin' => $rdataquery1, 'all' => $rdataquery2,'B1' => $rdataquery3,'B2' => $rdataquery4,'B3' => $rdataquery5,'B4' => $rdataquery6, 'B5' => $rdataquery7, 'B6' => $rdataquery8, 'B7' => $rdataquery9, 'B8' => $rdataquery10, 'rank' => $rank);
    }

    function tampilminmax()
    {
       /* $caribenquery=$this->db->query("select kode_kriteria from kriteria where tipe_kriteria ='Benefit'");
        $querybenefit=$caribenquery->getResult();
        if ($querybenefit=!0)
        {
          $dataquery1=$this->db->query("select max(C1) as K1, max(C2) as K2, max(C3) as K3 from data_alternatif");
           return $rdataquery1=$dataquery1->getResult();
        }
     
        else
        {
            $dataquery1=$this->db->query("select min(C1) as K1, min(C2) as K2, min(C3) as K3 from data_alternatif");
            return $rdataquery1=$dataquery1->getResult();
        }*/

        $dataquery1=$this->db->query("select min(C1) as maxminK1, max(C2) as maxminK2, max(C3) as maxminK3, max(C4) as maxminK4, max(C5) as maxminK5, max(C6) as maxminK6, max(C7) as maxminK7, min(C8) as maxminK8 from data_alternatif");
        return $rdataquery1=$dataquery1->getResult();
       

    }

    function tampilnormalisasi()
    {
        $dataquery1=$this->db->query("select min(C1) as maxminK1, max(C2) as maxminK2, max(C3) as maxminK3, max(C4) as maxminK4, max(C5) as maxminK5, max(C6) as maxminK6, max(C7) as maxminK7, min(C8) as maxminK8 from data_alternatif");
        $rdataquery1=$dataquery1->getResult();

        $dataquery2=$this->db->query("select * from data_alternatif");
        $rdataquery2=$dataquery2->getResult();

        return array('maxmin' => $rdataquery1, 'all' => $rdataquery2);
    }

    function tampilranking()
    {
        $dataquery1=$this->db->query("select min(C1) as maxminK1, max(C2) as maxminK2, max(C3) as maxminK3, max(C4) as maxminK4, max(C5) as maxminK5, max(C6) as maxminK6, max(C7) as maxminK7, min(C8) as maxminK8 from data_alternatif");
        $rdataquery1=$dataquery1->getResult();

        $dataquery2=$this->db->query("select * from data_alternatif");
        $rdataquery2=$dataquery2->getResult();

        //proses ambil bobot 
        $dataquery3=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C1'");
        $rdataquery3=$dataquery3->getResult();
        $dataquery4=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C2'");
        $rdataquery4=$dataquery4->getResult();
        $dataquery5=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C3'");
        $rdataquery5=$dataquery5->getResult();
        $dataquery6=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C4'");
        $rdataquery6=$dataquery6->getResult();
        $dataquery7=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C5'");
        $rdataquery7=$dataquery7->getResult();
        $dataquery8=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C6'");
        $rdataquery8=$dataquery8->getResult();
        $dataquery9=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C7'");
        $rdataquery9=$dataquery9->getResult();
        $dataquery10=$this->db->query("select nilai_kriteria from kriteria where kode_kriteria='C8'");
        $rdataquery10=$dataquery10->getResult();
        
        return array('maxmin' => $rdataquery1, 'all' => $rdataquery2,'B1' => $rdataquery3,'B2' => $rdataquery4,'B3' => $rdataquery5,'B4' => $rdataquery6, 'B5' => $rdataquery7, 'B6' => $rdataquery8, 'B7' => $rdataquery9, 'B8' => $rdataquery10);
    }
}
