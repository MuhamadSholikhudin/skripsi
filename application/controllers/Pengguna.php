<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hakakses') != 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('dashboard/error');
        }
    }

    public function index()
    {
        $data['pengguna'] = $this->db->query("SELECT * FROM pengguna ORDER BY id_pengguna ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['pengguna'] = $this->db->query("SELECT * FROM pengguna ORDER BY id_pengguna ASC")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/tambah');
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $id_pengguna = $this->input->post('id_pengguna');
        $nama = $this->input->post('nama');

            $data = array(
                'id_pengguna' => $id_pengguna,
                'nama' => $nama,
               
            );

            $this->Model_pengguna->tambah_pengguna($data, 'pengguna');

            redirect('pengguna/');
        
    }

    public function edit($id_pengguna)
    {
        $data['pengguna'] = $this->db->query("SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna' ")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $id_pengguna_lama = $this->input->post('id_pengguna_lama');

        $id_pengguna = $this->input->post('id_pengguna');
        $nama = $this->input->post('nama');
              
        $data = [
            'id_pengguna' => $id_pengguna,
            'nama' => $nama
        ];

        $this->db->set($data);
        $this->db->where('id_pengguna', $id_pengguna_lama);
        $this->db->update('pengguna');

        redirect('pengguna/');
    }
}
