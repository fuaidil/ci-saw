<?php

namespace App\Models;
use App\Models\JenisUsaha_Model;
use CodeIgniter\Model;

class umkm_model extends Model
{
    protected $table = 'umkm';
    function __construct()
    {
        parent::__construct();
        $this->db = db_connect(); 
    }

    function getAll()
    {
        return $this->countAll();
    }

    function save_umkm($tabel, $data)
    {
        $this->db->table($tabel)->insert($data);
        return true;
    }

    function tampildata()
    {
        $dataquery = $this->db->query("SELECT * FROM umkm");
        return $dataquery->getResult();
    }

    function get_umkm($id)
    {
        $dataquery = $this->db->query("SELECT * FROM umkm WHERE kode_umkm='$id'");
        return $dataquery->getResult();
    }

    function join()
    {
        $ju = new JenisUsaha_Model();
        $query = $this->db->query("SELECT * FROM umkm JOIN jenis_usaha ON jenis_usaha.kode_jenis_usaha = umkm.jenis_usaha");
        return $query->getResult();
    }

    function prosesEdit_umkm($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);
        return true;
    }

    function hapus_umkm($id)
    {
        $dataquery = $this->db->query("DELETE FROM umkm WHERE kode_umkm='$id'");
        return true;
    }

    public function getLastId()
    {
        $query = $this->orderBy('kode_umkm', 'DESC')->first();
        if ($query) {
            return 'UM'. sprintf("%03d", (intval(substr($query['kode_umkm'], 2)) + 1));;
        } else {
            return 'UM001';
        }
    }
}
