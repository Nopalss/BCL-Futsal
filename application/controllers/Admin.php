<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/index', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('edit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation </strong> your Profile has been updated!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat Password', 'trim|required|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('profile/changepassword', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Wrong Current Password!</div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">New Password <b>cannot be the same</b> as current password!</div>');
                    redirect('admin/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Password Changed!</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }

    public function booking()
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
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"><i class="fas fa-info-circle"></i> Data Booking berhasil ditambahkan!</div>');
                redirect('admin/booking');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert"><i class="fas fa-info-circle"></i> Jam yang anda pilih sudah lewat, silahkan pilih lagi!</div>');
                redirect('admin/tambahBooking');
            }
        }
    }

    public function detail_booking($id)
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

    public function hapus_booking($id)
    {
        $this->db->delete('booking', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-message alert-danger" role="alert"><i class="fas fa-info-circle"></i> Data Booking berhasil dihapus!</div>');
        redirect('admin/booking');
    }
    public function get_booking(){
        $id_booking = $this->input->post('id_booking');
        $result = $this->modelfutsal->getById('booking', ['id' => $id_booking]);
        $data = [
            'tanggal' => $result['tanggal'],
            'harga' => $result['harga']
        ];
        echo json_encode($data);
    }

    public function lapangan_list()
    {
        $id_lapangan = $this->input->post('id_lapangan');
        $result = $this->modelfutsal->getById('lapangan', ['id' => $id_lapangan]);
        $data = [
            'harga' => $result['harga']
        ];
        echo json_encode($data);
    }

    public function jam_selesai()
    {
        $id_jam = $this->input->post('id_jam');
        $durasi = $this->input->post('Durasi');
        $jam_selesai = $this->modelfutsal->jamSelesai($id_jam, $durasi);
        var_dump($jam_selesai);
        $data = [
            'jam_selesai' => $jam_selesai['jam']
        ];
        echo json_encode($data);
    }

    public function jadwal_booking()
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
            if($pecah[0] >= date('Y') && $pecah[1] >= date('m') && $pecah[2] >= date('d')){
                $data['tanggal'] = $tanggal;
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
                redirect('admin/jadwal_booking');
            }
        }
    }

    public function transaksi(){
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

            $transaksi = [
                'nota' => $nota,
                'id_booking' =>$id_booking,
                'tanggal' => $tanggal,
                'total' => $total,
                'metode' => 'Pembayaran Langsung'
            ];
            $status = [
                'status' => 'Lunas'
            ];
            $this->db->where('id', $id_booking);
            $this->db->update('booking', $status);
            $this->db->insert('transaksi', $transaksi);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"><i class="fas fa-info-circle"></i> Data Transaksi berhasil ditambahkan!</div>');
            redirect('admin/transaksi');
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

    public function laporanHarian(){
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->modelfutsal->get('laporan');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambahLaporanHarian(){
        $data['title'] = 'Tambah Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->modelfutsal->get_tanggal();
        $data['id_laporan'] = $this->modelfutsal->auto_idlaporan();
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Tanggal Wajib Diisi!']);
        if($this->form_validation->run() == false){
            $data['id_laporan'] = $this->modelfutsal->auto_idlaporan();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/tambah-laporan', $data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->input->post('id');
            $tanggal = $this->input->post('tanggal');
            $pendapatan = $this->input->post('pendapatan');

            $laporan= [
                'id' => $id,
                'tanggal ' => $tanggal,
                'pendapatan' => $pendapatan
            ];

            $this->modelfutsal->insert('laporan', $laporan);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert"><i class="fas fa-info-circle"></i> Laporan berhasil ditambahkan!</div>');
            redirect('admin/laporan');
        }
    }
    public function get_laporan(){
        $tanggal = $this->input->post('tanggal');
        $pendapatan = $this->modelfutsal->get_pendapatan($tanggal);
        $data = [
            'pendapatan' => $pendapatan['pendapatan'],
        ];
        echo json_encode($data);
    }
}
