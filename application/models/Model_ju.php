<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ju extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('ju');
    }

    public function tambah_ju($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_ju($where, $table)
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


    function get_ju($keyword)
    {
        $query = $this->db->query("SELECT * FROM ju WHERE  kode_ju LIKE '%$keyword%' OR nama_ju LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_ju($nama_ju)
    {
        $query = $this->db->query("SELECT * FROM ju WHERE   nama_ju LIKE '%$nama_ju%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_ju', $id)
            ->limit(1)
            ->get('ju');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_ju');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_ju');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
