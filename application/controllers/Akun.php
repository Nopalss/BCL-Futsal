<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
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
            $name = htmlspecialchars($this->input->post('name'));
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
            redirect('akun');
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
            $current_password = htmlspecialchars($this->input->post('current_password'));
            $new_password = htmlspecialchars($this->input->post('new_password1'));
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Wrong Current Password!</div>');
                redirect('akun/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">New Password <b>cannot be the same</b> as current password!</div>');
                    redirect('akun/changepassword');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Password Changed!</div>');
                    redirect('akun/changepassword');
                }
            }
        }
    }

    public function myprofile()
    {
        $data['title'] = 'My Profile';
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
        $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => ' Harap Isi Form Dengan Benar!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header', $data);
            $this->load->view('templates/user/topbar', $data);
            $this->load->view('member/index', $data);
            $this->load->view('templates/user/footer', $data);
        } else {
            $name = htmlspecialchars($this->input->post('name', true));
            $email = $this->input->post('email');
            if (!$name) {
                // cek gambar
                $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Harap Isi Form Dengan Benar!</div>');
                redirect('akun/myprofile');
            } else {
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
                $this->session->set_flashdata('message', '<div class="alert-message-eror" style="background-color: #409b71;" role="alert"><i class="fas fa-info-circle"></i> Selamat Update Data Berhasil!</div>');
                redirect('akun/myprofile');
            }
        }
    }
    public function changePassword2(){
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['icon'] = $this->db->get('icon')->result_array();
        $data['menu'] = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat Password', 'trim|required|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header', $data);
            $this->load->view('templates/user/topbar', $data);
            $this->load->view('member/changePassword', $data);
            $this->load->view('templates/user/footer', $data);
        } else {
            $current_password = htmlspecialchars($this->input->post('current_password', true));
            $new_password = htmlspecialchars($this->input->post('new_password1', true));
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Wrong Current Password!</div>');
                redirect('akun/changepassword2');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> New Password <b>cannot be the same</b> as current password!</div>');
                    redirect('akun/changepassword2');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert-message-eror" style="background-color: #409b71;" role="alert"><i class="fas fa-info-circle"></i> Selamat Password Berhasil Diubah!</div>');
                    redirect('akun/changepassword2');
                }
            }
        }
    }
}
