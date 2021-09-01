<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jkk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
    }

    public function index($bulan_pilih, $tahun_pilih)
    {
        $data['jkk'] = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih GROUP BY no_transaksi ORDER BY tanggal ASC")->result();

        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($bulan_pilih, $tahun_pilih)
    {
        // $data['jurnal_pengeluaran_kas'] = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas ORDER BY no_jurnal_pengeluaran_kas ASC")->result();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang WHERE id_utang_dagang != 0 ORDER BY nama_utang_dagang ASC")->result();
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '6%' OR no_akun = 115 OR no_akun =121 OR no_akun = 312 OR no_akun = 412")->result();
        
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih];

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

        $id_pengguna = $this->input->post('id_pengguna');

        $bulan_pilih = $this->input->post('bulan_pilih');
        $tahun_pilih = $this->input->post('tahun_pilih');

        if ($pil == 1) {
            $debet10 = $this->input->post('debet1');
            $debet = str_replace(".", "", $debet10);

            $kredit10 = $this->input->post('kredit1');
            $kredit = str_replace(".", "", $kredit10);

            $utang_dagang = $this->input->post('id_akun_utang_dagang');
            $kredit2 = $this->input->post('kredit2potpemb');
            $syarat = $this->input->post('syarat2');

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
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  $syarat

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
                    'id_pengguna'    =>  $id_pengguna,
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
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pengeluaran_kas', $data);
            redirect('pilihan/jkk/index/' . $bulan_pilih . '/' . $tahun_pilih);
        } elseif ($pil == 2) {

            $debet10 = $this->input->post('debet2');
            $debet = str_replace(".", "", $debet10);

            $kredit10 = $this->input->post('kredit2');
            $kredit = str_replace(".", "", $kredit10);

            $kredit11 = $this->input->post('kredit2potpemb');
            $kredit2 = str_replace(".", "", $kredit11);
            // $akun_potongan_pembelian = $this->input->post('akun_potongan_pembelian');
            $syarat = $this->input->post('syarat2');

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
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  $syarat
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
                    'id_pengguna'    =>  $id_pengguna,
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
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pengeluaran_kas', $data);
            redirect('pilihan/jkk/index/' . $bulan_pilih . '/' . $tahun_pilih);

        } elseif ($pil == 3) {
            $jkk_id_akun_serba = $this->input->post('jkk_id_akun_serba');

            $kredit10 = $this->input->post('kredit3');
            $kredit3 = str_replace(".", "", $kredit10);

            $debet10 = $this->input->post('debet3');
            $debet3 = str_replace(".", "", $debet10);


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
                    'id_pengguna'    =>  $id_pengguna,
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
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pengeluaran_kas', $data);
            redirect('pilihan/jkk/index/' . $bulan_pilih . '/' . $tahun_pilih);
        }
    }


    public function edit($no_transaksi)
    {
        $data['jkk'] = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['utang_dagang'] = $this->db->query("SELECT * FROM utang_dagang WHERE id_utang_dagang != 0 ORDER BY nama_utang_dagang ASC")->result();
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '6%' OR no_akun = 115 OR no_akun =121 OR no_akun = 312 OR no_akun = 412")->result();
        
        $data['pilihan'] = ['menu'];

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
        $id_pengguna = $this->input->post('id_pengguna');

        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_pengeluaran_kas WHERE no_transaksi = '$no_transaksi'  ")->row();
        // $bulan = $this->input->post('bulan');
        // $tahun = $this->input->post('tahun');
        $data['pilihan'] = ['menu'];
        if ($pil == 1) {

            $kredit10 = $this->input->post('kredit1');
            $kredit = str_replace(".", "", $kredit10);

            $debet10 = $this->input->post('debet1');
            $debet = str_replace(".", "", $debet10);

            $id_utang_dagang = $this->input->post('id_utang_dagang');

            $id_jkk_utang_dagang = $this->input->post('id_jkk_utang_dagang');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_utang_dagang = $this->input->post('id_jkk_akun_utang_dagang');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $data = array(
                array(
                    //utang dagang
                    'id_jkk'    =>  $id_jkk_utang_dagang,
                    'no_akun' => $id_jkk_akun_utang_dagang,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  $id_utang_dagang,
                    'id_pengguna'    => $id_pengguna,
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
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jurnal_pengeluaran_kas', $data, 'id_jkk');
            redirect('pilihan/jkk/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
            
        } elseif ($pil == 2) {

            $id_jkk_pembelian = $this->input->post('id_jkk_pembelian');
            $id_jkk_potongan_pembelian = $this->input->post('id_jkk_potongan_pembelian');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_pembelian = $this->input->post('id_jkk_akun_pembelian');
            $id_jkk_akun_potongan_pembelian = $this->input->post('id_jkk_akun_potongan_pembelian');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $kredit10 = $this->input->post('kredit2');
            $kredit = str_replace(".", "", $kredit10);

            $debet10 = $this->input->post('debet2');
            $debet = str_replace(".", "", $debet10);

            $kredit22 = $this->input->post('kredit2potpemb');
            $kredit2 = str_replace(".", "", $kredit22);

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
                    'id_pengguna'    => $id_pengguna,
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
                    'id_pengguna'    => $id_pengguna,
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
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jurnal_pengeluaran_kas', $data, 'id_jkk');
            redirect('pilihan/jkk/index/' . $cek_data->bulan . '/' . $cek_data->tahun);


        } elseif ($pil == 3) {

            $id_jkk_serba = $this->input->post('id_jkk_serba');
            $id_jkk_kas = $this->input->post('id_jkk_kas');

            $id_jkk_akun_serba = $this->input->post('id_jkk_akun_serba');
            $id_jkk_akun_kas = $this->input->post('id_jkk_akun_kas');

            $kredit10 = $this->input->post('kredit3');
            $kredit = str_replace(".", "", $kredit10);
            $debet10 = $this->input->post('debet3');
            $debet = str_replace(".", "", $debet10);

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
                    'id_pengguna'    => $id_pengguna,
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
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jurnal_pengeluaran_kas', $data, 'id_jkk');
            redirect('pilihan/jkk/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
        }
    }

    public function hapus($no_transaksi, $bulan_pilih)
    {
        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_pengeluaran_kas WHERE no_transaksi = '$no_transaksi'  AND MONTH(tanggal) = $bulan_pilih")->row();
        $this->db->delete('jurnal_pengeluaran_kas', array('no_transaksi' => $no_transaksi));

        // redirect('pilihan/jkm/index');
        redirect('pilihan/jkk/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
    }
}
