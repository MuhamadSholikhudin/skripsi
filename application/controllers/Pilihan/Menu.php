<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
    }

    public function index($bulan_pilih, $tahun_pilih)
    {
                // $data_cek = $this->db->query("SELECT YEAR(tanggal), MONTH(tanggal) FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih")->row();
        $data['data_menu'] = $this->db->query("SELECT YEAR(tanggal) as tahun, MONTH(tanggal) as bulan FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih")->row();
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih];        

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function ada($bulan_pilih, $tahun_pilih)
    {
        // $data_cek = $this->db->query("SELECT YEAR(tanggal), MONTH(tanggal) FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih")->row();
        $data['data_menu'] = $this->db->query("SELECT YEAR(tanggal) as tahun, MONTH(tanggal) as bulan FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih")->row();
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih]; 


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/dashboard', $data);
        $this->load->view('templates/footer');
    }

public function jkm($bulan_pilih, $tahun_pilih)
    {
        // $data_cek = $this->db->query("SELECT YEAR(tanggal), MONTH(tanggal) FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih")->row();
        $data['data_jkm'] = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih GROUP BY no_transaksi")->row();

$data['bulan_pilih'] = [$bulan_pilih];
$data['tahun_pilih'] = [$tahun_pilih];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/jkm/index', $data);
        $this->load->view('templates/footer');
    }

    public function pil()
    {

        $bulan_pilih = $this->post->input("bulan_pilih");
        $tahun_pilih = $this->post->input("tahun_pilih");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('form_login');
        } else {

$cek_data = $this->db->query("SELECT YEAR(tanggal), MONTH(tanggal) FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih");
$cek_benar = $cek_data->row();
            // $auth = $this->Model_auth->cek_login();
            if ($cek_data->num_rows() < 1) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data yang anda cari tidak ada
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('dashboard/login');
            } else {
                // $this->session->set_userdata('username', $auth->username);
                // $this->session->set_userdata('nama', $auth->nama);
                // $this->session->set_userdata('hakakses', $auth->hakakses);
                // $this->session->set_userdata('id_pengguna', $auth->id_pengguna);

                // switch ($auth->hakakses) {
                //     case 1:
                //         redirect('dashboard');
                //         break;
                //     case 2:
                //         redirect('dashboard');
                //         break;
                //     case 3:
                //         redirect('dashboard');
                //         break;
                //     default:
                //         break;
                // }


            }
        }
    }
    

    public function error()
    {
        // if($this->session->userdata('hakakses') == 1){
        //     redirect('akun');
        // }else{
        //     $this->load->view('error/index');
        // }
        $this->load->view('error/index');
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

    public function edit($no_akun)
    {
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun = '$no_akun' ")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('akun/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $no_akun_lama = $this->input->post('no_akun_lama');

        $no_akun = $this->input->post('no_akun');
        $nama_akun = $this->input->post('nama_akun');

        $data = [
            'no_akun' => $no_akun,
            'nama_akun' => $nama_akun
        ];

        $this->db->set($data);
        $this->db->where('no_akun', $no_akun_lama);
        $this->db->update('akun');

        redirect('akun/');
    }
}
