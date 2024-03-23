<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_futsal extends CI_Model {
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

}