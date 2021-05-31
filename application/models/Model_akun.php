<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_akun extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('akun');
    }

    public function tambah_akun($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_akun($where, $table)
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


    function get_akun($keyword)
    {
        $query = $this->db->query("SELECT * FROM akun WHERE  kode_akun LIKE '%$keyword%' OR nama_akun LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_akun($nama_akun)
    {
        $query = $this->db->query("SELECT * FROM akun WHERE   nama_akun LIKE '%$nama_akun%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_akun', $id)
            ->limit(1)
            ->get('akun');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_akun');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_akun');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
