<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Neraca_saldo extends CI_Controller
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
        $data['pilihan'] = ['samping'];  
        $data['akun'] = $this->db->query("SELECT * FROM akun  ORDER BY no_akun ASC")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('neraca_saldo/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['akun'] = $this->db->query("SELECT * FROM akun ORDER BY no_akun ASC")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('akun/tambah');
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $no_akun = $this->input->post('no_akun');
        $nama_akun = $this->input->post('nama_akun');

        $data = array(
            'no_akun' => $no_akun,
            'nama_akun' => $nama_akun,

        );

        $this->Model_akun->tambah_akun($data, 'akun');

        redirect('akun/');
    }

    public function edit($id_akun)
    {
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE id_akun = '$id_akun' ")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('akun/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $id_akun = $this->input->post('id_akun');

        $no_akun = $this->input->post('no_akun');
        $nama_akun = $this->input->post('nama_akun');

        $data = [
            'no_akun' => $no_akun,
            'nama_akun' => $nama_akun
        ];

        $this->db->set($data);
        $this->db->where('id_akun', $id_akun);
        $this->db->update('akun');

        redirect('akun/');
    }
}
