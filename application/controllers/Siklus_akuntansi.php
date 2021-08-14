<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siklus_akuntansi extends CI_Controller {
    public function index(){
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siklus_akuntansi/index');
        $this->load->view('templates/footer');
    }

}