<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jb extends CI_Controller
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
$data['pilihan'] = ['samping'];
        $data['jb'] = $this->db->query("SELECT * FROM jurnal_pembelian  GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jb/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jurnal_pembelian'] = $this->db->query("SELECT * FROM jurnal_pembelian ORDER BY no_jurnal_pembelian ASC")->result();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang WHERE id_utang_dagang != 0 ORDER BY nama_utang_dagang ASC")->result();
     $data['pilihan'] = ['samping'];
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun = 115 OR no_akun = 121")->result();

$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jb/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $pil = $this->input->post('pil');
        $no_transaksi = strtotime(date("d-m-Y H:i:s"));
        $tanggal = $this->input->post('tanggal');
        $no_faktur = $this->input->post('no_faktur');
        $id_pengguna = $this->input->post('id_pengguna');


        if ($pil == 1) {
            $debet = $this->input->post('debet1');
            $kredit = $this->input->post('kredit1');

            $utang_dagang = $this->input->post('id_akun_utang_dagang');

            $data = array(
                array(
                    //PembeliaN
                    'no_akun'    =>  511,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0

                ),
                array(
                    //utang dagang 
                    'no_akun'    =>  211,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,                  
                    'id_utang_dagang'    =>  $utang_dagang,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pembelian', $data);
            redirect('jurnal/jb/index');
        } elseif ($pil == 2) {

            $debet = $this->input->post('debet2');
            $kredit = $this->input->post('kredit2');

            $akun_serba_serbi = $this->input->post('akun_serba_serbi');

            $utang_dagang = $this->input->post('id_akun_utang_dagang');

            $data = array(
                array(
                    //akun serba
                    'no_akun'    =>  $akun_serba_serbi,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0

                ),
                array(
                    //Utang Dagang
                    'no_akun'    =>  211,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  $utang_dagang,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pembelian', $data);
            redirect('jurnal/jb/index');
        }
    }

    public function edit($no_transaksi)
    {
        $data['jb'] = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang WHERE id_utang_dagang != 0 ")->result();
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun = 115 OR no_akun = 121")->result();

$data['pilihan'] = ['samping'];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jb/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $pil = $this->input->post('pil');
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');
        $no_faktur = $this->input->post('no_faktur');
        $id_pengguna = $this->input->post('id_pengguna');


        if ($pil == 1) {

            $id_jb_pembelian = $this->input->post('id_jb_pembelian');
            $id_jb_akun_pembelian = $this->input->post('id_jb_akun_pembelian');
            $debet = $this->input->post('debet1');

            $id_jb_utang = $this->input->post('id_jb_utang');
            $id_jb_akun_utang = $this->input->post('id_jb_akun_utang');
            $kredit = $this->input->post('kredit1');
            
            $id_utang_dagang = $this->input->post('id_utang_dagang');
            $data = array(
                array(
                    //pembelian
                    'id_jb' => $id_jb_pembelian,
                    'no_akun'    =>  $id_jb_akun_pembelian,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  0,

                    'id_syarat'    =>  0

                ),
                array(
                    //Utang Dagang
                    'id_jb' => $id_jb_utang,
                    'no_akun'    =>  $id_jb_akun_utang,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  $id_utang_dagang,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jurnal_pembelian', $data, 'id_jb');
            redirect('jurnal/jb/index');
        } elseif ($pil == 2) {

            $id_jb_akun = $this->input->post('id_jb_akun');
            $id_jb_akun_serba_serbi = $this->input->post('id_jb_akun_serba_serbi');
            $debet = $this->input->post('debet2');

            $id_jb_utang_dagang = $this->input->post('id_jb_utang_dagang');
            $id_jb_akun_utang_dagang = $this->input->post('id_jb_akun_utang_dagang');
            $kredit = $this->input->post('kredit2');

            // $kredit = $this->input->post('kredit2');
            // $debet = $this->input->post('debet2');
            $id__utang = $this->input->post('id__utang');

            $data = array(
                array(
                    //Akun Serba
                    'id_jb' => $id_jb_akun,
                    'no_akun'    =>  $id_jb_akun_serba_serbi,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                ),
                array(
                    //utang dagang
                    'id_jb' => $id_jb_utang_dagang,
                    'no_akun'    =>  $id_jb_akun_utang_dagang,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  $id__utang,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jurnal_pembelian', $data, 'id_jb');
            redirect('jurnal/jb/index');
        }
    }
}
