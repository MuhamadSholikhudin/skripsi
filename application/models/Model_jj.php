<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jj extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('jj');
    }

    public function tambah_jj($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_jj($where, $table)
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


    function get_jj($keyword)
    {
        $query = $this->db->query("SELECT * FROM jj WHERE  kode_jj LIKE '%$keyword%' OR nama_jj LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_jj($nama_jj)
    {
        $query = $this->db->query("SELECT * FROM jj WHERE   nama_jj LIKE '%$nama_jj%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_jj', $id)
            ->limit(1)
            ->get('jj');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_jj');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_jj');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
