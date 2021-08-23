<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jj extends CI_Controller
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

        $data['jj'] = $this->db->query("SELECT * FROM jurnal_penjualan GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jj/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['pilihan'] = ['samping'];

        // $data['jurnal_penjualan'] = $this->db->query("SELECT * FROM jurnal_penjualan ORDER BY no_jurnal_penjualan ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang WHERE id_piutang_dagang != 0 ORDER BY nama_piutang_dagang ASC")->result();
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
        $id_pengguna = $this->input->post('id_pengguna');

        $piutang_dagang = $this->input->post('id_akun_piutang_dagang');

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
                'id_syarat'    =>  0
            ),
        );
        $this->db->insert_batch('jurnal_penjualan', $data);
        redirect('jurnal/jj/index');
       
          
        
    }

    public function edit($no_transaksi)
    {
        $data['pilihan'] = ['samping'];

        $data['jj'] = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_transaksi = '$no_transaksi' ")->row();
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
        $id_pengguna = $this->input->post('id_pengguna');
        
        $kredit = $this->input->post('kredit');
        $jj_id_jual = $this->input->post('jj_id_jual');

        $id_piu = $this->input->post('id_piu');
        $jj_id_piutang = $this->input->post('jj_id_piutang');
        $debet = $this->input->post('debet');

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
                    'id_pengguna'    =>  $id_pengguna,
                'id_piutang_dagang'    =>  0,
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
                    'id_pengguna'    =>  $id_pengguna,
                'id_piutang_dagang'    =>  $id_piu,
                'id_syarat'    =>  0
            ),
        );
        $this->db->update_batch('jurnal_penjualan', $data, 'id_jj');
        redirect('jurnal/jj/index');
    }
    public function hapus($no_transaksi)
    {
        $this->db->delete('jurnal_penjualan', array('no_transaksi' => $no_transaksi));
        redirect('jurnal/jj/index');
    }
}
