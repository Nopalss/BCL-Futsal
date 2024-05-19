<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function index(){
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->modelfutsal->get('booking');
        $data['transaksi'] = $this->modelfutsal->get('transaksi');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahTransaksi(){
        $data['title'] = 'Tambah Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->modelfutsal->get_where('booking', ['status' => 'Booking']);
        $data['nota'] = $this->modelfutsal->auto_nota();
        $this->form_validation->set_rules('id_booking', 'Id Booking', 'required', ['required' => 'Id Booking Wajib Diisi!']);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Tanggal Wajib Diisi!']);
        $this->form_validation->set_rules('total', 'Total', 'required', ['required' => 'Total Wajib Diisi!']);
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/tambah-transaksi', $data);
            $this->load->view('templates/footer');
        }else{
            $nota = $this->input->post('nota');
            $id_booking = $this->input->post('id_booking');
            $tanggal = $this->input->post('tanggal');
            $total = $this->input->post('total');
            $cut = explode('Rp', $total);
            $cut = explode('.', $cut[1]);
            $cut2 = explode(',', $cut[1]);
            $total = intval($cut[0].$cut2[0]) ;

            $transaksi = [
                'nota' => $nota,
                'id_booking' =>$id_booking,
                'tanggal' => $tanggal,
                'total' => $total,
                'metode' => 'Pembayaran Langsung',
                'statuss' => 'Belum'
            ];
            $status = [
                'status' => 'Lunas'
            ];
            $this->db->where('id', $id_booking);
            $this->db->update('booking', $status);
            $this->db->insert('transaksi', $transaksi);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Data Transaksi berhasil ditambahkan!</div>');
            redirect('transaksi');
        }
    }
    public function detailTransaksi($nota){
        $data['title'] = 'Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->get_where('transaksi', ['nota' => $nota])->row_array();			 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detail-transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function printTransaksi($nota){
        $data['title'] = 'Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->get_where('transaksi', ['nota' => $nota])->row_array();			 
        $this->load->view('transaksi/print', $data);
    }

    public function hapusTransaksi($id)
    {
        $this->db->delete('transaksi', ['nota' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-message alert-danger mb-0" role="alert"><i class="fas fa-info-circle"></i> Data Transaksi berhasil dihapus!</div>');
        redirect('transaksi');
    }
}