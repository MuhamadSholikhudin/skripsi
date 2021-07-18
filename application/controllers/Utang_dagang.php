<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utang_dagang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hakakses') != 1 or $this->session->userdata('hakakses') != 2 or $this->session->userdata('hakakses') != 3) {
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
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ORDER BY no_utang_dagang ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('utang_dagang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ORDER BY no_utang_dagang ASC")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('utang_dagang/tambah');
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $no_utang_dagang = $this->input->post('no_utang_dagang');
        $nama_utang_dagang = $this->input->post('nama_utang_dagang');

            $data = array(
                'no_utang_dagang' => $no_utang_dagang,
                'nama_utang_dagang' => $nama_utang_dagang,
               
            );

            $this->Model_utang_dagang->tambah_utang_dagang($data, 'utang_dagang');

            redirect('utang_dagang/');
        
    }

    public function edit($id_utang_dagang)
    {
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang WHERE id_utang_dagang = '$id_utang_dagang' ")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('utang_dagang/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $id_utang_dagang = $this->input->post('id_utang_dagang');

        $no_utang_dagang = $this->input->post('no_utang_dagang');
        $nama_utang_dagang = $this->input->post('nama_utang_dagang');
              
        $data = [
            'no_utang_dagang' => $no_utang_dagang,
            'nama_utang_dagang' => $nama_utang_dagang
        ];

        $this->db->set($data);
        $this->db->where('id_utang_dagang', $id_utang_dagang);
        $this->db->update('utang_dagang');

        redirect('utang_dagang/');
    }
}
