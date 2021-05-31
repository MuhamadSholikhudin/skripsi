<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_utang_dagang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('utang_dagang');
    }

    public function tambah_utang_dagang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_utang_dagang($where, $table)
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


    function get_utang_dagang($keyword)
    {
        $query = $this->db->query("SELECT * FROM utang_dagang WHERE  kode_utang_dagang LIKE '%$keyword%' OR nama_utang_dagang LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_utang_dagang($nama_utang_dagang)
    {
        $query = $this->db->query("SELECT * FROM utang_dagang WHERE   nama_utang_dagang LIKE '%$nama_utang_dagang%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_utang_dagang', $id)
            ->limit(1)
            ->get('utang_dagang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_utang_dagang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_utang_dagang');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
