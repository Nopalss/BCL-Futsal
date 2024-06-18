<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $nama = [
        //     'status' => checked_user_login()
        // ];
        // $this->session->set_userdata($nama);
    }
    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        // $status = 'Sukses';
        // $query = "SELECT * FROM booking WHERE tanggal = '2024-06-15' AND id_lapangan = 1 AND status2 = '$status' ";
        // var_dump($this->db->query($query)->result_array());
        // echo "2024-06-15" < "2024-10-06";
        // $i = 1;
        // $i2 = 341;
        // $lapang1 = 1;
        // $lapang2 = 2;
        // $j1 = 12;
        // $j2 = 13;
        // while($i2<346){
        //     $j1 = $j1 + $i;
        //     $j2 = $j1 + $i;
        //     echo "('BK240201".$i2."', 'P0".$i2."', '".$lapang1."', '2024-06-10', '". $j1.":00 - ". $j2 .":00', 'Lunas', '100000', 'Sukses'),". "<br>";
        //     $i2+= 1;
        // }
        $i = 1;
        while( $i<10){
            echo "('LH24060".$i."', '2024-06-0".$i."', 1100000),". "<br>";
            $i += 1;
        }

        while( $i<17){
            echo "('LH2406".$i."', '2024-06-".$i."', 1100000),". "<br>";
            $i += 1;
        }
        // 

        // $js = date('H'); // ngambil jam sekarang
        // $tanggal = "2024-06-14";
        // $pecah = explode('-', $tanggal); // pecah tanggal
        // // menyamakan tanggal sekarang,   
        // $jam= "09:00 - 10:00";
        // if($pecah[0] == date('Y') && $pecah[1] == date('m') && $pecah[2] == date('d')){
        //     // jika sama maka jam yang ingin di booking user dibandingkan terlebih dahulu  
        //     $pecah = explode('-', $jam);
        //     // var_dump($pecah);
          
        //     $pecah = explode(':', $pecah[0]);
        //     var_dump(intval($pecah[0]) );
        //     $jb = $pecah[0];
        //     // jika jam yang ingin di booking sudah lewat maka mengembalikan false
        //     if(intval($js) == intval($pecah[0]) || intval($js) > intval($pecah[0])){
        //         echo 1;
        //         return false;
        //     }else{// jika tidak true
        //         echo 0;
        //         return true;
        //     }
        // }else{ // jika tanggal tidak sama dengan tanggal sekarang maka mengembalikan true
        //     return true;
        // }
        // if($tanggal !== NULL){
        //     echo date($tanggal);
        // }
        // $query= "SELECT comment.*, user.name, user.image FROM comment JOIN user ON comment.id_user = user.id WHERE comment.id_lapangan = 2 ";
        // var_dump($this->db->query($query)->result_array());
        // if(!$this->modelfutsal->cek_booking(1, '14:00 - 15:00', '2024-05-29')){
        //     echo"Pea";
        // }else{
        //    var_dump($this->modelfutsal->cek_booking(1, '14:00 - 15:00', '2024-05-29'));
        // }
        // echo $this->session->userdata('id_lapangan');
        // $query = "SELECT  booking.*, transaksi.* FROM transaksi 
        // JOIN booking ON transaksi.id_booking = booking.id
        // JOIN lapangan ON booking.id_lapangan = lapangan.id
        // -- JOIN pelanggan ON booking.id_pelanggan = pelanggan.id
        // WHERE transaksi.nota = 'TR240531001'";
        // var_dump($this->db->query($query)->row_array());
        // date_default_timezone_set('Asia/Jakarta');
        // $p = time();
        // $pecah = date('d F Y - H:i:s', $p);
        // $pecah = explode('-', $pecah );
        // var_dump($pecah);
        // $query = "SELECT booking.*, user.id AS id_user , pelanggan.id AS id_pelanggan FROM booking 
        //         JOIN pelanggan ON booking.id_pelanggan = pelanggan.id
        //         JOIN user ON pelanggan.id_user = user.id
        //         WHERE user.id = 7 ";
        // var_dump($this->db->query($query)->result_array()); 
        // $pendapatan = "Rp 2,000,000.00"; 
        // $cut = explode('Rp', $pendapatan);
        //         $cut = explode('.', $cut[1]);
        //         $cut2 = explode(',', $cut[0]);
        //         $pendapatan = intval($cut2[0] . $cut2[1] . $cut2[2]);
        //         echo "<br>";
        //         echo $cut2[2];
        //         echo "<br>";
        //         var_dump($pendapatan);
        // $tanggal = "2024-10-06";
        // $pecah = explode('-', $tanggal);
        // echo(date('d'));
        // echo '0' > '02';
        // if($pecah[1] == date('m') && $pecah[2] >= date('d')){
        //     $data['tanggal'] = $tanggal;
        //     echo "bener";
        //     echo "<br>";
        // }elseif($pecah[1] >= date('m')){
        //     echo "lanjut";
        //     $data['tanggal'] = $tanggal;
        // }else{
        //     echo "salah";
        //     $this->session->set_flashdata('message', '<div class="alert alert-message alert-danger" role="alert"><i class="fas fa-info-circle"></i> Tanggal Tidak Boleh Kurang Dengan Tanggal Sekarang !</div>');
        //     redirect('booking/jadwalBooking');
        // }
        //   $this->session->set_flashdata('message', '<div class="alert alert-message alert-danger" role="alert"><i class="fas fa-info-circle"></i> Tanggal Tidak Boleh Kurang Dengan Tanggal Sekarang !</div>');
        //         redirect('booking/jadwalBooking');
        // echo date('r');
        // if($this->session->userdata('status') == 'Visitor'){
        //     echo"asu";
        // }else{
        //     echo"anjay";
        // }
        // $s = date('y');
        // echo $s;
        // // $tanggal = $this->session->userdata('tanggal');
        // // $pecah = explode('-', $tanggal);
        // // var_dump($pecah);
        // // echo $pecah[0];
        // if(1 <1){
        //     echo "true";
        // }
        // $this->db->distinct('tanggal');
        // $data = $this->db->get('transaksi');
        // // var_dump($data);
        // $query = "SELECT SUM(total) as pendapatan FROM transaksi WHERE tanggal = '2024-04-17'";
        // $exequte = $this->db->query($query)->row_array();
        // // var_dump($exequte);
        // $jam_booking = $this->modelfutsal->get_where('booking', ['tanggal' => "2024-04-18", 'id_lapangan' => 1 ]);
        // print_r($jam_booking);
        // var_dump($jam_booking);

        // foreach($jam_booking as $j){
        //     $jam_booking= $j['jam_mulai'];
        // }
        
        // $pecah = explode('-', $jam_booking);
        // $pecah = explode(':', $pecah[0]);
        // var_dump($pecah);

        // if($s < $pecah[0]){
        //     echo'false ';
        // }else{
        //     echo"true";
        // }
        
    //     $query = "SELECT DISTINCT tanggal FROM transaksi WHERE tanggal = '2024-04-19' OR tanggal = '2024-04-17' ";
    //     // var_dump($this->db->query($query)->result_array());
        
        
    //     $query = "SELECT SUM(transaksi.total) as pendapatan FROM transaksi 
    //             JOIN booking ON transaksi.id_booking = booking.id WHERE transaksi.tanggal = '2024-04-21' AND booking.id_lapangan = '1' AND booking.status ='Lunas'";
    //     var_dump($this->db->query($query)->row_array());
    
//     $data= [
//         'lapangan' => ['Standar', 'Sintetis'],
//         'pendapatan' => [100000, 100000]
//     ];
//    echo $data['lapangan'][0];
//     var_dump($data);

// $query = "SELECT COUNT(transaksi.nota) as pendapatan FROM transaksi 
// JOIN booking ON transaksi.id_booking = booking.id WHERE transaksi.tanggal = '2024-04-21' AND booking.id_lapangan = '1' AND booking.status ='Lunas'";
// var_dump($this->db->query($query)->row_array());

// $p = "Rp 100.000,00";
// $cut = explode('Rp', $p);
// $cut = explode('.', $cut[1]);
// var_dump($cut);
// $cut2 = explode(',', $cut[1]);
// var_dump($cut2);
// echo "<br>";
// $total = intval($cut[0].$cut2[0]) ;

// $total = $total[1] . $pisah[0];

// $pendapatan = "SELECT SUM(pendapatan)AS pendapatan FROM laporan WHERE tanggal LIKE '%2024-05%'";
// $pendapatan = $this->db->query($pendapatan)->row_array();
// var_dump($pendapatan);

// date_default_timezone_set('Asia/Jakarta');
// $d = date('d');
// echo $d;
// $ab = date('t');
// var_dump($ab);
// var_dump(true);
// echo $ab + 1;
// if("31" === $ab){
//     echo " l";
// }else{
//     echo " kak";
// }
// }
// ('LH240507', '2024-05-07', '2000000'), 
//     ('LH240508', '2024-05-08', '2000000'),
//     ('LH240509', '2024-05-09', '2000000'),
//     ('LH240510', '2024-05-10', '2000000'), 
//     ('LH240511', '2024-05-11', '2000000'),
//     ('LH240512', '2024-05-12', '2000000'),

// $i = 7;
// for($i; $i<32; $i++){
//     echo "('LH2405".$i."'".", '2024-05-".$i."'".", '2000000'), ";
//     echo "<br>";
// }
// $data = $this->modelfutsal->get_laporanH('2024-05');
//         foreach($data as $h){
//             $pendapatan[] = $h['pendapatan'];
//         }
//         var_dump($pendapatan);
// $query = "SELECT COUNT(transaksi.nota) as pemakaian FROM transaksi 
// JOIN booking ON transaksi.id_booking = booking.id WHERE transaksi.tanggal LIKE '%2024-05%' AND booking.id_lapangan = 2 AND booking.status ='Lunas'";
// $query = $this->db->query($query)->row_array();
// var_dump($query);
// $y= date('Y');
// $query = "SELECT * FROM laporan_bulan WHERE tanggal LIKE '%$y%'";
// $query= $this->db->query($query)->result_array();

// var_dump($query);
// foreach($query as $q){
//     echo $q['pendapatan'];
}
}
