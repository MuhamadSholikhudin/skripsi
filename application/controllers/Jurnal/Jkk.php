<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jkk extends CI_Controller
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
        $data['jkk'] = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jurnal_pengeluaran_kas'] = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas ORDER BY no_jurnal_pengeluaran_kas ASC")->result();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang WHERE id_utang_dagang != 0 ORDER BY nama_utang_dagang ASC")->result();
        $data['pilihan'] = ['samping'];
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '6%' OR no_akun = 115 OR no_akun =121 OR no_akun = 312 OR no_akun = 412")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkk/tambah', $data);
        $this->load->view('templates/footer');
    }


    public function aksi_tambah()
    {

        $pil = $this->input->post('pil');
        $no_transaksi = strtotime(date("d-m-Y H:i:s"));
        $tanggal = $this->input->post('tanggal');
        $id_pengguna = $this->input->post('id_pengguna');

        if ($pil == 1) {
            $debet = $this->input->post('debet1');
            $kredit = $this->input->post('kredit1');

            $utang_dagang = $this->input->post('id_akun_utang_dagang');

            $data = array(
                array(
                    //utang dagang
                    'no_akun'    =>  211,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  $utang_dagang,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'no_akun'    =>  111,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pengeluaran_kas', $data);
            redirect('jurnal/jkk/index');
        } elseif ($pil == 2) {

            $debet = $this->input->post('debet2');
            $kredit = $this->input->post('kredit2');
            $kredit2 = $this->input->post('kredit2potpemb');
            // $akun_potongan_pembelian = $this->input->post('akun_potongan_pembelian');

            $data = array(
                array(
                    //pembelian
                    'no_akun'    =>  511,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                ),
                array(
                    //pot pembelian
                    'no_akun'    =>  513,
                    'kredit' =>  $kredit2,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                ),
                array(
                    //kas
                    'no_akun'    =>  111,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pengeluaran_kas', $data);
            redirect('jurnal/jkk/index');
        } elseif ($pil == 3) {

            $jkk_id_akun_serba = $this->input->post('jkk_id_akun_serba');
            $kredit3 = $this->input->post('kredit3');

            $debet3 = $this->input->post('debet3');


            $data = array(
                array(
                    //akun_kredit3
                    'no_akun'    =>  $jkk_id_akun_serba,
                    'kredit' =>  0,
                    'debet' =>  $debet3,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'no_akun'    =>  111,
                    'kredit' =>  $kredit3,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pengeluaran_kas', $data);
            redirect('jurnal/jkk/index');
        }
    }


    public function edit($no_transaksi)
    {
        $data['jkk'] = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ")->result();
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '6%' OR no_akun = 115 OR no_akun =121 OR no_akun = 312 OR no_akun = 412")->result();
        
        $data['pilihan'] = ['samping'];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $pil = $this->input->post('pil');
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');

        $id_pengguna = $this->input->post('id_pengguna');


        if ($pil == 1) {

            $kredit = $this->input->post('kredit1');
            $debet = $this->input->post('debet1');

            $id_utang_dagang = $this->input->post('id_utang_dagang');

            $id_jkk_utang_dagang = $this->input->post('id_jkk_utang_dagang');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_utang_dagang = $this->input->post('id_jkk_akun_utang_dagang');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $data = array(
                array(
                    //utang dagang
                    'no_akun' => $id_jkk_utang_dagang,
                    'id_akun'    =>  $id_jkk_akun_utang_dagang,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  $id_utang_dagang,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'id_jurnal_pengeluaran_kas' => $id_jkk_kas,
                    'no_akun'    =>  $id_jkk_akun_kas,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jurnal_pengeluaran_kas', $data, 'id_jurnal_pengeluaran_kas');
            redirect('jurnal/jkk/index');
        } elseif ($pil == 2) {

            $id_jkk_pembelian = $this->input->post('id_jkk_pembelian');
            $id_jkk_potongan_pembelian = $this->input->post('id_jkk_potongan_pembelian');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_pembelian = $this->input->post('id_jkk_akun_pembelian');
            $id_jkk_akun_potongan_pembelian = $this->input->post('id_jkk_akun_potongan_pembelian');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $kredit = $this->input->post('kredit2');
            $debet = $this->input->post('debet2');
            $kredit2 = $this->input->post('kredit2potpemb');

            $data = array(
                array(
                    //pembelian
                    'id_jkk' => $id_jkk_pembelian,
                    'no_akun'    =>  $id_jkk_akun_pembelian,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                ),
                array(
                    //pot pembelian
                    'id_jkk' => $id_jkk_potongan_pembelian,
                    'no_akun'    =>  $id_jkk_akun_potongan_pembelian,
                    'kredit' =>  $kredit2,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                ),
                array(
                    //kas
                    'id_jkk' => $id_jkk_kas,
                    'no_akun'    =>  $id_jkk_akun_kas,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jurnal_pengeluaran_kas', $data, 'id_jkk');
            redirect('jurnal/jkk/index');
        } elseif ($pil == 3) {

            $id_jkk_serba = $this->input->post('id_jkk_serba');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_serba = $this->input->post('id_jkk_akun_serba');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $kredit = $this->input->post('kredit3');
            $debet = $this->input->post('debet3');

            $data = array(
                array(
                    //akun serba
                    'id_jkk' => $id_jkk_serba,
                    'no_akun'    =>  $id_jkk_akun_serba,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //kas
                    'id_jkk' => $id_jkk_kas,
                    'no_akun'    =>  $id_jkk_akun_kas,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jurnal_pengeluaran_kas', $data, 'id_jkk');
            redirect('jurnal/jkk/index');
        }
    }

    public function hapus($no_transaksi)
    {
        $this->db->delete('jurnal_pengeluaran_kas', array('no_transaksi' => $no_transaksi));
        redirect('jurnal/jkk/index');
    }
}
