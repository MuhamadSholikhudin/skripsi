<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utang_dagang extends CI_Controller
{


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
