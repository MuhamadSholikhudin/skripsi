<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Besar_pembantu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
    }


    public function index()
    {
        $data['akun'] = $this->db->query("SELECT * FROM akun ORDER BY no_akun ASC")->result();
        $data['piutang'] = $this->db->query("SELECT * FROM piutang_dagang WHERE id_piutang_dagang <> 0 ORDER BY id_piutang_dagang ASC")->result();
        $data['utang'] = $this->db->query("SELECT * FROM utang_dagang WHERE id_utang_dagang <> 0 ORDER BY id_utang_dagang ASC")->result();
        $data['pilihan'] = ['samping'];  
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('buku_besar_pembantu/index', $data);
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
