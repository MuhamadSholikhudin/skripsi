<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('hakakses') != 1 or $this->session->userdata('hakakses') != 2) {
        //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //             Anda Belum Login
        //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //             </button>
        //             </div>');
        //     // $this->session->sess_destroy();
        //     redirect('dashboard/error');
        // }
        $this->load->helper('tgl_indo');
    }
    public function index()
    {
        $data['akun'] = $this->db->query("SELECT * FROM akun  ORDER BY no_akun ASC")->result();
        $data['pilihan'] = ['samping'];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan_keuangan/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        $data['akun'] = $this->db->query("SELECT * FROM akun  ORDER BY no_akun ASC")->result();
        $data['pilihan'] = ['samping'];

    
        $this->load->view('laporan_keuangan/cetak', $data);
       
    }

}
