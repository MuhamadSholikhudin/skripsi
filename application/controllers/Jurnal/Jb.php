<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jb extends CI_Controller
{


    public function index()
    {
        $data['jb'] = $this->db->query("SELECT * FROM jb GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jb/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jb'] = $this->db->query("SELECT * FROM jb ORDER BY no_jb ASC")->result();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ORDER BY nama_utang_dagang ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jb/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $pil = $this->input->post('pil');
        $no_transaksi = strtotime(date("d-m-Y H:i:s"));
        $tanggal = $this->input->post('tanggal');
        $no_faktur = $this->input->post('no_faktur');
        if ($pil == 1) {
            $debet = $this->input->post('debet1');
            $kredit = $this->input->post('kredit1');

            $utang_dagang = $this->input->post('id_akun_utang_dagang');

            $data = array(
                array(
                    //PembeliaN
                    'id_akun'    =>  15,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //utang dagang 
                    'id_akun'    =>  8,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,                  
                    'id_utang_dagang'    =>  $utang_dagang,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jb', $data);
            redirect('jurnal/jb/index');
        } elseif ($pil == 2) {

            $debet = $this->input->post('debet2');
            $kredit = $this->input->post('kredit2');

            $akun_serba_serbi = $this->input->post('akun_serba_serbi');

            $utang_dagang = $this->input->post('id_akun_utang_dagang');

            $data = array(
                array(
                    //akun serba
                    'id_akun'    =>  $akun_serba_serbi,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //Utang Dagang
                    'id_akun'    =>  8,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  $utang_dagang,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jb', $data);
            redirect('jurnal/jb/index');
        }
    }

    public function edit($no_transaksi)
    {
        $data['jb'] = $this->db->query("SELECT * FROM jb WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ")->result();
        $data['akun'] = [5, 6];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jb/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $pil = $this->input->post('pil');
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');
        $no_faktur = $this->input->post('no_faktur');

        if ($pil == 1) {
            
            $id_jb_pembelian = $this->input->post('id_jb_pembelian');
            $id_jb_akun_pembelian = $this->input->post('id_jb_akun_pembelian');
            $debet = $this->input->post('debet1');

            $id_jb_utang = $this->input->post('id_jb_utang');
            $id_jb_akun_utang = $this->input->post('id_jb_akun_utang');
            $kredit = $this->input->post('kredit1');
            
            $id_utang_dagang = $this->input->post('id_utang_dagang');
            $data = array(
                array(
                    //pembelian
                    'id_jb' => $id_jb_pembelian,
                    'id_akun'    =>  $id_jb_akun_pembelian,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //Utang Dagang
                    'id_jb' => $id_jb_utang,
                    'id_akun'    =>  $id_jb_akun_utang,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  $id_utang_dagang,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jb', $data, 'id_jb');
            redirect('jurnal/jb/index');
        } elseif ($pil == 2) {

            $id_jb_akun = $this->input->post('id_jb_akun');
            $id_jb_akun_serba_serbi = $this->input->post('id_jb_akun_serba_serbi');
            $debet = $this->input->post('debet2');

            $id_jb_utang_dagang = $this->input->post('id_jb_utang_dagang');
            $id_jb_akun_utang_dagang = $this->input->post('id_jb_akun_utang_dagang');
            $kredit = $this->input->post('kredit2');

            // $kredit = $this->input->post('kredit2');
            // $debet = $this->input->post('debet2');
            $id__utang = $this->input->post('id__utang');

            $data = array(
                array(
                    //Akun Serba
                    'id_jb' => $id_jb_akun,
                    'id_akun'    =>  $id_jb_akun_serba_serbi,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                ),
                array(
                    //utang dagang
                    'id_jb' => $id_jb_utang_dagang,
                    'id_akun'    =>  $id_jb_akun_utang_dagang,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'no_faktur'    =>  $no_faktur,
                    'id_utang_dagang'    =>  $id__utang,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jb', $data, 'id_jb');
            redirect('jurnal/jb/index');
        }
    }
}
