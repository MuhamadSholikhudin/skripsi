<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jps extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
    }


    public function index($bulan_pilih, $tahun_pilih)
    {
        $data['jps'] = $this->db->query("SELECT * FROM jurnal_penyesuaian GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $data['pilihan'] = ['menu'];  
        $data['bulan_pilih'] = [ $bulan_pilih ];  
        $data['tahun_pilih'] = [ $tahun_pilih ];  
     

$this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jps/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($bulan_pilih, $tahun_pilih)
    {
        // $data['jurnal_penyesuaian'] = $this->db->query("SELECT * FROM jurnal_penyesuaian ORDER BY no_jurnal_penyesuaian ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY nama_piutang_dagang ASC")->result();

$data['pilihan'] = ['menu'];  
        $data['bulan_pilih'] = [ $bulan_pilih ];  
        $data['tahun_pilih'] = [ $tahun_pilih ];  


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jps/tambah' ,$data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {

        $pil = $this->input->post('pil');
        $no_transaksi = strtotime(date("d-m-Y H:i:s"));
        $tanggal = $this->input->post('tanggal');
       $id_pengguna = $this->input->post('id_pengguna');


 if($pil == 1){
            $kredit = $this->input->post('kredit1');
            $debet = $this->input->post('debet1');
           

            $data = array(
            array(
                    //penjualan
                    'no_akun'	=>  514, 
                    'kredit' =>  0, 
                    'debet' =>  $debet, 
                    'tanggal'	=>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                        'no_transaksi'	=>  $no_transaksi
            ),
            array(
                    //Kas
                    'no_akun'	=>  114,
                    'kredit' =>  $kredit, 
                    'debet'=>  0,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
            )
        );
            $this->db->insert_batch('jurnal_penyesuaian', $data); 
            redirect('jps/index');

        }elseif($pil == 2){

            $kredit = $this->input->post('kredit2');
            $debet = $this->input->post('debet2');

            $data = array(
                array(
                    //penjualan
                    'no_akun'    =>  114,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,

                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  514,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                )
            );

            $this->db->insert_batch('jurnal_penyesuaian', $data);
            redirect('jps/index');
        }elseif($pil == 3){
            $kredit = $this->input->post('kredit3');
            $debet = $this->input->post('debet3');
            $data = array(
                array(
                    //penjualan
                    'no_akun'    =>  614,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  222,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                )
            );
            $this->db->insert_batch('jurnal_penyesuaian', $data);
            redirect('jps/index');
        } elseif ($pil == 4) {
            $kredit = $this->input->post('kredit4');
            $debet = $this->input->post('debet4');

            $data = array(
                array(
                    //penjualan
                    'no_akun'    =>  612,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  115,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                )
            );
            $this->db->insert_batch('jurnal_penyesuaian', $data);
            redirect('jps/index');
        } elseif ($pil == 5) {
            $kredit = $this->input->post('kredit5');
            $debet = $this->input->post('debet5');

            $data = array(
                array(
                    //penjualan
                    'no_akun'    =>  622,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  122,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                )
            );
            $this->db->insert_batch('jurnal_penyesuaian', $data);
            redirect('jps/index');
        } elseif ($pil == 6) {
            $kredit = $this->input->post('kredit6');
            $debet = $this->input->post('debet6');

            $data = array(
                array(
                    //penjualan
                    'no_akun'    =>  623,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  112,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                )
            );
            $this->db->insert_batch('jurnal_penyesuaian', $data);
            redirect('jps/index');
        } elseif ($pil == 7) {
            $kredit = $this->input->post('kredit7');
            $debet = $this->input->post('debet7');

            $data = array(
                array(
                    //penjualan
                    'no_akun'    =>  116,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  611,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'id_pengguna'	=>  $id_pengguna,
                    'no_transaksi'    =>  $no_transaksi
                )
            );
            $this->db->insert_batch('jurnal_penyesuaian', $data);
            redirect('jps/index');
        }

    }

    public function edit($no_transaksi, $bulan_pilih)
    {
        $data['jps'] = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ")->result();
$data['akun'] = [10, 9];

$data['pilihan'] = ['menu'];  
        $data['bulan_pilih'] = [ $bulan_pilih ];  
        // $data['tahun_pilih'] = [ $tahun_pilih ];  


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jps/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit()
    {
        
        $pil = $this->input->post('pil');
        $no_transaksi = $this->input->post('no_transaksi');
        $tanggal = $this->input->post('tanggal');
        $id_pengguna = $this->input->post('id_pengguna');

        $id_jps1 = $this->input->post('id_jps1');
        $no_akun1 = $this->input->post('no_akun1');
        $debet1 = $this->input->post('debet1');

        $id_jps2 = $this->input->post('id_jps2');
        $no_akun2 = $this->input->post('no_akun2');
        $kredit2 = $this->input->post('kredit2');

        $cek_data = $this->db->query("SELECT MONTH(tanggal) as bulan, YEAR(tanggal) as tahun FROM jurnal_penyesuaian WHERE no_transaksi = '$no_transaksi'  ")->row();

        $data = array(
            array(
                //penjualan
                'id_jps' => $id_jps1,
                'no_akun'    =>  $no_akun1,
                'kredit' =>  0,
                'debet' =>  $debet1,
                'tanggal'    =>  $tanggal,
                'id_pengguna'    =>  $id_pengguna,
                'no_transaksi'    =>  $no_transaksi
            ),
            array(
                //Kas
                'id_jps' => $id_jps2,
                'no_akun'    =>  $no_akun2,
                'kredit' =>  $kredit2,
                'debet' =>  0,
                'tanggal'    =>  $tanggal,
                'id_pengguna'    =>  $id_pengguna,
                'no_transaksi'    =>  $no_transaksi
            )
        );
        // $this->db->update_batch('jurnal_penyesuaian', $data);
        $this->db->update_batch('jurnal_penyesuaian', $data, 'id_jps');
        redirect('pilihan/jps/index/' . $cek_data->bulan . '/' . $cek_data->tahun);

    }

    public function hapus($no_transaksi){
        $this->db->delete('jurnal_penyesuaian', array('no_transaksi' => $no_transaksi));
        redirect('pilihan/jps/index');

    }
}
