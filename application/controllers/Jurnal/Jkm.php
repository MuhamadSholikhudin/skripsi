<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jkm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hakakses') == " ") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            // $this->session->sess_destroy();
            redirect('dashboard/error');
        }

        $this->load->helper('tgl_indo');
    }

    public function index()
    {
        $data['jkm'] = $this->db->query("SELECT * FROM jurnal_penerimaan_kas GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $data['pilihan'] = ['samping'];
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkm/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jurnal_penerimaan_kas'] = $this->db->query("SELECT * FROM jurnal_penerimaan_kas ORDER BY no_jurnal_penerimaan_kas ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang WHERE id_piutang_dagang != 0 ORDER BY nama_piutang_dagang ASC")->result();
        $data['pilihan'] = ['samping'];
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun = 311 OR no_akun = 512")->result();
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
            $this->db->insert_batch('jurnal_penerimaan_kas', $data); 
            redirect('jurnal/jkm/index');

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
            $this->db->insert_batch('jurnal_penerimaan_kas', $data);
            redirect('jurnal/jkm/index');
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
            $this->db->insert_batch('jurnal_penerimaan_kas', $data);
            redirect('jurnal/jkm/index');
        }

    }

    public function edit($no_transaksi)
    {
        $data['jkm'] = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ")->result();
        $data['akun'] = $this->db->query("SELECT * FROM akun WHERE no_akun = 221  OR no_akun = 311")->result();
        
        $data['pilihan'] = ['samping'];

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
                    'id_pengguna'    =>  $id_pengguna,
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
            
            $this->db->update_batch('jurnal_penerimaan_kas', $data, 'id_jkm');
            redirect('jurnal/jkm/index');

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
                    'id_pengguna'    =>  $id_pengguna,
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
                    'id_pengguna'    =>  $id_pengguna,                
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
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            
            $this->db->update_batch('jurnal_penerimaan_kas', $data, 'id_jkm');
            redirect('jurnal/jkm/index');

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
                    'id_pengguna'    =>  $id_pengguna,
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
                    'id_pengguna'    =>  $id_pengguna,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jurnal_penerimaan_kas', $data);
            $this->db->update_batch('jurnal_penerimaan_kas', $data, 'id_jurnal_penerimaan_kas');
            redirect('jurnal/jkm/index');
        }

    }

    public function hapus($no_transaksi){
        $this->db->delete('jurnal_penerimaan_kas', array('no_transaksi' => $no_transaksi));
        redirect('jurnal/jkm/index');

    }
}
