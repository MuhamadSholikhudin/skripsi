<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jurnal_umum extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('jurnal_umum');
    }

    public function tambah_jurnal_umum($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_jurnal_umum($where, $table)
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


    function get_jurnal_umum($keyword)
    {
        $query = $this->db->query("SELECT * FROM jurnal_umum WHERE  kode_jurnal_umum LIKE '%$keyword%' OR nama_jurnal_umum LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_jurnal_umum($nama_jurnal_umum)
    {
        $query = $this->db->query("SELECT * FROM jurnal_umum WHERE   nama_jurnal_umum LIKE '%$nama_jurnal_umum%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_jurnal_umum', $id)
            ->limit(1)
            ->get('jurnal_umum');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_jurnal_umum');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_jurnal_umum');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
