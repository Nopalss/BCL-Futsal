<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (checked_user_login() == 'Visitor') {
            $status = [
                'status' => checked_user_login(),
                'roll_id' => 4
            ];
        } else {
            $status = [
                'status' => checked_user_login(),
            ];
        }
        $this->session->set_userdata($status);
    }
    public function index()
    {
        $data['title'] = 'Home';
        $data['lapangan'] = $this->db->get('lapangan')->result_array();
        $data['icon'] = $this->db->get('icon')->result_array();
        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
        if ($this->session->userdata('status') == 'Member') {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        } else {
            $data['user'] = [
                'name' => '????',
                'image' => 'default.png'
            ];
        }
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/user/footer', $data);
    }
    public function venue()
    {
        $data['title'] = 'Venue';
        $data['lapangan'] = $this->db->get('lapangan')->result_array();
        $data['icon'] = $this->db->get('icon')->result_array();
        $data['tutor'] = $this->db->get('tutor')->result_array();
        $data['fasilitas'] = $this->db->get('fasilitas')->result_array();
        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
        if ($this->session->userdata('status') == 'Member') {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        } else {
            $data['user'] = [
                'name' => '????',
                'image' => 'default.png'
            ];
        }
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('home/venue/venue', $data);
        $this->load->view('templates/user/footer', $data);
    }
    public function detailBookingLapangan($id = 0)
    {
        if ($id == 0) {
            $id = $this->session->userdata('id_lapangan2');
        } else {
            $lapangan = [
                'id_lapangan2' => $id
            ];
            $this->session->set_userdata($lapangan);
        }
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Tanggal Wajib Diisi!']);
        $data['lapangan'] = $this->modelfutsal->getById('lapangan', ['id' => $id]);
        $data['title'] = 'Lapangan ' . $data['lapangan']['jenis_lapangan'];
        $data['icon'] = $this->modelfutsal->get('icon');
        $data['tutor'] = $this->modelfutsal->get('tutor');
        $data['fasilitas'] = $this->modelfutsal->get('fasilitas');
        $data['jam'] = $this->modelfutsal->get('jam');
        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
        $data['comment'] = $this->modelfutsal->get_comment($id);
        if ($this->session->userdata('status') == 'Member') {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        } else {
            $data['user'] = [
                'name' => '????',
                'image' => 'default.png'
            ];
        }
        if ($this->form_validation->run() == false) {
            $tanggal = date('Y-m-d');
            $data['tanggal'] = $tanggal;
            $data['jam_booking'] = $this->modelfutsal->get_where('booking', ['tanggal' => $tanggal, 'id_lapangan' => $id]);
            $this->load->view('templates/user/header', $data);
            $this->load->view('templates/user/topbar', $data);
            $this->load->view('home/venue/detail-Lapangan', $data);
            $this->load->view('templates/user/footer', $data);
        } else {
            $tanggal = $this->input->post('tanggal');
            $pecah = explode('-', $tanggal);
            if ($pecah[0] >= date('Y') && $pecah[1] >= date('m')){
                if($pecah[1] == date('m') && $pecah[2] >= date('d')){
                    $data['tanggal'] = $tanggal;
                }elseif($pecah[1] > date('m')){
                    $data['tanggal'] = $tanggal;
                }else{
                    $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Tanggal Tidak Boleh Kurang Dengan Tanggal Sekarang!</div>');
                    redirect('home/detailBookingLapangan/' . $id);
                }
                $data['jam_booking'] = $this->modelfutsal->get_where('booking', ['tanggal' => $tanggal, 'id_lapangan' => $id]);
                $this->load->view('templates/user/header', $data);
                $this->load->view('templates/user/topbar', $data);
                $this->load->view('home/venue/detail-Lapangan', $data);
                $this->load->view('templates/user/footer', $data);
            } else {
                $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Tanggal Tidak Boleh Kurang Dengan Tanggal Sekarang!</div>');
                redirect('home/detailBookingLapangan/' . $id);
            }
        }
    }
    public function beriUlasan()
    {
        $id_user = $this->input->post('id_user');
        $comment = htmlspecialchars($this->input->post('comment', true));
        $id = $this->input->post('id');
        $tanggal = date('d M Y');
        $data = [
            'id_user' => $id_user,
            'comment' => $comment,
            'tanggal' => $tanggal,
            'id_lapangan' => $id
        ];
        $this->modelfutsal->insert('comment', $data);
        redirect('home/detailBookingLapangan/' . $id);
    }

    public function createBookingUser()
    {
        $id_lapangan = $this->input->post('id_lapangan');
        $jenis_lapangan = $this->input->post('jenis_lapangan');
        $jam_mulai = $this->input->post('jam_mulai');
        $tanggal = $this->input->post('tanggal');
        $harga = $this->input->post('harga');
        if ($this->session->userdata('roll_id') == '3') {
            if ($jam_mulai) {
                if ($this->modelfutsal->seleksiJ($jam_mulai, $tanggal) == true) {
                    if (!$this->modelfutsal->cek_booking($id_lapangan, $jam_mulai, $tanggal)) {
                        $data['title'] = 'Payment';
                        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
                        $data['booking'] = [
                            'id_lapangan' => $id_lapangan,
                            'jenis_lapangan' => $jenis_lapangan,
                            'jam_mulai' => $jam_mulai,
                            'tanggal' => $tanggal,
                            'harga' => $harga
                        ];
                        $this->session->set_userdata($data['booking']);
                        $data['bank'] = $this->modelfutsal->get_where('jns_payment', ['jenis' => 'B']);
                        $data['pay'] = $this->modelfutsal->get_where('jns_payment', ['jenis' => 'D']);
                        $this->load->view('templates/user/header', $data);
                        $this->load->view('templates/user/topbar', $data);
                        $this->load->view('home/payment/index', $data);
                        $this->load->view('templates/user/footer', $data);
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Jam yang Anda Pilih Sudah Ada yang Booking!</div>');
                        redirect('home/detailBookingLapangan/' . $this->session->userdata('id_lapangan2'));
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Jam yang Anda Pilih Sudah Lewat!</div>');
                    redirect('home/detailBookingLapangan/' . $this->session->userdata('id_lapangan2'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Harap Memilih Jadwal Booking!</div>');
                redirect('home/detailBookingLapangan/' . $this->session->userdata('id_lapangan2'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Harap Melakukan Login Terlebih Dahulu!</div>');
            redirect('home/detailBookingLapangan/' . $this->session->userdata('id_lapangan2'));
        }
    }
    public function detailBooking($pelanggan){
        $data['title'] = "Detail Booking";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
        $data['pelanggan'] = $this->modelfutsal->get_detailTransaksi($pelanggan);
        $this->load->view('templates/user/header', $data);    
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('home/booking/detail', $data);
        $this->load->view('templates/user/footer', $data);
    }
    public function myBooking(){
        $data['title'] = "My Booking";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
        $data['booking'] = $this->modelfutsal->getMyBooking($data['user']['id']);
        $this->load->view('templates/user/header', $data);    
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('home/booking/mybooking', $data);
        $this->load->view('templates/user/footer', $data);
    }
    public function notifikasi(){
        $data['title'] = "Notifikasi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
        $data['notif'] = $this->modelfutsal->get_where('notif', ['id_user' => $data['user']['id']]);
        $this->db->set('statuss', 'Baca');
        $this->db->where('id_user', $data['user']['id']);
        $this->db->update('notif');
        $this->load->view('templates/user/header', $data);    
        $this->load->view('templates/user/topbar', $data);
        $this->load->view('home/notifikasi', $data);
        $this->load->view('templates/user/footer', $data);
    }
}