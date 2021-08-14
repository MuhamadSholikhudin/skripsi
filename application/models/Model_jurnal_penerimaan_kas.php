<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_jurnal_penerimaan_kas extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('jurnal_penerimaan_kas');
    }

    public function tambah_jurnal_penerimaan_kas($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_jurnal_penerimaan_kas($where, $table)
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


    function get_jurnal_penerimaan_kas($keyword)
    {
        $query = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE  kode_jurnal_penerimaan_kas LIKE '%$keyword%' OR nama_jurnal_penerimaan_kas LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_jurnal_penerimaan_kas($nama_jurnal_penerimaan_kas)
    {
        $query = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE   nama_jurnal_penerimaan_kas LIKE '%$nama_jurnal_penerimaan_kas%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_jurnal_penerimaan_kas', $id)
            ->limit(1)
            ->get('jurnal_penerimaan_kas');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_jurnal_penerimaan_kas');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_jurnal_penerimaan_kas');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
