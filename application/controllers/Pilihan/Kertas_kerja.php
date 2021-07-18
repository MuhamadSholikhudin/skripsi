<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kertas_kerja extends CI_Controller
{
    public function index($bulan_pilih, $tahun_pilih){
        $data['akun'] = $this->db->query("SELECT * FROM akun  ORDER BY no_akun ASC")->result();
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih]; 
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kertas_kerja/index', $data);
        $this->load->view('templates/footer');
    }

}