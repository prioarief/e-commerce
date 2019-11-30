<?php

class Admin_model extends CI_Model {
    public function kodeOtomatis()
    {       
        $query = $this->db->query("SELECT MAX(kd_admin) as kodeadmin from admin");
        $hasil = $query->row();
        return $hasil->kodeadmin;
    }

    public function getUsers()
    {
        return $this->db->get('konsumen')->result_array();
    }

    
    public function countUsers()
    {
        return count($this->db->get('konsumen')->result_array());
    }

    public function GetUsersById($id)
    {
        return $this->db->get_where('konsumen', ['kd_konsumen' => $id])->row_array();
    }


}