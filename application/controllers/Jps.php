<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jps extends CI_Controller
{
    public function __construct()
    {
        
        parent::__construct();
        // if ($this->session->userdata('hakakses') != 1 OR $this->session->userdata('hakakses') != 2) {
        //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //             Anda Belum Login
        //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //             </button>
        //             </div>');
        //     // $this->session->sess_destroy();
        //     redirect('dashboard/error');
        // }
        $this->load->helper('tgl_indo');
    }

    public function index()
    {
        $data['jps'] = $this->db->query("SELECT * FROM jurnal_penyesuaian GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $data['pilihan'] = ['samping'];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jps/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jurnal_penyesuaian'] = $this->db->query("SELECT * FROM jurnal_penyesuaian ORDER BY no_jurnal_penyesuaian ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY nama_piutang_dagang ASC")->result();
        $data['pilihan'] = ['samping'];
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
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'	=>  $tanggal,
                        'no_transaksi'	=>  $no_transaksi
            ),
            array(
                    //Kas
                    'no_akun'	=>  114,
                    'kredit' =>  $kredit, 
                    'debet'=>  0,
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
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
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  514,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
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
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  222,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
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
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  115,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
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
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  122,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
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
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  112,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
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
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi
                ),
                array(
                    //Kas
                    'no_akun'    =>  611,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'id_pengguna'	=>  $id_pengguna,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi
                )
            );
            $this->db->insert_batch('jurnal_penyesuaian', $data);
            redirect('jps/index');
        }

    }

    public function edit($no_transaksi)
    {
        $data['jps'] = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ")->result();
$data['akun'] = [10, 9];
        $data['pilihan'] = ['samping'];
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

        $data = array(
            array(
                //penjualan
                'id_jps' => $id_jps1,
                'no_akun'    =>  $no_akun1,
                'kredit' =>  0,
                'debet' =>  $debet1,
                'tanggal'    =>  $tanggal,
                'id_pengguna'	=>  $id_pengguna,
                'no_transaksi'    =>  $no_transaksi
            ),
            array(
                //Kas
                'id_jps' => $id_jps2,
                'no_akun'    =>  $no_akun2,
                'kredit' =>  $kredit2,
                'debet' =>  0,
                'tanggal'    =>  $tanggal,
                'id_pengguna'	=>  $id_pengguna,
                'no_transaksi'    =>  $no_transaksi
            )
        );
        // $this->db->update_batch('jurnal_penyesuaian', $data);
        $this->db->update_batch('jurnal_penyesuaian', $data, 'id_jps');
        redirect('jps/index');


//         if ($pil == 1) {
//             $kredit = $this->input->post('kredit1');
//             $debet = $this->input->post('debet1');

//             $akun_penjualan = $this->input->post('akun_penjualan');
//             $akun_kas = $this->input->post('akun_kas');

//  $data = array(
//                 array(
//                     //penjualan
//                     'id_jps' => $akun_penjualan,
//                     'no_akun'    =>  411,
//                     'kredit' =>  $kredit,
//                     'debet' =>  0,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  0,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0

//                 ),
//                 array(
//                     //Kas
//                     'id_jps' => $akun_kas,
//                     'no_akun'    =>  111,
//                     'kredit' =>  0,
//                     'debet' =>  $debet,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  0,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0
//                 )
//             );
//             // $this->db->update_batch('jurnal_penyesuaian', $data);
//             $this->db->update_batch('jurnal_penyesuaian', $data, 'id_jps');
//             redirect('jurnal/jps/index');


//             $data = array(
//                 array(
//                     //penjualan
//                     'id_jps' => $akun_penjualan,
//                     'no_akun'    =>  411,
//                     'kredit' =>  $kredit,
//                     'debet' =>  0,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  0,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0

//                 ),
//                 array(
//                     //Kas
//                     'id_jps' => $akun_kas,
//                     'no_akun'    =>  111,
//                     'kredit' =>  0,
//                     'debet' =>  $debet,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  0,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0
//                 )
//             );
//             // $this->db->update_batch('jurnal_penyesuaian', $data);
//             $this->db->update_batch('jurnal_penyesuaian', $data, 'id_jps');
//             redirect('jurnal/jps/index');

//         } elseif ($pil == 2) {

//             $kredit = $this->input->post('kredit2');
//             $debet = $this->input->post('debet2');
//             $debet2 = $this->input->post('debet2potpenj');
//             $piutang2 = $this->input->post('id_akun_piutang_dagang2');

//             $akun_piutang = $this->input->post('akun_piutang');
//             $akun_pot_pen = $this->input->post('akun_pot_pen');
//             $akun_kas1 = $this->input->post('akun_kas1');

//             $data = array(
//                 array(
//                     //piutang dagang
//                     'id_jps' => $akun_piutang,
//                     'no_akun'    =>  113,
//                     'kredit' =>  $kredit,
//                     'debet' =>  0,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  $piutang2,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0

//                 ),
//                 array(
//                     //pot penjualan
//                     'id_jps' => $akun_pot_pen,
//                     'no_akun'    =>  413,
//                     'kredit' =>  0,
//                     'debet' =>  $debet2,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  0,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0
//                 ),
//                 array(
//                     //kas
//                     'id_jps' => $akun_kas1,
//                     'no_akun'    =>  111,
//                     'kredit' =>  0,
//                     'debet' =>  $debet,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  0,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0
//                 )
//             );
//             // $this->db->update_batch('jurnal_penyesuaian', $data);
//             $this->db->update_batch('jurnal_penyesuaian', $data, 'id_jps');
//             redirect('jurnal/jps/index');

//         } elseif ($pil == 3) {

//             $kredit = $this->input->post('kredit3');
//             $debet = $this->input->post('debet3');

//             // $debet2 = $this->input->post('debet2potpenj');
//             // $piutang2 = $this->input->post('id_akun_piutang_dagang2');
            
//             $akun_serba = $this->input->post('akun_serba');
//             $akun_id = $this->input->post('id_akun');
//             $debet2 = $this->input->post('debet2potpenj');
//             $akun_kas3 = $this->input->post('akun_kas3');

//             $data = array(
//                 array(
//                     //akun serba
//                     'id_jps' => $akun_serba,
//                     'no_akun'    =>  $akun_id,
//                     'kredit' =>  $kredit,
//                     'debet' =>  0,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  0,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0

//                 ),
//                 array(
//                     //kas
//                     'id_jps' => $akun_kas3,
//                     'no_akun'    =>  111,
//                     'kredit' =>  0,
//                     'debet' =>  $debet,
//                     'tanggal'    =>  $tanggal,
//                     'no_transaksi'    =>  $no_transaksi,
//                     'id_piutang_dagang'    =>  0,
//                     'id_utang_dagang'    =>  0,
//                     'id_syarat'    =>  0
//                 )
//             );
//             // $this->db->update_batch('jurnal_penyesuaian', $data);
//             $this->db->update_batch('jurnal_penyesuaian', $data, 'id_jps');
//             redirect('jurnal/jps/index');
//         }

    }

    public function hapus($no_transaksi){
        $this->db->delete('jurnal_penyesuaian', array('no_transaksi' => $no_transaksi));
        redirect('jurnal/jps/index');

    }
}
