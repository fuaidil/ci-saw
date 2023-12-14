<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tbl_mahasiswa';
    function __construct()
    {
        parent::__construct();
        $this->db = db_connect(); 
    }

    function saveMhs($tabel, $data)
    {
        $this->db->table($tabel)->insert($data);
        return true;
    }

    function tampildata()
    {
        $dataquery = $this->db->query("SELECT * FROM tbl_mahasiswa");
        return $dataquery->getResult();
    }

    function getMhs($id)
    {
        $dataquery = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE id_mhs=".$id);
        return $dataquery->getResult();
    }

    function prosesEditMhs($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);
        return true;
    }

    function hapusmhs($id)
    {
        $dataquery = $this->db->query("DELETE FROM tbl_mahasiswa WHERE id_mhs=".$id);
        return true;
    }
}
