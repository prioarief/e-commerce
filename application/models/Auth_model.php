<?php

class Auth_model extends CI_Model {
    public function kodeOtomatis()
    {       
        $query = $this->db->query("SELECT MAX(kd_konsumen) as kodekonsumen from konsumen");
        $hasil = $query->row();
        return $hasil->kodekonsumen;
    }
}