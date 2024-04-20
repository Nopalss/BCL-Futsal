<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller{
    
    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        $s = date('y');
        echo $s;
        // $tanggal = $this->session->userdata('tanggal');
        // $pecah = explode('-', $tanggal);
        // var_dump($pecah);
        // echo $pecah[0];
        if(1 <1){
            echo "true";
        }
        $this->db->distinct('tanggal');
        $data = $this->db->get('transaksi');
        // var_dump($data);
        $query = "SELECT SUM(total) as pendapatan FROM transaksi WHERE tanggal = '2024-04-17'";
        $exequte = $this->db->query($query)->row_array();
        // var_dump($exequte);
        $jam_booking = $this->modelfutsal->get_where('booking', ['tanggal' => "2024-04-18", 'id_lapangan' => 1 ]);
        // print_r($jam_booking);
        // var_dump($jam_booking);

        foreach($jam_booking as $j){
            $jam_booking= $j['jam_mulai'];
        }
        
        $pecah = explode('-', $jam_booking);
        $pecah = explode(':', $pecah[0]);
        var_dump($pecah);

        if($s < $pecah[0]){
            echo'false ';
        }else{
            echo"true";
        }
        
        $query = "SELECT DISTINCT tanggal FROM transaksi WHERE tanggal = '2024-04-19' OR tanggal = '2024-04-17' ";
        var_dump($this->db->query($query)->result_array());
    }
}