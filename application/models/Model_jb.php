<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jb extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('jb');
    }

    public function tambah_jb($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_jb($where, $table)
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


    function get_jb($keyword)
    {
        $query = $this->db->query("SELECT * FROM jb WHERE  kode_jb LIKE '%$keyword%' OR nama_jb LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_jb($nama_jb)
    {
        $query = $this->db->query("SELECT * FROM jb WHERE   nama_jb LIKE '%$nama_jb%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_jb', $id)
            ->limit(1)
            ->get('jb');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_jb');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_jb');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
