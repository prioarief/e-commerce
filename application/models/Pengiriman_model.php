<?php

class Pengiriman_model extends CI_Model
{
    public function GetAllPengiriman()
    {
        $query = "SELECT japeng.*, jepeng.* FROM jasa_pengiriman japeng INNER JOIN jenis_pengiriman jepeng
        ON japeng.kd_jasa = jepeng.kd_jasa";

        return $this->db->query($query)->result_array();
    }

    
    public function GetJasaPengiriman()
    {
        return $this->db->get('jasa_pengiriman')->result_array();
    }

    
    public function GetJasaPengirimanById($id)
    {
        return $this->db->get_where('jasa_pengiriman', ['kd_jasa' => $id])->row_array();
    }

    
    public function GetJenisPengirimanById($id)
    {
        return $this->db->get_where('jenis_pengiriman', ['kd_jp' => $id])->row_array();
    }

    
    public function KodeJasaPengiriman()
    {
        $query = $this->db->query("SELECT MAX(kd_jasa) as kodejasa from jasa_pengiriman");
        $hasil = $query->row();
        return $hasil->kodejasa;
    }

    
    public function KodeJenisPengiriman()
    {
        $query = $this->db->query("SELECT MAX(kd_jp) as kodejp from jenis_pengiriman");
        $hasil = $query->row();
        return $hasil->kodejp;
    }


    public function AddJasaPengiriman()
    {
        $data = [
            "kd_jasa" => $this->input->post("kd_jasa", true),
            "nama_jasa" => $this->input->post("jasa", true)
        ];

        $this->db->insert('Jasa_pengiriman', $data);
    }

    
    public function AddJenisPengiriman()
    {
        $data = [
            "kd_jp" => $this->input->post("kd_jp", true),
            "nama_jp" => $this->input->post("jenis", true),
            "kd_jasa" => $this->input->post("jasa", true)
        ];

        $this->db->insert('Jenis_pengiriman', $data);
    }


    public function UpdateJasaPengiriman()
    {
        $data = [
            "kd_jasa" => $this->input->post("kd_jasa", true),
            "nama_jasa" => $this->input->post("jasa", true)
        ];

        $this->db->where('kd_jasa', $this->input->post('kd_jasa_awal')); 
        $this->db->update('Jasa_pengiriman', $data);
    }

    public function UpdateJenisPengiriman()
    {
        $data = [
            "kd_jp" => $this->input->post("kd_jp", true),
            "nama_jp" => $this->input->post("jenis", true),
            "kd_jasa" => $this->input->post("jasa", true)
        ];

        $this->db->where('kd_jp', $this->input->post('kd_jp_awal')); 
        $this->db->update('Jenis_pengiriman', $data);
    }


    

    public function GetJenisPengiriman()
    {
        $query = "SELECT japeng.*, jepeng.* FROM jasa_pengiriman japeng INNER JOIN jenis_pengiriman jepeng
        ON japeng.kd_jasa = jepeng.kd_jasa";

        return $this->db->query($query)->result_array();
    }

    public function HapusJasaPengiriman($id)
    {
        $this->db->where('kd_jasa', $id);
        $this->db->delete('Jasa_Pengiriman');
    }

    
    public function HapusJenisPengiriman($id)
    {
        $this->db->where('kd_jp', $id);
        $this->db->delete('Jenis_Pengiriman');
    }


}