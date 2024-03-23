<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    
    public function index(){

        if ($this->session->userdata('email')){
            redirect('user');
        }
        // membuat rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        // mengecek ada inputan atau tidak 
        if ($this->form_validation->run() == false){
            // jika kosong
            $data['title'] ='Login Page';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }else{
            // jika ada
            $this->_login(); // panggil function _login
        }
    }

    private function _login(){
        // kita ambil dulu data yang sudah diinput di login
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // cari user yang email nya sesuai di input
        $user = $this->db->get_where('user', ['email' => $email])-> row_array(); // SELECT * FROM user WHERE email = $email
        
        // cek apakah user dari email yang dicari ada 
        if($user){ // usernya ada
            // cek jika user aktif
            if($user['is_active'] == 1){ // jika aktif
                // cek pasword apakah sama / benar
                if(password_verify($password, $user['password'])){ // jika benar
                    // mengeset data 
                    $data = [
                        'email' => $user['email'],
                        'roll_id' => $user['roll_id'] // menentukan menu
                    ];
                    $this->session->set_userdata($data); // dimpan data user di session
                    
                    // cek roll pekerjaan nya
                    if($user['roll_id'] == 1){ // jika ower 
                        redirect('owner'); // panggil class owner / diizinkan masuk
                    }elseif($user['roll_id'] == 2){ // jika admin 
                        redirect('admin'); // panggil class admin / diizinkan masuk
                    }else{
                        redirect('user');// user
                    }
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Wrong password!</div>');
                    redirect('auth');
                }  
            } else{// jika user/email tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">This email has  not been activated!</div>');
                redirect('auth');
            }
        } else{// user tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
        
    }

    public function registration(){
        // ini buat cek jika email masih nyangkut maka dibalikan ke tampilan user
        // if ($this->session->userdata('emsil')){
        //     redirect('user');
        // }

        // menetapkan aturan 
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [ 
            // mengeset pesan kesalahan
            'required' => 'Password required!',
            'matches' => 'Password dont Match!',
            'min_length' => 'Password too short!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false){ //kalau form validasi nya gagal maka lakukan ini
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration' );
            $this->load->view('templates/auth_footer');
        } else{
            $data = [
                //data disiapkan
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'roll_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data); // push ke database
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" role="alert">Congratulation your account has been created. Please Login!</div>');
            redirect('auth');
        }
    }
}
