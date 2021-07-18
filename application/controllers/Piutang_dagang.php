<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Piutang_dagang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('hakakses') != 1 OR $this->session->userdata('hakakses') != 2) {
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
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY no_piutang_dagang ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('piutang_dagang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY no_piutang_dagang ASC")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('piutang_dagang/tambah');
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $no_piutang_dagang = $this->input->post('no_piutang_dagang');
        $nama_piutang_dagang = $this->input->post('nama_piutang_dagang');

            $data = array(
                'no_piutang_dagang' => $no_piutang_dagang,
                'nama_piutang_dagang' => $nama_piutang_dagang,
               
            );

            $this->Model_piutang_dagang->tambah_piutang_dagang($data, 'piutang_dagang');

            redirect('piutang_dagang/');
        
    }

    public function edit($id_piutang_dagang)
    {
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang WHERE id_piutang_dagang = '$id_piutang_dagang' ")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('piutang_dagang/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $id_piutang_dagang = $this->input->post('id_piutang_dagang');

        $no_piutang_dagang = $this->input->post('no_piutang_dagang');
        $nama_piutang_dagang = $this->input->post('nama_piutang_dagang');
              
        $data = [
            'no_piutang_dagang' => $no_piutang_dagang,
            'nama_piutang_dagang' => $nama_piutang_dagang
        ];

        $this->db->set($data);
        $this->db->where('id_piutang_dagang', $id_piutang_dagang);
        $this->db->update('piutang_dagang');

        redirect('piutang_dagang/');
    }
}
