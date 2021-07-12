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
        $data['hakakses'] = [1, 2, 3];
        $data['status'] = ['Aktif', 'Tidak Aktif'];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        // $id_pengguna = $this->input->post('id_pengguna');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hakakses = $this->input->post('hakakses');
        $status = $this->input->post('status');

            $data = array(
            
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'hakakses' => $hakakses,
            'status' => $status
            );

            $this->Model_pengguna->tambah_pengguna($data, 'pengguna');

            redirect('pengguna/');
        
    }

    public function edit($id_pengguna)
    {
        $data['pengguna'] = $this->db->query("SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna' ")->row();
$data['hakakses'] = [1, 2, 3];
        $data['status'] = ['Aktif', 'Tidak Aktif'];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        // $id_pengguna_lama = $this->input->post('id_pengguna_lama');

        $id_pengguna = $this->input->post('id_pengguna');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hakakses = $this->input->post('hakakses');
        $status = $this->input->post('status');
              
        $data = [
            // 'id_pengguna' => $id_pengguna,
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'hakakses' => $hakakses,
            'status' => $status
        ];

        $this->db->set($data);
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('pengguna');

        redirect('pengguna');
    }


    public function hapus($id_pengguna)
    {
        // $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_pemasukan_kas WHERE no_transaksi = '$no_transaksi'  AND MONTH(tanggal) = $bulan_pilih")->row();
        $this->db->delete('pengguna', array('id_pengguna' => $id_pengguna));

        // redirect('pilihan/jkm/index');
        redirect('pengguna');
    }
}
