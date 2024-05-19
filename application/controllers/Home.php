<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']){
            $this->load->view('templates/user/header', $data);
            $this->load->view('templates/user/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/user/footer', $data);
        }else{
            $data['user'] = ['name' => "visitors"];
            $this->load->view('templates/user/header', $data);
            $this->load->view('templates/user/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/user/footer', $data);
        }

    }
}