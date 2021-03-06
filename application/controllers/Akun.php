<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hakakses') != 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            // $this->session->sess_destroy();
            redirect('dashboard/error');
        }
    }

    public function index()
    {
        $data['akun'] = $this->db->query("SELECT * FROM akun ORDER BY no_akun ASC")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('akun/index', $data);
        $this->load->view('templates/footer');
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

    public function excel()
    {


        $akun = $this->db->query("SELECT * FROM akun ORDER BY no_akun ASC")->result();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Muhamad Sholikhudin");
        $object->getProperties()->setLastModifiedBy("Muhamad Sholikhudin");
        $object->getProperties()->setTitle("Muhamad Sholikhudin");


        $object->setActiveSheetIndex(0);
        
        $object->getActiveSheet()->setCellValue('A1', 'NO');
        $object->getActiveSheet()->setCellValue('C1', 'NO Akun');
        $object->getActiveSheet()->setCellValue('B1', 'Nama Akun');

        $baris = 2;
        $no = 1;
        foreach($akun as $ak):

            $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $object->getActiveSheet()->setCellValue('C'.$baris, $ak->no_akun);
            $object->getActiveSheet()->setCellValue('B'.$baris, $ak->nama_akun);
       $baris ++;
        endforeach;

        $filename = "Data Akun."."xlsx";

        $object->getActiveSheet()->setTitle("Data Akuun");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
}
