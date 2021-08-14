<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
public function index(){
        $this->form_validation->set_rules('bulan_pilih', 'bulan_pilih', 'required', ['required' => 'bulan wajib di Isi !']);
        $this->form_validation->set_rules('tahun_pilih', 'tahun_pilih', 'required', ['required' => 'tahun wajib di Isi !']);


    $data['bulan'] = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10 , 11, 12];
        $data['tahun'] = $this->db->query(" SELECT YEAR(tanggal) as tahun FROM jurnal_penerimaan_kas GROUP BY YEAR(tanggal) ")->result();

       

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/dashboard', $data);
            $this->load->view('templates/footer');
        } else {
            $bulan_pilih = $this->input->post("bulan_pilih");
            $tahun_pilih = $this->input->post("tahun_pilih");
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

                redirect('dashboard');
            } else {
                redirect('pilihan/menu/ada/' . $bulan_pilih . '/'. $tahun_pilih);

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
        // $data['akun'] = $this->db->query("SELECT * FROM akun ORDER BY no_akun ASC")->result();
        $this->load->view('errors/index');
    }



}
