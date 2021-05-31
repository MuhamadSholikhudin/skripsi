<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_piutang_dagang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('piutang_dagang');
    }

    public function tambah_piutang_dagang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_piutang_dagang($where, $table)
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


    function get_piutang_dagang($keyword)
    {
        $query = $this->db->query("SELECT * FROM piutang_dagang WHERE  kode_piutang_dagang LIKE '%$keyword%' OR nama_piutang_dagang LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_piutang_dagang($nama_piutang_dagang)
    {
        $query = $this->db->query("SELECT * FROM piutang_dagang WHERE   nama_piutang_dagang LIKE '%$nama_piutang_dagang%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_piutang_dagang', $id)
            ->limit(1)
            ->get('piutang_dagang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_piutang_dagang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_piutang_dagang');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
