<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function laporanHarian()
    {
        $data['title'] = 'Laporan Harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->modelfutsal->get('laporan');
        $data['pendapatan'] = $this->modelfutsal->total_laporan_harian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambahLaporanHarian()
    {
        $data['title'] = 'Tambah Laporan Harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->modelfutsal->get_tanggal();
        $data['id_laporan'] = $this->modelfutsal->auto_idlaporanH();
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Tanggal Wajib Diisi!']);

        if ($this->modelfutsal->jam_lapor() == true) {
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('laporan/tambah-laporan', $data);
                $this->load->view('templates/footer');
            } else {
                $id = $this->input->post('id');
                $tanggal = $this->input->post('tanggal');
                $pendapatan = $this->input->post('pendapatan');
                $cut = explode('Rp', $pendapatan);
                $cut = explode('.', $cut[1]);
                $cut2 = explode(',', $cut[1]);
                $pendapatan = intval($cut[0].$cut2[0]);


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
    }
    public function get_laporan()
    {
        $tanggal = $this->input->post('tanggal');
        $pendapatan = $this->modelfutsal->get_pendapatan($tanggal);
        $data = [
            'pendapatan' => "Rp " . number_format($pendapatan['pendapatan'], 2, ',', '.'),
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

    public function laporanBulanan(){
        $data['title'] = 'Laporan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->modelfutsal->get('laporan_bulan');
        // $data['pendapatan'] = $this->modelfutsal->total_laporan_harian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/laporan-bulanan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahLaporanBulanan(){
        $data['title'] = 'Tambah Laporan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->modelfutsal->get('laporan_bulan');
        $data['pendapatan'] = $this->modelfutsal->pendapatanBulan();
        $data['id_laporan'] = $this->modelfutsal->auto_idlaporanB();
        $this->form_validation->set_rules('bulan', 'bulan', 'required', ['required' => 'bulan Wajib Diisi!']);
        if($this->modelfutsal->akhirBulan() == true){
            if($this->modelfutsal->jam_lapor() == true){
                if($this->form_validation->run() == false){
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sidebar', $data);
                    $this->load->view('templates/topbar', $data);
                    $this->load->view('laporan/tambah-laporanB', $data);
                    $this->load->view('templates/footer');
                }else{
                        $id = $this->input->post('id');
                        $bulan = $this->input->post('bulan');
                        $pendapatan = $this->input->post('pendapatan');
                        $laporan = [
                            'id_laporanB' => $id,
                            'bulan ' => $bulan,
                            'pendapatan' => $pendapatan
                        ];
                        $this->modelfutsal->insert('laporan_bulan', $laporan);
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Laporan berhasil ditambahkan!</div>');
                        redirect('laporan/laporanBulanan');
                    }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Belum Saatnya Untuk Membuat Laporan, Harap Kembali Lagi Pada Jam 22:00!</div>');
                redirect('laporan/laporanBulanan');
            }
        }else{
            $t = date('t');
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message mb-0" role="alert"><i class="fas fa-info-circle"></i> Tidak Bisa Membuat Laporan Karena Belum Tanggal <?= $t ?>!</div>');
            redirect('laporan/laporanBulanan');
        }
    }
}
