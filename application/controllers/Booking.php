<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->modelfutsal->get('booking');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambahBooking()
    {
        // membuat rules
        $this->form_validation->set_rules('id_pelanggan', 'Id Pelanggan', 'required', [
            'required' => 'Id Pelanggan Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Wajib Diisi!']);
        $this->form_validation->set_rules('no_telepon', 'No telepon', 'required', ['required' => 'No Telepon Wajib Diisi!']);
        $this->form_validation->set_rules('id_lapangan', 'Lapangan', 'required', ['required' => 'Lapangan Wajib Diisi!']);
        $this->form_validation->set_rules('id_jam', 'Jam Mulai', 'required', ['required' => 'Jam Mulai Wajib Diisi!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Booking';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['jam'] = $this->modelfutsal->get('jam');
            $data['lapangan'] = $this->modelfutsal->get('lapangan');
            $data['jam_booking'] = $this->modelfutsal->get_where('booking', ['tanggal' => $this->session->userdata('tanggal'), 'id_lapangan' => $this->session->userdata('id_lapangan')]);
            $data['id_pelanggan'] = $this->modelfutsal->auto_idpelanggan();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('booking/tambahBooking', $data);
            $this->load->view('templates/footer');
        } else {
            $id_pelanggan = htmlspecialchars($this->input->post('id_pelanggan', true));
            $nama = htmlspecialchars($this->input->post('nama', true));
            $no_telepon = htmlspecialchars($this->input->post('no_telepon', true));
            $id_lapangan = $this->input->post('id_lapangan');
            $lapangan = $this->db->get_where('lapangan', ['id' => $id_lapangan])->row_array();
            $harga = $lapangan['harga'];
            $tanggal = $this->input->post('tanggal');
            $id_booking =  $this->modelfutsal->auto_idbooking();
            $id_jam = $this->input->post('id_jam');
            $jam_booking = $this->modelfutsal->getById('jam', ['id_jam' => $id_jam]);
            $jam = $jam_booking['jam'];
            if($this->modelfutsal->seleksiJ($jam, $tanggal) == true){
                $booking = [
                    'id' => $id_booking,
                    'id_pelanggan' => $id_pelanggan,
                    'id_lapangan' => $id_lapangan,
                    'tanggal' => $tanggal,
                    'jam_mulai' => $jam,
                    'status' => 'Booking',
                    'harga' => $harga,
                ];
                $pelanggan = [
                    'id' => $id_pelanggan,
                    'id_user' => 0,
                    'nama' => $nama,
                    'no_telepon' => $no_telepon
                ];
                $is_active = 1;
                $this->db->set('is_active', $is_active);
                $this->db->where('id', $id_lapangan);
                $this->db->update('lapangan');
                $this->modelfutsal->insert('pelanggan', $pelanggan);
                $this->modelfutsal->insert('booking', $booking);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Data Booking berhasil ditambahkan!</div>');
                redirect('booking');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"><i class="fas fa-info-circle"></i> Jam yang anda pilih sudah lewat, silahkan pilih lagi!</div>');
                redirect('booking/tambahBooking');
            }
        }
    }
    public function detailBooking($id)
    {
        $data['title'] = 'Detail Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_booking'] = $id;
        $data['booking'] = $this->modelfutsal->getBooking($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/detailBooking', $data);
        $this->load->view('templates/footer');
    }

    public function hapusBooking($id)
    {
        $this->db->delete('booking', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-message alert-danger mb-0" role="alert"><i class="fas fa-info-circle"></i> Data Booking berhasil dihapus!</div>');
        redirect('booking');
    }
    public function get_booking(){
        $id_booking = $this->input->post('id_booking');
        $result = $this->modelfutsal->getById('booking', ['id' => $id_booking]);
        $data = [
            'tanggal' => $result['tanggal'],
            'harga' =>  "Rp " . number_format($result['harga'],2,',','.')
        ];
        echo json_encode($data);
    }
    public function jadwalBooking()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Tanggal Wajib Diisi!']);
        $this->form_validation->set_rules('id_lapangan', 'Lapangan', 'required', ['required' => 'Lapangan Wajib Diisi!']);
        $data['title'] = 'Tambah Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jam'] = $this->modelfutsal->get('jam');
        $data['lapangan'] = $this->modelfutsal->get('lapangan');
        $data['id_pelanggan'] = $this->modelfutsal->auto_idpelanggan();

        if ($this->form_validation->run() == false) {
            $data['id_pelanggan'] = $this->modelfutsal->auto_idpelanggan();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('booking/cek_jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $tanggal = $this->input->post('tanggal');
            $id_lapangan = $this->input->post('id_lapangan');
            $pecah = explode('-', $tanggal);
            if($pecah[0] >= date('Y') && $pecah[1] >= date('m')){
                if($pecah[1] == date('m') && $pecah[2] >= date('d')){
                    $data['tanggal'] = $tanggal;
                }elseif($pecah[1] > date('m')){
                    $data['tanggal'] = $tanggal;
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-message alert-danger" role="alert"><i class="fas fa-info-circle"></i> Tanggal Tidak Boleh Kurang Dengan Tanggal Sekarang !</div>');
                    redirect('booking/jadwalBooking');
                }
                $tanggal1 = [
                    'tanggal' => $tanggal,
                    'id_lapangan' => $id_lapangan,
                    
                ];
                $this->session->set_userdata($tanggal1);
                $lapangan = $this->db->get_where('lapangan', ['id' => $this->session->userdata('id_lapangan')])->row_array();
                $lapangan2 = [
                    'jenis_lapangan' => $lapangan['jenis_lapangan']
                ];
                $this->session->set_userdata($lapangan2);
                $jam_booking = $this->modelfutsal->get_where('booking', ['tanggal' => $this->session->userdata('tanggal'), 'id_lapangan' => $this->session->userdata('id_lapangan') ]);
                $data['jam_booking'] = $jam_booking;
    
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('booking/tambahBooking', $data);
                $this->load->view('templates/footer');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-message alert-danger" role="alert"><i class="fas fa-info-circle"></i> Tanggal Tidak Boleh Kurang Dengan Tanggal Sekarang !</div>');
                redirect('booking/jadwalBooking');
            }
        }
    }

    public function editTanggal($id){
        $data['title'] = 'Edit Booking';
        $id_booking = [
            'id_booking' => $id
        ];
        $this->session->set_userdata($id_booking);

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->modelfutsal->getById('booking', ['id' => $id]);
        $data['jam'] = $this->modelfutsal->get('jam');
        $data['lapangan'] = $this->modelfutsal->get('lapangan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('booking/editJam', $data);
            $this->load->view('templates/footer');
    }
    public function editBooking(){
        $data['title'] = 'Edit Booking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['booking'] = $this->modelfutsal->getById('booking', ['id' => $this->session->userdata('id_booking')]);
        $data['jam'] = $this->modelfutsal->get('jam');
        $data['lapangan'] = $this->modelfutsal->get('lapangan');

        if($this->fom_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('booking/editBooking', $data);
            $this->load->view('templates/footer');
        }
    }
}