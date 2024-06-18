<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function index(){
        $data['title'] = 'Transaksi';
        if ($this->session->userdata('roll_id') == 4 || $this->session->userdata('roll_id') == 3) {
            redirect('auth/blocked');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
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
        if ($this->session->userdata('roll_id') == 4 || $this->session->userdata('roll_id') == 3) {
            redirect('auth/blocked');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
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
                'statuss' => 'Belum',
                'date_tr' => time(),
                'status2' => 'Sukses',
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
        if ($this->session->userdata('roll_id') == 4 || $this->session->userdata('roll_id') == 3) {
            redirect('auth/blocked');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
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

    public function UserTransaksi(){
        $data['title'] = 'Succes Payment';
        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        $name = htmlspecialchars($this->input->post('name',true));
        $no_telepon = htmlspecialchars($this->input->post('no_telepon', true));
        if($name && $no_telepon){
            $metode = htmlspecialchars($this->input->post('metode', true));
            if($metode){
                $jam_mulai = $this->session->userdata('jam_mulai');
                $tanggal =$this->session->userdata('tanggal');
                $harga = $this->session->userdata('harga');
                $id_lapangan = $this->session->userdata('id_lapangan');
                $id_booking =  $this->modelfutsal->auto_idbooking();
                $id_pelanggan =  $this->modelfutsal->auto_idpelanggan();
                $nota =  $this->modelfutsal->auto_nota();

                $booking = [
                    'id' => $id_booking,
                    'id_pelanggan' => $id_pelanggan,
                    'id_lapangan' => $id_lapangan,
                    'tanggal' => $tanggal,
                    'jam_mulai' => $jam_mulai,
                    'status' => 'Lunas',
                    'harga' => $harga, 
                    'status2' => 'Sukses'
                ];
                $pelanggan = [
                    'id' => $id_pelanggan,
                    'id_user' => $data['user']['id'],
                    'nama' => $name,
                    'no_telepon' => $no_telepon
                ];
                date_default_timezone_set('Asia/Jakarta');
                $transaksi = [
                    'nota' => $nota,
                    'id_booking' => $id_booking,
                    'tanggal' => $tanggal,
                    'total' => $harga,
                    'metode' => $metode,
                    'statuss' => 'Belum',
                    'date_tr' => time(),
                    'status2' => 'Sukses',
                ];
                $pesan = "Selamat anda sudah berhasil membooking <b>Lapangan ". $this->session->userdata('jenis_lapangan') ."</b> di BCL Futsal. Jangan lupa datang tepat waktu ya!<br><b>Junjung tinggi Sportifitas</b>";
                $notif = [
                    'id_pelanggan' => $id_pelanggan,
                    'id_user' => $data['user']['id'],
                    'statuss' => 'Belum',
                    'pesan' => $pesan,
                    'jam' => time(),
                    'status2' => 'Sukses',
                ];
                $this->modelfutsal->insert('pelanggan', $pelanggan);
                $this->modelfutsal->insert('notif', $notif);
                $this->modelfutsal->insert('booking', $booking);
                $this->modelfutsal->insert('transaksi', $transaksi);
                $this->session->unset_userdata('jenis_lapangan');
                $this->session->unset_userdata('jam_mulai');
                $this->session->unset_userdata('tanggal');
                $this->session->unset_userdata('harga');
                redirect('home/detailBooking/' . $id_pelanggan);
            }else{
                $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Harap Isi Form Dengan Benar</div>');
                redirect('home/detailBookingLapangan/' . $this->session->userdata('id_lapangan2'));
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Harap Isi Form Dengan Benar</div>');
            redirect('home/detailBookingLapangan/' . $this->session->userdata('id_lapangan2'));
        }
    }
}