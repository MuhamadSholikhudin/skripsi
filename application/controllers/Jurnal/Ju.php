<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ju extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hakakses') == " ") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            // $this->session->sess_destroy();
            redirect('dashboard/error');
        }

        $this->load->helper('tgl_indo');
    }

    public function index()
    {
        $data['ju'] = $this->db->query("SELECT * FROM jurnal_umum GROUP BY no_transaksi ORDER BY no_transaksi ASC")->result();
        $data['pilihan'] = ['samping'];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('ju/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jurnal_umum'] = $this->db->query("SELECT * FROM jurnal_umum ORDER BY no_jurnal_umum ASC")->result();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang WHERE id_utang_dagang != 0 ORDER BY nama_utang_dagang ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang WHERE id_piutang_dagang != 0 ORDER BY nama_piutang_dagang ASC")->result();
        $data['pilihan'] = ['samping'];
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

        // $no_faktur = $this->input->post('no_faktur');
        if ($pil == 1) {
            $debet10 = $this->input->post('debet1');
            $debet = str_replace(".", "", $debet10);
            $kredit10 = $this->input->post('kredit1');
            $kredit = str_replace(".", "", $kredit10);

            $utang_dagang = $this->input->post('id_akun_piutang_dagang2');

            $data = array(
                array(
                    //Utang Dagang
                    'no_akun'    =>  211,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  $utang_dagang
                   

                ),
                array(
                    //Retur Pembelian
                    'no_akun'    =>  512,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0
                    
                )
            );
            $this->db->insert_batch('jurnal_umum', $data);
            redirect('jurnal/ju/index');
        } elseif ($pil == 2) {

            $debet10 = $this->input->post('debet2');
            $debet = str_replace(".", "", $debet10);
            $kredit10 = $this->input->post('kredit2');
            $kredit = str_replace(".", "", $kredit10);

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
                    'id_pengguna'    =>  $id_pengguna,
                    'id_piutang_dagang'    =>  $piutang_dagang,
                    'id_utang_dagang'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_umum', $data);
            redirect('jurnal/ju/index');
        }
    }

    public function edit($no_transaksi)
    {
        $data['ju'] = $this->db->query("SELECT * FROM jurnal_umum WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ORDER BY nama_utang_dagang ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY nama_piutang_dagang ASC")->result();
        $data['akun'] = [5, 6];
        $data['pilihan'] = ['samping'];
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


        if ($pil == 1) {

            $id_ju_utang = $this->input->post('id_ju_utang');
            $id_ju_akun_utang1 = $this->input->post('id_ju_akun_utang1');
            $debet10 = $this->input->post('debet1');
            $debet = str_replace(".", "", $debet10);

            $id_ju_retur_pembelian = $this->input->post('id_ju_retur_pembelian');
            $no_akun_returpembelian = $this->input->post('no_akun_returpembelian');
            $kredit10 = $this->input->post('kredit1');
            $kredit = str_replace(".", "", $kredit10);

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
                    'no_akun'    =>  $no_akun_returpembelian,
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
            redirect('jurnal/ju/index');
        } elseif ($pil == 2) {

            $id_ju_retur_penjualan = $this->input->post('id_ju_retur_penjualan');
            $id_akun_retur_penjualan = $this->input->post('id_akun_retur_penjualan');
            $debet10 = $this->input->post('debet2');
            $debet = str_replace(".", "", $debet10);

            $id_ju_piutang_dagang = $this->input->post('id_ju_piutang_dagang');
            $id_ju_akun_piutang_dagang = $this->input->post('id_ju_akun_piutang_dagang');
            $kredit10 = $this->input->post('kredit2');
            $kredit = str_replace(".", "", $kredit10);
            
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
                    'id_ju' => $id_ju_piutang_dagang,
                    'no_akun'    =>  $id_ju_akun_piutang_dagang,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_piutang_dagang'    =>  $id_akun_piutang_dagang2,
                    'id_utang_dagang'    =>  0
                )
            );
            $this->db->update_batch('jurnal_umum', $data, 'id_ju');
            redirect('jurnal/ju/index');
        }
    }

    public function hapus($no_transaksi)
    {
        $this->db->delete('jurnal_umum', array('no_transaksi' => $no_transaksi));
        redirect('jurnal/ju/index');
    }
}
