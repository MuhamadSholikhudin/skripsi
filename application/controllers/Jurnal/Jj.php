<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jj extends CI_Controller
{

    public function index()
    {
        $data['jj'] = $this->db->query("SELECT * FROM jj GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jj/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jj'] = $this->db->query("SELECT * FROM jj ORDER BY no_jj ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY nama_piutang_dagang ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jj/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $no_transaksi = strtotime(date("d-m-Y H:i:s"));
        $tanggal = $this->input->post('tanggal');
        $no_faktur = $this->input->post('no_faktur');
        $debet = $this->input->post('debet');
        $kredit = $this->input->post('kredit');

        $piutang_dagang = $this->input->post('id_akun_piutang_dagang');

        $data = array(
            array(
                //Penjualan
                'id_akun'    =>  12,
                'kredit' =>  $kredit,
                'debet' =>  0,
                'tanggal'    =>  $tanggal,
                'no_transaksi'    =>  $no_transaksi,
                'no_faktur'    =>  $no_faktur,
                'id_piutang_dagang'    =>  0,
                'id_syarat'    =>  0

            ),
            array(
                //Piutang dagang 
                'id_akun'    =>  3,
                'kredit' =>  0,
                'debet' =>  $debet,
                'tanggal'    =>  $tanggal,
                'no_transaksi'    =>  $no_transaksi,
                'no_faktur'    =>  $no_faktur,
                'id_piutang_dagang'    =>  $piutang_dagang,
                'id_syarat'    =>  0
            ),
        );
        $this->db->insert_batch('jj', $data);
        redirect('jurnal/jj/index');
       
          
        
    }

    public function edit($no_transaksi)
    {
        $data['jj'] = $this->db->query("SELECT * FROM jj WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ")->result();
        $data['akun'] = [5, 6];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jj/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');
        $no_faktur = $this->input->post('no_faktur');
        
        $kredit = $this->input->post('kredit');
        $jj_id_jual = $this->input->post('jj_id_jual');

        $id_piu = $this->input->post('id_piu');
        $jj_id_piutang = $this->input->post('jj_id_piutang');
        $debet = $this->input->post('debet');

        $data = array(
            array(
                //Penjualan
                'id_jj'    =>  $jj_id_jual,
                'id_akun'    =>  12,
                'kredit' =>  $kredit,
                'debet' =>  0,
                'tanggal'    =>  $tanggal,
                'no_transaksi'    =>  $no_transaksi,
                'no_faktur'    =>  $no_faktur,
                'id_piutang_dagang'    =>  0,
                'id_syarat'    =>  0

            ),
            array(
                //Piutang dagang 
                'id_jj'    =>  $jj_id_piutang,
                'id_akun'    =>  3,
                'kredit' =>  0,
                'debet' =>  $debet,
                'tanggal'    =>  $tanggal,
                'no_transaksi'    =>  $no_transaksi,
                'no_faktur'    =>  $no_faktur,
                'id_piutang_dagang'    =>  $id_piu,
                'id_syarat'    =>  0
            ),
        );
        $this->db->update_batch('jj', $data, 'id_jj');
        redirect('jurnal/jj/index');
    }
}
