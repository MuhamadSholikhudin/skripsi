<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengguna extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('pengguna');
    }

    public function tampil_pengguna()
    {
        $tahun = date('Y');
        return $this->db->get_where('pengguna', array('tahun' => $tahun));
    }

    public function tambah_pengguna($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_pengguna($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
