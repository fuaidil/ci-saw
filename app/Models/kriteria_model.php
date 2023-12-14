<?php

namespace App\Models;

use CodeIgniter\Model;

class kriteria_model extends Model
{
    protected $table = 'kriteria';
    function __construct()
    {
        parent::__construct();
        $this->db = db_connect(); 
    }

    function getAll()
    {
        return $this->countAll();
    }

    public function getKriteriaByKode($kode_kriteria)
    {
        return $this->where('kode_kriteria', $kode_kriteria)->findAll();
    }

    function save_kriteria($tabel, $data)
    {
        $this->db->table($tabel)->insert($data);
        return true;
    }

    function tampildata()
    {
        $dataquery = $this->db->query("SELECT * FROM kriteria");
        return $dataquery->getResult();
    }

    function get_kriteria(String $id)
    {
        $dataquery = $this->db->query("SELECT * FROM kriteria WHERE kode_kriteria='$id'");
        return $dataquery->getResult();
    }

    function prosesEdit_kriteria($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);
        return true;
    }

    function hapus_kriteria(String $id)
    {
        $dataquery = $this->db->query("DELETE FROM kriteria WHERE kode_kriteria='$id'");
        return true;
    }
    
}
