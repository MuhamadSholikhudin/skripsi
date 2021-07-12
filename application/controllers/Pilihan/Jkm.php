<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jkm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
    }


    public function index($bulan_pilih, $tahun_pilih)
    {
        $data['jkm'] = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE MONTH(tanggal) = $bulan_pilih AND YEAR(tanggal) = $tahun_pilih GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        //  $data['jkm'] = $this->db->query("SELECT * FROM jurnal_pemasukan_kas GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        
        $data['pilihan'] = ['menu'];  
        $data['bulan_pilih'] = [ $bulan_pilih ];  
        $data['tahun_pilih'] = [ $tahun_pilih ];  

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkm/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($bulan_pilih, $tahun_pilih)
    {
        // $data['jurnal_pemasukan_kas'] = $this->db->query("SELECT * FROM jurnal_pemasukan_kas ORDER BY no_jurnal_pemasukan_kas ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY nama_piutang_dagang ASC")->result();
        $data['pilihan'] = ['menu'];
        $data['bulan_pilih'] = [$bulan_pilih];
        $data['tahun_pilih'] = [$tahun_pilih];

        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun = 512  OR no_akun = 311")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkm/tambah' ,$data);
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
        
        if($pil == 1){
            $kredit = $this->input->post('kredit1');
            $debet = $this->input->post('debet1');
           

            $data = array(
            array(
                    //penjualan
                    'no_akun'	=>  411, 
                    'kredit' =>  $kredit, 
                    'debet' =>  0, 
                    'tanggal'	=>  $tanggal,
                    'no_transaksi'	=>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'	=>  0
            ),
            array(
                    //Kas
                    'no_akun'	=>  111,
                    'kredit' =>  0, 
                    'debet'=>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
            )
        );
            $this->db->insert_batch('jurnal_pemasukan_kas', $data); 
            redirect('pilihan/jkm/index/'. $bulan_pilih. '/'. $tahun_pilih);

        }elseif($pil == 2){

            $kredit = $this->input->post('kredit2');
            $debet = $this->input->post('debet2');
            $debet2 = $this->input->post('debet2potpenj');
            $piutang = $this->input->post('id_akun_piutang_dagang');


            $data = array(
                array(
                    //piutang dagang
                    'no_akun'    =>  113,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  $piutang,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0

                ),
                array(
                    //pot penjualan
                    'no_akun'    =>  413,
                    'kredit' =>  0,
                    'debet' =>  $debet2,
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
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pemasukan_kas', $data);
            redirect('pilihan/jkm/index/' . $bulan_pilih . '/' . $tahun_pilih);
        }elseif($pil == 3){

            $akun_kredit3 = $this->input->post('akun_kredit3');
            $kredit3 = $this->input->post('kredit3');

            $debet3 = $this->input->post('debet3');


            $data = array(
                array(
                    //akun_kredit3
                    'no_akun'    =>  $akun_kredit3,
                    'kredit' =>  $kredit3,
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
                    'kredit' =>  0,
                    'debet' =>  $debet3,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jurnal_pemasukan_kas', $data);
            redirect('pilihan/jkm/index/' . $bulan_pilih . '/' . $tahun_pilih);
        }

    }

    public function edit($no_transaksi, $bulan_pilih)
    {
        $data['jkm'] = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_transaksi = '$no_transaksi' AND MONTH(tanggal) = '$bulan_pilih' ")->row();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ")->result();
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun = 512  OR no_akun = 311")->result();
       

        $data['pilihan'] = ['menu'];


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkm/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        
        $pil = $this->input->post('pil');
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');
        $id_pengguna = $this->input->post('id_pengguna');


        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_pemasukan_kas WHERE no_transaksi = '$no_transaksi'  ")->row();
        // $bulan = $this->input->post('bulan');
        // $tahun = $this->input->post('tahun');
        $data['pilihan'] = ['menu'];

        if ($pil == 1) {
            $kredit = $this->input->post('kredit1');
            $debet = $this->input->post('debet1');

            $akun_penjualan = $this->input->post('akun_penjualan');
            $akun_kas = $this->input->post('akun_kas');

            $data = array(
                array(
                    //penjualan
                    'id_jkm' => $akun_penjualan,
                    'no_akun'    =>  411,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'id_jkm' => $akun_kas,
                    'no_akun'    =>  111,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            
            $this->db->update_batch('jurnal_pemasukan_kas', $data, 'id_jkm');
            redirect('pilihan/jkm/index/'. $cek_data->bulan. '/'. $cek_data->tahun);

        } elseif ($pil == 2) {

            $kredit = $this->input->post('kredit2');
            $debet = $this->input->post('debet2');
            $debet2 = $this->input->post('debet2potpenj');
            $piutang2 = $this->input->post('id_akun_piutang_dagang2');

            $akun_piutang = $this->input->post('akun_piutang');
            $akun_pot_pen = $this->input->post('akun_pot_pen');
            $akun_kas1 = $this->input->post('akun_kas1');

            $data = array(
                array(
                    //piutang dagang
                    'id_jkm' => $akun_piutang,
                    'no_akun'    =>  113,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  $piutang2,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0

                ),
                array(
                    //pot penjualan
                    'id_jkm' => $akun_pot_pen,
                    'no_akun'    =>  413,
                    'kredit' =>  0,
                    'debet' =>  $debet2,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                ),
                array(
                    //kas
                    'id_jkm' => $akun_kas1,
                    'no_akun'    =>  111,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            
            $this->db->update_batch('jurnal_pemasukan_kas', $data, 'id_jkm');
            redirect('pilihan/jkm/index/' . $cek_data->bulan . '/' . $cek_data->tahun);

        } elseif ($pil == 3) {

            $kredit = $this->input->post('kredit3');
            $debet = $this->input->post('debet3');
        
            $akun_serba = $this->input->post('akun_serba');
            $akun_id = $this->input->post('id_akun');
            $debet2 = $this->input->post('debet2potpenj');
            $akun_kas3 = $this->input->post('akun_kas3');

            $data = array(
                array(
                    //akun serba
                    'id_jkm' => $akun_serba,
                    'no_akun'    =>  $akun_id,
                    'kredit' =>  $kredit,
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
                    'id_jkm' => $akun_kas3,
                    'no_akun'    =>  111,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_pengguna'    => $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jurnal_pemasukan_kas', $data);
            $this->db->update_batch('jurnal_pemasukan_kas', $data, 'id_jurnal_pemasukan_kas');
            redirect('pilihan/jkm/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
        }

    }

    public function hapus($no_transaksi, $bulan_pilih){
        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_pemasukan_kas WHERE no_transaksi = '$no_transaksi'  AND MONTH(tanggal) = $bulan_pilih")->row();
        $this->db->delete('jurnal_pemasukan_kas', array('no_transaksi' => $no_transaksi));

        // redirect('pilihan/jkm/index');
        redirect('pilihan/jkm/index/' . $cek_data->bulan . '/' . $cek_data->tahun);
    }
}
