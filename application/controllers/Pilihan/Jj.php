<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jj extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
    }
    public function index($bulan_pilih, $tahun_pilih)
    {
        $data['jj'] = $this->db->query("SELECT * FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih];  

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jj/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($bulan_pilih, $tahun_pilih)
    {
        // $data['jurnal_penjualan'] = $this->db->query("SELECT * FROM jurnal_penjualan ORDER BY no_jurnal_penjualan ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang WHERE id_piutang_dagang != 0 ORDER BY nama_piutang_dagang ASC")->result();
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih];

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
        $debet10 = $this->input->post('debet');
        $debet = str_replace(".", "", $debet10);
        $kredit10 = $this->input->post('kredit');
        $kredit = str_replace(".", "", $kredit10);
        $id_pengguna = $this->input->post('id_pengguna');

        $piutang_dagang = $this->input->post('id_akun_piutang_dagang');

        $bulan_pilih = $this->input->post('bulan_pilih');
        $tahun_pilih = $this->input->post('tahun_pilih');
        
        $data = array(
            array(
                //Penjualan
                'no_akun'    =>  411,
                'kredit' =>  $kredit,
                'debet' =>  0,
                'tanggal'    =>  $tanggal,
                'no_transaksi'    =>  $no_transaksi,
                'no_faktur'    =>  $no_faktur,
                'id_piutang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                'id_syarat'    =>  0

            ),
            array(
                //Piutang dagang 
                'no_akun'    =>  113,
                'kredit' =>  0,
                'debet' =>  $debet,
                'tanggal'    =>  $tanggal,
                'no_transaksi'    =>  $no_transaksi,
                'no_faktur'    =>  $no_faktur,
                'id_piutang_dagang'    =>  $piutang_dagang,
                    'id_pengguna'    =>  $id_pengguna,
                'id_syarat'    =>  0
            ),
        );
        $this->db->insert_batch('jurnal_penjualan', $data);
        redirect('pilihan/jj/index/' . $bulan_pilih . '/' . $tahun_pilih);
       
          
        
    }

    public function edit($no_transaksi, $bulan_pilih)
    {
        $data['jj'] = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_transaksi = '$no_transaksi' AND MONTH(tanggal) = '$bulan_pilih'")->row();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ")->result();
        $data['pilihan'] = ['menu'];
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
        $id_pengguna = $this->input->post('id_pengguna');

        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_penjualan WHERE no_transaksi = '$no_transaksi'  ")->row();


        $kredit10 = $this->input->post('kredit');
        $kredit = str_replace(".", "", $kredit10);
        $jj_id_jual = $this->input->post('jj_id_jual');

        $id_piu = $this->input->post('id_piu');
        $jj_id_piutang = $this->input->post('jj_id_piutang');
        $debet10 = $this->input->post('debet');
        $debet = str_replace(".", "", $debet10);

        $data = array(
            array(
                //Penjualan
                'id_jj'    =>  $jj_id_jual,
                'no_akun'    =>  411,
                'kredit' =>  $kredit,
                'debet' =>  0,
                'tanggal'    =>  $tanggal,
                'no_transaksi'    =>  $no_transaksi,
                'no_faktur'    =>  $no_faktur,
                'id_piutang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                'id_syarat'    =>  0

            ),
            array(
                //Piutang dagang 
                'id_jj'    =>  $jj_id_piutang,
                'no_akun'    =>  113,
                'kredit' =>  0,
                'debet' =>  $debet,
                'tanggal'    =>  $tanggal,
                'no_transaksi'    =>  $no_transaksi,
                'no_faktur'    =>  $no_faktur,
                'id_piutang_dagang'    =>  $id_piu,
                    'id_pengguna'    =>  $id_pengguna,
                'id_syarat'    =>  0
            ),
        );
        $this->db->update_batch('jurnal_penjualan', $data, 'id_jj');
        redirect('pilihan/jj/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
    }

    public function hapus($no_transaksi, $bulan_pilih)
    {
        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_penjualan WHERE no_transaksi = '$no_transaksi'  AND MONTH(tanggal) = $bulan_pilih")->row();
        $this->db->delete('jurnal_penjualan', array('no_transaksi' => $no_transaksi));

        // redirect('pilihan/jkm/index');
        redirect('pilihan/jj/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
    }
}
