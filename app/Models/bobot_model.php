<?php

namespace App\Models;

use CodeIgniter\Model;

class bobot_model extends Model
{
    protected $table = 'bobot';
    function __construct()
    {
        parent::__construct();
        $this->db = db_connect(); 
    }

    function getAll()
    {
        return $this->countAll();
    }

    function save_bobot($tabel, $data)
    {
        $this->db->table($tabel)->insert($data);
        return true;
    }

    function tampildata()
    {
        $dataquery = $this->db->query("SELECT * FROM bobot");
        return $dataquery->getResult();
    }

    function get_bobot(String $id)
    {
        $dataquery = $this->db->query("SELECT * FROM bobot WHERE nama_bobot='$id'");
        return $dataquery->getResult();
    }

    function prosesEdit_bobot($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);
        return true;
    }

    function hapus_bobot(String $id)
    {
        $dataquery = $this->db->query("DELETE FROM bobot WHERE nama_bobot='$id'");
        return true;
    }

    public function getLastId()
    {
        $query = $this->orderBy('kode_kriteria', 'DESC')->first();
        if ($query) {
            return 'C'. (intval(substr($query['kode_kriteria'], 1)) + 1);
        } else {
            return 'C1';
        }
    }
}
