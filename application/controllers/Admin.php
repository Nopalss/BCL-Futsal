<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function index(){
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar' , $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');

    }
    
    public function booking(){
        $data['title'] = 'Booking';
        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar' , $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/index' , $data);
        $this->load->view('templates/footer');
    }

    public function tambahBooking(){
        // membuat rules
        $this->form_validation->set_rules('id_booking', 'Id Booking', 'trim|required');
        $this->form_validation->set_rules('id_pelanggan', 'Id Pelanggan', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim|required');
        $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim|required');
        $data['title'] = 'Tambah Booking';
        $data['jam'] = $this->modelfutsal->get('jam');
        $data['lapangan'] = $this->modelfutsal->get('lapangan');
        $data['id_booking'] = $this->modelfutsal->auto_idbooking();
        $data['id_pelanggan'] = $this->modelfutsal->auto_idpelanggan();
        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar' , $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/tambahBooking' , $data);
        $this->load->view('templates/footer');
    }

    public function lapangan_list()
    {
        $id_lapangan = $this->input->post('id_lapangan');
        var_dump($id_lapangan);
        $result = $this->modelfutsal->get_where('lapangan', ['id' => $id_lapangan]);
        foreach ($result as $row) {
            $data = [
                'jenis' => $row->jenis_lapangan,
                'harga' => $row->harga,
            ];
        }
        echo json_encode($data);
    }
}