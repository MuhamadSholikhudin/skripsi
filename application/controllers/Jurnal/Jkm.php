<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jkm extends CI_Controller
{


    public function index()
    {
        $data['jkm'] = $this->db->query("SELECT * FROM jkm GROUP BY no_transaksi ORDER BY tanggal ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jkm/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // $data['jkm'] = $this->db->query("SELECT * FROM jkm ORDER BY no_jkm ASC")->result();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ORDER BY nama_piutang_dagang ASC")->result();

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
        if($pil == 1){
            $kredit = $this->input->post('kredit1');
            $debet = $this->input->post('debet1');
           

            $data = array(
            array(
                //penjualan
                'id_akun'	=>  12, 
                'kredit' =>  $kredit, 
                'debet' =>  0, 
                'tanggal'	=>  $tanggal,
                    'no_transaksi'	=>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'	=>  0

            ),
            array(
                //Kas
                    'id_akun'	=>  1,
                    'kredit' =>  0, 
                    'debet'=>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
            )
        );
            $this->db->insert_batch('jkm', $data); 
            redirect('jurnal/jkm/index');

        }elseif($pil == 2){

            $kredit = $this->input->post('kredit2');
            $debet = $this->input->post('debet2');
            $debet2 = $this->input->post('debet2potpenj');
            $piutang = $this->input->post('id_akun_piutang_dagang');


            $data = array(
                array(
                    //piutang dagang
                    'id_akun'    =>  3,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  $piutang,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //pot penjualan
                    'id_akun'    =>  14,
                    'kredit' =>  0,
                    'debet' =>  $debet2,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                ),
                array(
                    //kas
                    'id_akun'    =>  1,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jkm', $data);
            redirect('jurnal/jkm/index');
        }elseif($pil == 3){

            $akun_kredit3 = $this->input->post('akun_kredit3');
            $kredit3 = $this->input->post('kredit3');

            $debet3 = $this->input->post('debet3');


            $data = array(
                array(
                    //akun_kredit3
                    'id_akun'    =>  $akun_kredit3,
                    'kredit' =>  $kredit3,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'id_akun'    =>  1,
                    'kredit' =>  0,
                    'debet' =>  $debet3,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            $this->db->insert_batch('jkm', $data);
            redirect('jurnal/jkm/index');
        }

    }

    public function edit($no_transaksi)
    {
        $data['jkm'] = $this->db->query("SELECT * FROM jkm WHERE no_transaksi = '$no_transaksi' ")->row();
        $data['piutang_dagang'] = $this->db->query("SELECT * FROM piutang_dagang ")->result();
$data['akun'] = [10, 9];
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
        
        if ($pil == 1) {
            $kredit = $this->input->post('kredit1');
            $debet = $this->input->post('debet1');

            $akun_penjualan = $this->input->post('akun_penjualan');
            $akun_kas = $this->input->post('akun_kas');

            $data = array(
                array(
                    //penjualan
                    'id_jkm' => $akun_penjualan,
                    'id_akun'    =>  12,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //Kas
                    'id_jkm' => $akun_kas,
                    'id_akun'    =>  1,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jkm', $data, 'id_jkm');
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
                    'id_akun'    =>  3,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  $piutang2,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //pot penjualan
                    'id_jkm' => $akun_pot_pen,
                    'id_akun'    =>  14,
                    'kredit' =>  0,
                    'debet' =>  $debet2,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                ),
                array(
                    //kas
                    'id_jkm' => $akun_kas1,
                    'id_akun'    =>  1,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jkm', $data, 'id_jkm');
            redirect('jurnal/jkm/index');

        } elseif ($pil == 3) {

            $kredit = $this->input->post('kredit3');
            $debet = $this->input->post('debet3');

            // $debet2 = $this->input->post('debet2potpenj');
            // $piutang2 = $this->input->post('id_akun_piutang_dagang2');
            
            $akun_serba = $this->input->post('akun_serba');
            $akun_id = $this->input->post('id_akun');
            $debet2 = $this->input->post('debet2potpenj');
            $akun_kas3 = $this->input->post('akun_kas3');

            $data = array(
                array(
                    //akun serba
                    'id_jkm' => $akun_serba,
                    'id_akun'    =>  $akun_id,
                    'kredit' =>  $kredit,
                    'debet' =>  0,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0

                ),
                array(
                    //kas
                    'id_jkm' => $akun_kas3,
                    'id_akun'    =>  1,
                    'kredit' =>  0,
                    'debet' =>  $debet,
                    'tanggal'    =>  $tanggal,
                    'no_transaksi'    =>  $no_transaksi,
                    'id_piutang_dagang'    =>  0,
                    'id_utang_dagang'    =>  0,
                    'id_syarat'    =>  0
                )
            );
            // $this->db->update_batch('jkm', $data);
            $this->db->update_batch('jkm', $data, 'id_jkm');
            redirect('jurnal/jkm/index');
        }

    }

    public function hapus($no_transaksi){
        $this->db->delete('jkm', array('no_transaksi' => $no_transaksi));
        redirect('jurnal/jkm/index');

    }
}
