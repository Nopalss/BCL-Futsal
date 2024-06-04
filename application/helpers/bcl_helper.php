<?php 

function is_logged_in(){
    // instansiasi CI
    $ci = get_instance();
 
    // cek dia login gk
    if (!$ci->session->userdata('email')){// dia iseng access url
        redirect('auth');
    } else{ // dia login
        // // kita ambil cek roll id
        // $roll_id = $ci->session->userdata('roll_id');
        
        // // kita ambil si user berusaha access menu mana
        // $menu = $ci->uri->segment(1);
        
        // // kita ambil dulu id menu nya 
        // $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        // $menu_id = $queryMenu['id'];

        // // kita cek apakah roll ini bisa access menu ini
        // $userAccess = $ci->db->get_where('user_access_menu', [
        //     'roll_id' => $roll_id, 
        //     'menu_id' => $menu_id]);
        // // jika tidak bisa maka diblocked
        // if($userAccess->num_rows() < 1){
        //     redirect('auth/blocked');
        // }
    }
}  
function checked_user_login(){
    $ci = get_instance();
    if (!$ci->session->userdata('email')){
        return "Visitor";
    }else{
        return "Member";
    }
} 
