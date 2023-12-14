<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisUsaha_Model extends Model
{
    protected $table = 'jenis_usaha';
    function __construct()
    {
        parent::__construct();
        $this->db = db_connect(); 
    }

    function getAll()
    {
        return $this->countAll();
    }

    function saveju($tabel, $data)
    {
        $this->db->table($tabel)->insert($data);
        return true;
    }

    function tampildata()
    {
        $dataquery = $this->db->query("SELECT * FROM jenis_usaha");
        return $dataquery->getResult();
    }

    function getju($id)
    {
        $dataquery = $this->db->query("SELECT * FROM jenis_usaha WHERE kode_jenis_usaha='$id'");
        return $dataquery->getResult();
    }

    function prosesEditju($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);
        return true;
    }

    function hapusju($id)
    {
        $dataquery = $this->db->query("DELETE FROM jenis_usaha WHERE kode_jenis_usaha='$id'");
        return true;
    }

    public function getLastId()
    {
        $query = $this->orderBy('kode_jenis_usaha', 'DESC')->first();
        if ($query) {
            // return 'JU0' . intval(substr($query['kode_jenis_usaha'], 2)) + 1;
            return 'JU'. sprintf("%03d", (intval(substr($query['kode_jenis_usaha'], 2)) + 1));;
        } else {
            return 'JU001';
        }
    }
}
