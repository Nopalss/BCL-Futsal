<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function index(){    
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->modelfutsal->jumlah('booking', 'id');
        $data['transaksi'] = $this->modelfutsal->jumlah('transaksi', 'nota');
        $data['total'] = $this->modelfutsal->total('laporan_bulan', 'pendapatan');
        $data['pendapatan'] = $this->modelfutsal->get_pendapatan_bulan();
        $y = date('Y');
        $Pstandar = $this->modelfutsal->get_pemakaiLapangan($y, 1);
        $Psintetis = $this->modelfutsal->get_pemakaiLapangan($y, 2);
        $data['lapangan'] = ['Standart', 'Sintetis'];
        $data['pemakaian'] = [$Pstandar['pemakaian'], $Psintetis['pemakaian']];
        $data['tahun'] = date('Y');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    
    

    
}
    