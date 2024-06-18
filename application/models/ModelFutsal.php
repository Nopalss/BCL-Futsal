<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelFutsal extends CI_Model
{
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function get($table)
    {
        return $this->db->get($table)->result_array();
    }
    public function getById($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }
    public function delete($table, $column, $data)
    {
        $this->db->where($column, $data);
        $this->db->delete($table);
    }
    public function getMyBooking($id){
        $query = "SELECT booking.*, user.id AS id_user, pelanggan.id AS id_pelanggan, transaksi.date_tr AS date_tr FROM booking 
                JOIN pelanggan ON booking.id_pelanggan = pelanggan.id
                JOIN transaksi ON booking.id = transaksi.id_booking
                JOIN user ON pelanggan.id_user = user.id
                WHERE user.id =$id AND transaksi.status2 != 'Batal'";
        return $this->db->query($query)->result_array();     
    }
    public function get_where($table, $id)
    {
        return $this->db->get_where($table, $id)->result_array();
    }
    public function get_idJam($jam)
    {
        $this->db->select("id_jam");
        $this->db->from("jam");
        $where = ['jam' => $jam];
        $this->db->where($where);
        return $this->db->get();
    }
    public function getBooking($id)
    {
        $query = "SELECT `booking`.*, `lapangan`.*, `pelanggan`.*
                FROM `booking` 
                JOIN `lapangan` ON `booking`.`id_lapangan` = `lapangan`.`id`
                JOIN `pelanggan` ON `booking`.`id_pelanggan` = `pelanggan`.`id`
                WHERE `booking`.`id` = '$id'";
        return $this->db->query($query)->row_array();
    }
    public function auto_idbooking()
    {
        $this->db->select('RIGHT(id,3) as idBooking', false);
        $this->db->order_by("idBooking", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('booking');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id = intval($data->idBooking) + 1;
        } else {
            $id  = 1;
        }

        $numberId = str_pad($id, 3, "0", STR_PAD_LEFT);
        $wordId = "BK";
        $y = date('y');
        $m = date('m');
        $d = date('d');
        $newTanggal = $y . $m . $d;
        $newId  = $wordId . $newTanggal . $numberId;
        return $newId;
    }
    public function auto_idpelanggan()
    {
        $this->db->select('RIGHT(id,4) as idPelanggan', false);
        $this->db->order_by("idPelanggan", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('pelanggan');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id = intval($data->idPelanggan) + 1;
        } else {
            $id  = 1;
        }

        $numberId = str_pad($id, 4, "0", STR_PAD_LEFT);
        $wordId = "P";
        $newId  = $wordId . $numberId;
        return $newId;
    }
    public function auto_nota()
    {
        $this->db->select('RIGHT(nota,3) as idTransaksi', false);
        $this->db->order_by("idTransaksi", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('transaksi');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id = intval($data->idTransaksi) + 1;
        } else {
            $id  = 1;
        }
        $numberId = str_pad($id, 3, "0", STR_PAD_LEFT);
        $wordId = "TR";
        $y = date('y');
        $m = date('m');
        $d = date('d');
        $newTanggal = $y . $m . $d;
        $newId  = $wordId . $newTanggal . $numberId;
        return $newId;
    }
    public function auto_idAkun()
    {
        $this->db->select('RIGHT(id,3) as idAkun', false);
        $this->db->order_by("idAkun", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('user');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $id = intval($data->idAkun) + 1;
        } else {
            $id  = 1;
        }
        $numberId = str_pad($id, 4, "0", STR_PAD_LEFT);
        $wordId = "A";
        $newId  = $wordId . $numberId;
        return $newId;
    }
    public function auto_idlaporanH()
    {
        $wordId = "LH";
        $y = date('y');
        $m = date('m');
        $d = date('d');
        $newTanggal = $y . $m . $d;
        $newId  = $wordId . $newTanggal;
        return $newId;
    }
    public function auto_idlaporanB()
    {
        $wordId = "LB";
        $y = date('Y');
        $m = date('m');
        $newTanggal = $y . $m;
        $newId  = $wordId . $newTanggal;
        return $newId;
    }
    public function jamSelesai($jam_mulai, $durasi)
    {
        $jam_mulai = intval($jam_mulai);
        $durasi = intval($durasi);
        $tambah = $jam_mulai + $durasi;
        $jam_selesai = $this->db->get_where('jam', ['id_jam' => $tambah])->row_array();
        return $jam_selesai;
    }
    public function get_tanggal(){
        date_default_timezone_set('Asia/Jakarta');
        $y = date('Y');
        $m = date('m');
        $d = date('d');
        $query = "SELECT DISTINCT tanggal FROM transaksi WHERE tanggal = '$y-$m-$d' AND statuss = 'Belum' ORDER BY tanggal ASC";
        return $this->db->query($query)->result_array();
    }  
    public function get_pendapatan($tanggal){
        $query = "SELECT SUM(total) as pendapatan FROM transaksi WHERE tanggal = '$tanggal' AND status2 != 'Batal'";
        return $this->db->query($query)->row_array();
    }
    public function seleksiJ($jam, $tanggal){
        date_default_timezone_set('Asia/Jakarta');
        $js = date('H'); // ngambil jam sekarang
        $pecah = explode('-', $tanggal); // pecah tanggal
        // menyamakan tanggal sekarang,   
        if($pecah[0] == date('Y') && $pecah[1] == date('m') && $pecah[2] == date('d')){
            // jika sama maka jam yang ingin di booking user dibandingkan terlebih dahulu  
            $pecah = explode('-', $jam);
            $pecah = explode(':', $pecah[0]);
            // jika jam yang ingin di booking sudah lewat maka mengembalikan false
            if(intval($js) == intval($pecah[0]) || intval($js) > intval($pecah[0])){
                return false;
            }else{// jika tidak true
                return true;
            }
        }else{ // jika tanggal tidak sama dengan tanggal sekarang maka mengembalikan true
            return true;
        }
    }
    public function cek_booking($id_lapangan, $jam_mulai, $tanggal){
        $query = "SELECT * FROM booking WHERE id_lapangan = $id_lapangan AND jam_mulai = '$jam_mulai' AND tanggal = '$tanggal' AND status2 != 'Batal'";
        return $this->db->query($query)->row_array();
    }
    public function jam_lapor(){
        date_default_timezone_set('Asia/Jakarta');
        $jam = date('H');

        if($jam >= 22){
            return true;
        }else{
            return false;
        }
        // return true;
    }
    public function get_lapangan($tanggal, $lapangan){
        $query = "SELECT transaksi.nota as nota, booking.jam_mulai as jam, transaksi.total as total FROM transaksi 
                JOIN booking ON transaksi.id_booking = booking.id WHERE transaksi.tanggal = '$tanggal' AND booking.id_lapangan = '$lapangan' AND booking.status ='Lunas' AND booking.status2 != 'Batal'";
        return $this->db->query($query)->result_array();
    }
    public function get_pemakaiLapangan($tanggal,$lapangan){
        $query = "SELECT COUNT(transaksi.nota) as pemakaian FROM transaksi 
                JOIN booking ON transaksi.id_booking = booking.id WHERE transaksi.tanggal LIKE '%$tanggal%' AND booking.id_lapangan = $lapangan AND booking.status ='Lunas' AND booking.status2 != 'Batal'";
        return $this->db->query($query)->row_array();
    }
    public function get_pendapatanLapangan($tanggal,$sr, $ss){
        $standar = "SELECT SUM(transaksi.total) as pendapatan FROM transaksi 
                JOIN booking ON transaksi.id_booking = booking.id WHERE transaksi.tanggal LIKE '%$tanggal%' AND booking.id_lapangan = '$sr' AND booking.status ='Lunas' AND booking.status2 != 'Batal'";
        $standar = $this->db->query($standar)->row_array();
        $sintetis = "SELECT SUM(transaksi.total) as pendapatan FROM transaksi 
                JOIN booking ON transaksi.id_booking = booking.id WHERE transaksi.tanggal LIKE '%$tanggal%' AND booking.id_lapangan = '$ss' AND booking.status ='Lunas' AND booking.status2 != 'Batal'";
        $sintetis = $this->db->query($sintetis)->row_array();
        return [$standar['pendapatan'], $sintetis['pendapatan']];
    }
    public function pendapatanBulan(){
        date_default_timezone_set('Asia/Jakarta');
        $m = date('m');
        $y = date('Y');
        $pendapatan = "SELECT SUM(pendapatan) AS pendapatan FROM laporan WHERE tanggal LIKE '%$y-$m%'";
        $pendapatan = $this->db->query($pendapatan)->row_array();
        $pendapatan = $pendapatan['pendapatan'];
        return $pendapatan;
    }
    public function akhirBulan(){
        date_default_timezone_set('Asia/Jakarta');
        $d = date('d');
        $ab = date('t');
        if($d == $ab){
            return true;
        }else{
            return false;
        }
    }
    public function get_laporanH($tanggal){
        $query = "SELECT * FROM laporan WHERE tanggal LIKE '%$tanggal%'";
        return $this->db->query($query)->result_array();
    }

    public function jumlah($table, $attr){
        $query = "SELECT COUNT($attr) as total FROM $table";
        return $this->db->query($query)->row_array();
    }
    public function total($table, $attr){
        $query = "SELECT SUM($attr) as total FROM $table";
        return $this->db->query($query)->row_array();
    }
    public function get_pendapatan_bulan(){
        $y= date('Y');
        $query = "SELECT * FROM laporan_bulan WHERE tanggal LIKE '%$y%' ORDER BY tanggal ASC";
        return $this->db->query($query)->result_array();
    }
    public function get_comment($id){
        $query= "SELECT comment.*, user.name, user.image FROM comment JOIN user ON comment.id_user = user.id WHERE comment.id_lapangan = $id ORDER BY comment.id DESC";
        return $this->db->query($query)->result_array();
    }
    public function get_detailTransaksi($pelanggan){
        $query = "SELECT pelanggan.*, booking.*, transaksi.* FROM transaksi 
                JOIN booking ON transaksi.id_booking = booking.id
                JOIN pelanggan ON booking.id_pelanggan = pelanggan.id
                WHERE booking.id_pelanggan = '$pelanggan'";
        return $this->db->query($query)->row_array();
    }
    public function get_jam_booking($tanggal,$lapangan){
        $query = "SELECT * FROM booking WHERE tanggal = '$tanggal' AND id_lapangan = $lapangan AND status2 != 'Batal'";
        return $this->db->query($query)->result_array();
    }
    public function get_notif($id){
        $query = "SELECT * FROM notif WHERE id_user = '$id' ORDER BY jam ASC";
        return $this->db->query($query)->result_array();
    }
}