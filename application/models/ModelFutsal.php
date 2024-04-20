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
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function get_where($table, $id)
    {
        return $this->db->get_where($table, $id)->result_array();
    }

    // public function get_status(){

    // }

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
        $this->db->order_by("id", "DESC");
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
        $this->db->order_by("id", "DESC");
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
        $this->db->order_by("nota", "DESC");
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
    public function auto_idlaporan()
    {
        $wordId = "LH";
        $y = date('y');
        $m = date('m');
        $d = date('d');
        $newTanggal = $y . $m . $d;
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
        $t = $d - 1;
        $query = "SELECT DISTINCT tanggal FROM transaksi WHERE tanggal = '$y-$m-$t' OR tanggal = '$y-$m-$d' ORDER BY tanggal ASC";
        return $this->db->query($query)->result_array();
    }
    
    public function get_pendapatan($tanggal){
        $query = "SELECT SUM(total) as pendapatan FROM transaksi WHERE tanggal = '$tanggal'";
        return $this->db->query($query)->row_array();
    }

    public function seleksiJ($jam, $tanggal){
        date_default_timezone_set('Asia/Jakarta');
        $js = date('H');
        $pecah = explode('-', $tanggal);
        if($pecah[0] == date('Y') && $pecah[1] == date('m') && $pecah[2] == date('d')){
            $pecah = explode('-', $jam);
            $pecah = explode(':', $pecah[0]);
    
            if($js > $pecah[0] ){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    }
}
