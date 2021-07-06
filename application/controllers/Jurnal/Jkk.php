<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jkk extends CI_Controller
{


    public function index()
    {
        $data['jkk'] = $this->db->query("SELECT * FROM jkk GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jkk'] = $this->db->query("SELECT * FROM jkk ORDER BY no_jkk ASC")->result();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ORDER BY nama_utang_dagang ASC")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkk/tambah', $data);
        $this->load->view('templates/footer');
    }


    public function aksi_tambah()
    {

        $pil = $this->input->post('pil');
        $no_transaksi = strtotime(date("d-m-Y H:i:s"));
        $tanggal = $this->input->post('tanggal');
        if ($pil == 1) {
            $debet = $this->input->post('debet1');
            $kredit = $this->input->post('kredit1');

            $utang_dagang = $this->input->post('id_akun_utang_dagang');

            $data = array(
                array(
                    //utang dagang
                    'no_akun'    =>  211,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  $utang_dagang,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'no_akun'    =>  111,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jkk', $data);
            redirect('jurnal/jkk/index');
        } elseif ($pil == 2) {

            $debet = $this->input->post('debet2');
            $kredit = $this->input->post('kredit2');
            $kredit2 = $this->input->post('kredit2potpemb');
            // $akun_potongan_pembelian = $this->input->post('akun_potongan_pembelian');


            $data = array(
                array(
                    //pembelian
                    'no_akun'    =>  511,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //pot pembelian
                    'no_akun'    =>  513,
                    'kredit' =>  $kredit2,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                ),
                array(
                    //kas
                    'no_akun'    =>  111,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jkk', $data);
            redirect('jurnal/jkk/index');
        } elseif ($pil == 3) {

            $jkk_id_akun_serba = $this->input->post('jkk_id_akun_serba');
            $kredit3 = $this->input->post('kredit3');

            $debet3 = $this->input->post('debet3');


            $data = array(
                array(
                    //akun_kredit3
                    'no_akun'    =>  $jkk_id_akun_serba,
                    'kredit' =>  0,
                    'debet' =>  $debet3,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'no_akun'    =>  111,
                    'kredit' =>  $kredit3,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jkk', $data);
            redirect('jurnal/jkk/index');
        }
    }


    public function edit($no_transaksi)
    {
        $data['jkk'] = $this->db->query("SELECT * FROM jkk WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang ")->result();
        $data['akun'] = [18, 19, 20, 21];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        $pil = $this->input->post('pil');
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');

        if ($pil == 1) {

            $kredit = $this->input->post('kredit1');
            $debet = $this->input->post('debet1');

            $id_utang_dagang = $this->input->post('id_utang_dagang');

            $id_jkk_utang_dagang = $this->input->post('id_jkk_utang_dagang');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_utang_dagang = $this->input->post('id_jkk_akun_utang_dagang');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $data = array(
                array(
                    //utang dagang
                    'no_akun' => $id_jkk_utang_dagang,
                    'id_akun'    =>  $id_jkk_akun_utang_dagang,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  $id_utang_dagang,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'id_jkk' => $id_jkk_kas,
                    'no_akun'    =>  $id_jkk_akun_kas,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jkk', $data, 'id_jkk');
            redirect('jurnal/jkk/index');
        } elseif ($pil == 2) {

            $id_jkk_pembelian = $this->input->post('id_jkk_pembelian');
            $id_jkk_potongan_pembelian = $this->input->post('id_jkk_potongan_pembelian');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_pembelian = $this->input->post('id_jkk_akun_pembelian');
            $id_jkk_akun_potongan_pembelian = $this->input->post('id_jkk_akun_potongan_pembelian');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $kredit = $this->input->post('kredit2');
            $debet = $this->input->post('debet2');
            $kredit2 = $this->input->post('kredit2potpemb');

            $data = array(
                array(
                    //pembelian
                    'id_jkk' => $id_jkk_pembelian,
                    'no_akun'    =>  $id_jkk_akun_pembelian,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                ),
                array(
                    //pot pembelian
                    'id_jkk' => $id_jkk_potongan_pembelian,
                    'no_akun'    =>  $id_jkk_akun_potongan_pembelian,
                    'kredit' =>  $kredit2,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                ),
                array(
                    //kas
                    'id_jkk' => $id_jkk_kas,
                    'no_akun'    =>  $id_jkk_akun_kas,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jkk', $data, 'id_jkk');
            redirect('jurnal/jkk/index');
        } elseif ($pil == 3) {

            $id_jkk_serba = $this->input->post('id_jkk_serba');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_serba = $this->input->post('id_jkk_akun_serba');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $kredit = $this->input->post('kredit3');
            $debet = $this->input->post('debet3');

            $data = array(
                array(
                    //akun serba
                    'id_jkk' => $id_jkk_serba,
                    'no_akun'    =>  $id_jkk_akun_serba,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //kas
                    'id_jkk' => $id_jkk_kas,
                    'no_akun'    =>  $id_jkk_akun_kas,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jkk', $data, 'id_jkk');
            redirect('jurnal/jkk/index');
        }
    }
}
