<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('roll_id') == 4 || $this->session->userdata('roll_id') == 3) {
            redirect('auth/blocked');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
        is_logged_in();
    }
    public function laporanHarian()
    {
        $data['title'] = 'Laporan Harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['laporan'] = $this->modelfutsal->get('laporan');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambahLaporanHarian()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Laporan Harian';
        $data['transaksi'] = $this->modelfutsal->get_tanggal();
        $data['id_laporan'] = $this->modelfutsal->auto_idlaporanH();
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Tanggal Wajib Diisi!']);
        $hari = $this->db->get_where('laporan', ['tanggal' => date('Y-m-d')])->row_array();
        if (!$hari) {
            if ($this->modelfutsal->jam_lapor() == false) {
                if ($this->form_validation->run() == false) {
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sidebar', $data);
                    $this->load->view('templates/topbar', $data);
                    $this->load->view('laporan/tambah-laporan', $data);
                    $this->load->view('templates/footer');
                } else {
                    $id = $this->input->post('id');
                    $tanggal = $this->input->post('tanggal');
                    $pendapatan = $this->input->post('pendapatan1');
                    $laporan = [
                        'id' => $id,
                        'tanggal ' => $tanggal,
                        'pendapatan' => $pendapatan
                    ];
                    $status = [
                        'statuss' => 'Laporan'
                    ];
                    $this->db->where('tanggal', $tanggal);
                    $this->db->update('transaksi', $status);
                    $this->modelfutsal->insert('laporan', $laporan);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Laporan berhasil ditambahkan!</div>');
                    redirect('laporan/laporanHarian');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Belum Saatnya Untuk Membuat Laporan, Harap Kembali Lagi Pada Jam 22:00!</div>');
                redirect('laporan/laporanHarian');
            }
        } else {
            $d = '<div class="alert alert-danger alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Laporan Tanggal ' . date('Y-m-d') . ' Sudah Dibuat!</div>';
            $this->session->set_flashdata('message', $d);
            redirect('laporan/laporanHarian');
        }
    }
    public function get_laporan()
    {
        $tanggal = $this->input->post('tanggal');
        $pendapatan = $this->modelfutsal->get_pendapatan($tanggal);
        $data = [
            'pendapatan' => "Rp " . number_format($pendapatan['pendapatan'], 2, ',', '.'),
            'pendapatan1' => $pendapatan['pendapatan'],
        ];
        echo json_encode($data);
    }

    public function detailLaporanHarian($id)
    {
        $data['title'] = 'Laporan Harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['laporan'] = $this->modelfutsal->getById('laporan', ['id' => $id]);
        $data['standar'] = $this->modelfutsal->get_lapangan($data['laporan']['tanggal'], 1);
        $data['sintetis'] = $this->modelfutsal->get_lapangan($data['laporan']['tanggal'], 2);

        $data['pendapatan'] = $this->modelfutsal->get_pendapatanLapangan($data['laporan']['tanggal'], 1, 2);
        // buat pie chart
        $Pstandar = $this->modelfutsal->get_pemakaiLapangan($data['laporan']['tanggal'], 1);
        $Psintetis = $this->modelfutsal->get_pemakaiLapangan($data['laporan']['tanggal'], 2);
        $data['lapangan'] = ['Standart', 'Sintetis'];
        $data['pemakaian'] = [$Pstandar['pemakaian'], $Psintetis['pemakaian']];
        $data['id_laporan'] = $id;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/detail-laporan', $data);
        $this->load->view('templates/footer');
    }

    public function pdfLaporanHarian()
    {
        $data['title'] = "Laporan Harian PDF";
        $data['laporan'] = $this->modelfutsal->get('laporan');
        $sroot      = $_SERVER['DOCUMENT_ROOT']; 
        include $sroot."/bcl-futsal/application/third_party/dompdf/autoload.inc.php"; 
        $dompdf = new Dompdf\Dompdf(); 
          
        $this->load->view('laporan/pdf/lh-pdf', $data); 
     
        $paper_size  = 'A4'; // ukuran kertas 
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output(); 
     
        $dompdf->set_paper($paper_size, $orientation); 
        //Convert to PDF 
        $dompdf->load_html($html); 
        $dompdf->render(); 
        $dompdf->stream("laporan harian.pdf", array('Attachment' => 0)); 
        // nama file pdf yang di hasilkan
    }
    public function pdfDetailLh($id){
        $data['title'] = "Laporan Harian ".$id;       
        $data['laporan'] = $this->modelfutsal->getById('laporan', ['id' => $id]);
        $data['standar'] = $this->modelfutsal->get_lapangan($data['laporan']['tanggal'], 1);
        $data['sintetis'] = $this->modelfutsal->get_lapangan($data['laporan']['tanggal'], 2);
        $sroot = $_SERVER['DOCUMENT_ROOT']; 
        include $sroot."/bcl-futsal/application/third_party/dompdf/autoload.inc.php"; 
        $dompdf = new Dompdf\Dompdf();         
        $this->load->view('laporan/pdf/detailLh-pdf', $data); 
        $paper_size  = 'A4'; // ukuran kertas 
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output(); 

        $dompdf->set_paper($paper_size, $orientation); 
        //Convert to PDF 
        $dompdf->load_html($html); 
        $dompdf->render(); 
        $dompdf->stream("laporan harian ".$id.".pdf", array('Attachment' => 0)); 
        // nama file pdf yang di hasilkan
    }
    public function pdfDetailLb($id){
        $data['title'] = "Laporan Harian ".$id;       
        $data['laporan'] = $this->modelfutsal->getById('laporan_bulan', ['id_laporanB' => $id]);
        $data['harian'] = $this->modelfutsal->get_laporanH($data['laporan']['tanggal']);
        $sroot = $_SERVER['DOCUMENT_ROOT']; 
        include $sroot."/bcl-futsal/application/third_party/dompdf/autoload.inc.php"; 
        $dompdf = new Dompdf\Dompdf();         
        $this->load->view('laporan/pdf/detailLb-pdf', $data); 
        $paper_size  = 'A4'; // ukuran kertas 
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output(); 

        $dompdf->set_paper($paper_size, $orientation); 
        //Convert to PDF 
        $dompdf->load_html($html); 
        $dompdf->render(); 
        $dompdf->stream("laporan bulanan ".$id.".pdf", array('Attachment' => 0)); 
        // nama file pdf yang di hasilkan
    }
    public function pdfLaporanBulanan()
    {
        $data['title'] = "Laporan Harian PDF";
        $data['laporan'] = $this->modelfutsal->get('laporan_bulan');
        $sroot      = $_SERVER['DOCUMENT_ROOT']; 
        include $sroot."/bcl-futsal/application/third_party/dompdf/autoload.inc.php"; 
        $dompdf = new Dompdf\Dompdf(); 
          
        $this->load->view('laporan/pdf/lb-pdf', $data); 
     
        $paper_size  = 'A4'; // ukuran kertas 
        $orientation = 'potrait'; //tipe format kertas potrait atau landscape 
        $html = $this->output->get_output(); 
     
        $dompdf->set_paper($paper_size, $orientation); 
        //Convert to PDF 
        $dompdf->load_html($html); 
        $dompdf->render(); 
        $dompdf->stream("laporan bulan.pdf", array('Attachment' => 0)); 
        // nama file pdf yang di hasilkan
    }
    public function excelLb(){
        $data['title'] = "Laporan Bulanan Excel";
        $data['laporan'] = $this->modelfutsal->get('laporan_bulan');
        $this->load->view('laporan/excel/lb-excel', $data); 
    }
    public function detailexcelLb($id){
        $data['title'] = "Laporan Bulanan ". $id;
        $data['laporan'] = $this->modelfutsal->getById('laporan_bulan', ['id_laporanB' => $id]);
        $data['harian'] = $this->modelfutsal->get_laporanH($data['laporan']['tanggal']);
        $this->load->view('laporan/excel/detailLb-excel', $data); 
    }
    public function excelLh(){
        $data['title'] = "Laporan Harian Excel";
        $data['laporan'] = $this->modelfutsal->get('laporan');
        $this->load->view('laporan/excel/lh-excel', $data); 
    }
    public function detailexcelLh($id){
        $data['laporan'] = $this->modelfutsal->getById('laporan', ['id' => $id]);
        $data['standar'] = $this->modelfutsal->get_lapangan($data['laporan']['tanggal'], 1);
        $data['sintetis'] = $this->modelfutsal->get_lapangan($data['laporan']['tanggal'], 2);
        $data['title'] = "Laporan Harian ". $id;
        $this->load->view('laporan/excel/detailLh-excel', $data); 
    }
    public function laporanBulanan()
    {
        $data['title'] = 'Laporan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['laporan'] = $this->modelfutsal->get('laporan_bulan');
        // $data['pendapatan'] = $this->modelfutsal->total_laporan_harian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/bulanan/laporan-bulanan', $data);
        $this->load->view('templates/footer');
    }
    public function tambahLaporanBulanan()
    {
        $data['title'] = 'Tambah Laporan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['laporan'] = $this->modelfutsal->get('laporan_bulan');
        $data['pendapatan'] = $this->modelfutsal->pendapatanBulan();
        $data['id_laporan'] = $this->modelfutsal->auto_idlaporanB();
        $this->form_validation->set_rules('bulan', 'bulan', 'required', ['required' => 'bulan Wajib Diisi!']);
        $bulan = $this->db->get_where('laporan_bulan', ['bulan' => date('M')])->row_array();
        $data['bulan']= date('M');
        if (!$bulan) {
            if ($this->modelfutsal->akhirBulan() == false) {
                if ($this->modelfutsal->jam_lapor() == false) {
                    if ($this->form_validation->run() == false) {
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sidebar', $data);
                        $this->load->view('templates/topbar', $data);
                        $this->load->view('laporan/bulanan/tambah-laporanB', $data);
                        $this->load->view('templates/footer');
                    } else {
                        $bulan = $this->input->post('bulan');
                        $id = $this->input->post('id');
                        $pendapatan = $this->input->post('pendapatan');
                        $tanggal = date('Y-m');
                        $laporan = [
                            'id_laporanB' => $id,
                            'bulan ' => $bulan,
                            'pendapatan' => $pendapatan,
                            'tanggal' => $tanggal
                        ];
                        $this->modelfutsal->insert('laporan_bulan', $laporan);
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Laporan berhasil ditambahkan!</div>');
                        redirect('laporan/laporanBulanan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Belum Saatnya Untuk Membuat Laporan, Harap Kembali Lagi Pada Jam 22:00!</div>');
                    redirect('laporan/laporanBulanan');
                }
            } else {
                $t = date('t M Y');
                $m = '<div class="alert alert-danger alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Tidak Bisa Membuat Laporan Karena Belum Tanggal ' . $t . '!</div>';
                $this->session->set_flashdata('message', $m);
                redirect('laporan/laporanBulanan');
            }
        } else {
            $m = '<div class="alert alert-danger alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Laporan Bulan ' . date('M') . ' Sudah Dibuat!</div>';
            $this->session->set_flashdata('message', $m);
            redirect('laporan/laporanBulanan');
        }
    }

    public function detailLaporanBulanan($id)
    {
        $data['title'] = 'Laporan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['laporan'] = $this->modelfutsal->getById('laporan_bulan', ['id_laporanB' => $id]);
        $data['harian'] = $this->modelfutsal->get_laporanH($data['laporan']['tanggal']);
        foreach ($data['harian'] as $h) {
            $pendapatan[] = $h['pendapatan'];
        }

        // $data['pendapatan'] = $this->modelfutsal->get_pendapatanLapangan($data['laporan']['tanggal'], 1, 2);
        $data['pendapatan'] = $pendapatan;
        // buat pie chart
        $Pstandar = $this->modelfutsal->get_pemakaiLapangan($data['laporan']['tanggal'], 1);
        $Psintetis = $this->modelfutsal->get_pemakaiLapangan($data['laporan']['tanggal'], 2);
        $data['lapangan'] = ['Standart', 'Sintetis'];
        $data['pemakaian'] = [$Pstandar['pemakaian'], $Psintetis['pemakaian']];
        $data['id_laporan'] = $id;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/bulanan/detail-laporan', $data);
        $this->load->view('templates/footer');
    }
}
