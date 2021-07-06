<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_keuangan extends CI_Controller
{
    public function index()
    {
        $data['akun'] = $this->db->query("SELECT * FROM akun  ORDER BY no_akun ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan_keuangan/index', $data);
        $this->load->view('templates/footer');
    }
}
