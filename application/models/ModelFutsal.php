<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelFutsal extends CI_Model {
    public function insert($table, $data){
        $this->db->insert($table, $data);
    }
    public function get($table){
        return $this->db->get($table)->result_array();
    }
    public function getById($table, $where){
        return $this->db->get_where($table, $where)->row_array();
    }
    public function delete($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getSubMenu(){
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }

   public function get_where($table,$id){
    return $this->db->get_where($table, $id)->result();
   }

   public function auto_idbooking()
   {
       $this->db->select('RIGHT(id,4) as idBooking', false);
       $this->db->order_by("id", "DESC");
       $this->db->limit(1);
       $query = $this->db->get('booking');

       if ($query->num_rows() <> 0) {
           $data = $query->row();
           $id = intval($data->idBooking) + 1;
       } else {
           $id  = 1;
       }

       $numberId = str_pad($id, 4, "0", STR_PAD_LEFT);
       $wordId = "B";
       $newId  = $wordId . $numberId;
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
   public function auto_idtransaksi()
   {
       $this->db->select('RIGHT(id,4) as idTransaksi', false);
       $this->db->order_by("id", "DESC");
       $this->db->limit(1);
       $query = $this->db->get('transaksi');

       if ($query->num_rows() <> 0) {
           $data = $query->row();
           $id = intval($data->idTransaksi) + 1;
       } else {
           $id  = 1;
       }

       $numberId = str_pad($id, 4, "0", STR_PAD_LEFT);
       $wordId = "T";
       $newId  = $wordId . $numberId;
       return $newId;
   }
}