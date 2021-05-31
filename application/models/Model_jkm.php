<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jkm extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('jkm');
    }

    public function tambah_jkm($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_jkm($where, $table)
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


    function get_jkm($keyword)
    {
        $query = $this->db->query("SELECT * FROM jkm WHERE  kode_jkm LIKE '%$keyword%' OR nama_jkm LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_jkm($nama_jkm)
    {
        $query = $this->db->query("SELECT * FROM jkm WHERE   nama_jkm LIKE '%$nama_jkm%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_jkm', $id)
            ->limit(1)
            ->get('jkm');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_jkm');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_jkm');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
