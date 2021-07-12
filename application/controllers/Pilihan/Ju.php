<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ju extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
    }


    public function index($bulan_pilih, $tahun_pilih)
    {
        $data['ju'] = $this->db->query("SELECT * FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih GROUP BY no_transaksi ORDER BY no_transaksi ASC")->result();
        
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih]; 
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('ju/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($bulan_pilih, $tahun_pilih)
    {
        // $data['jurnal_umum'] = $this->db->query("SELECT * FROM jurnal_umum ORDER BY no_jurnal_umum ASC")->result();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ORDER BY nama_utang_dagang ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY nama_piutang_dagang ASC")->result();
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('ju/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $pil = $this->input->post('pil');
        $no_transaksi = strtotime(date("d-m-Y H:i:s"));
        $tanggal = $this->input->post('tanggal');
        $id_pengguna = $this->input->post('id_pengguna');

        $bulan_pilih = $this->input->post('bulan_pilih');
        $tahun_pilih = $this->input->post('tahun_pilih');
        
        // $no_faktur = $this->input->post('no_faktur');
        if ($pil == 1) {
            $debet = $this->input->post('debet1');
            $kredit = $this->input->post('kredit1');

            $utang_dagang = $this->input->post('id_akun_piutang_dagang2');

            $data = array(
                array(
                    //Utang Dagang
                    'no_akun'    =>  211,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_utang_dagang'    =>  $utang_dagang
                ),
                array(
                    //Retur Pembelian
                    'no_akun'    =>  512,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_utang_dagang'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_umum', $data);
            redirect('pilihan/ju/index/' . $bulan_pilih . '/' . $tahun_pilih);

        } elseif ($pil == 2) {

            $debet = $this->input->post('debet2');
            $kredit = $this->input->post('kredit2');

            $piutang_dagang = $this->input->post('id_akun_piutang_dagang');

            $data = array(
                array(
                    //Retur Pemjurnal_umumalan
                    'no_akun'    =>  412,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_utang_dagang'    =>  0

                ),
                array(
                    //PiUtang Dagang
                    'no_akun'    =>  113,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  $piutang_dagang,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_utang_dagang'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_umum', $data);
            redirect('pilihan/ju/index/' . $bulan_pilih . '/' . $tahun_pilih);
        }
    }

    public function edit($no_transaksi)
    {
        $data['ju'] = $this->db->query("SELECT * FROM jurnal_umum WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ORDER BY nama_utang_dagang ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY nama_piutang_dagang ASC")->result();
        $data['pilihan'] = ['menu'];
        $data['akun'] = [5, 6];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('ju/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $pil = $this->input->post('pil');
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');
        $id_pengguna = $this->input->post('id_pengguna');

        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_umum WHERE no_transaksi = '$no_transaksi'  ")->row();
        $data['pilihan'] = ['menu'];

        if ($pil == 1) {

            $id_ju_utang = $this->input->post('id_ju_utang');
            $id_ju_akun_utang1 = $this->input->post('id_ju_akun_utang1');
            $debet = $this->input->post('debet1');

            $id_ju_retur_pembelian = $this->input->post('id_ju_retur_pembelian');
            $id_akun_returpembelian = $this->input->post('id_akun_returpembelian');
            $kredit = $this->input->post('kredit1');

            $id_utang_dagang = $this->input->post('id_utang_dagang');
            $data = array(
                array(
                    //pembelian
                    'id_ju' => $id_ju_utang,
                    'no_akun'    =>  $id_ju_akun_utang1,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_utang_dagang'    =>  $id_utang_dagang,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_piutang_dagang'    =>  0

                ),
                array(
                    //Retur pembelian
                    'id_ju' => $id_ju_retur_pembelian,
                    'no_akun'    =>  $id_akun_returpembelian,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_piutang_dagang'    =>  0
                )
            );
            $this->db->update_batch('jurnal_umum', $data, 'id_ju');
            redirect('pilihan/ju/index/' . $cek_data->bulan . '/' . $cek_data->tahun);

        } elseif ($pil == 2) {

            $id_ju_retur_penjualan = $this->input->post('id_ju_retur_penjualan');
            $id_akun_retur_penjualan = $this->input->post('id_akun_retur_penjualan');
            $debet = $this->input->post('debet2');

            $id_ju_piutang_dagang = $this->input->post('id_ju_piutang_dagang');
            $id_ju_akun_piutang_dagang = $this->input->post('id_ju_akun_piutang_dagang');
            $kredit = $this->input->post('kredit2');

            $id_akun_piutang_dagang2 = $this->input->post('id_akun_piutang_dagang2');

            $data = array(
                array(
                    //Retur Penjurnal_umumalan
                    'id_ju' => $id_ju_retur_penjualan,
                    'no_akun'    =>  $id_akun_retur_penjualan,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_utang_dagang'    =>  0
                    
                ),
                array(
                    //piutang dagang
                    'id_jurnal_umum' => $id_ju_piutang_dagang,
                    'no_akun'    =>  $id_ju_akun_piutang_dagang,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  $id_akun_piutang_dagang2,
                    'id_utang_dagang'    =>  0
                )
            );
            $this->db->update_batch('jurnal_umum', $data, 'id_ju');
            redirect('pilihan/ju/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
        }
    }

    public function hapus($no_transaksi, $bulan_pilih)
    {
        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_umum WHERE no_transaksi = '$no_transaksi'  AND MONTH(tanggal) = $bulan_pilih")->row();
        $this->db->delete('jurnal_umum', array('no_transaksi' => $no_transaksi));

        // redirect('pilihan/jkm/index');
        redirect('pilihan/ju/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
    }
}
