<?php 

class Kota_model extends CI_Model{
    public function GetKota(){
        return $this->db->get('Kota')->result_array();
    }
    
    public function GetAllKota(){
        $query = "SELECT kota.* , provinsi.* from kota INNER JOIN provinsi ON provinsi.kd_prov = kota.kd_prov";
        return $this->db->query($query)->result_array();
    }

    public function addKota()
    {
        $data = [
            "kd_kota" => $this->input->post("kd_kota", true),
            "nama_kota" => $this->input->post("nama_kota", true),
            "kd_prov" => $this->input->post("provinsi", true)
        ];

        $this->db->insert('Kota', $data);
    }

    public function kodeOtomatis()
    {       
        $query = $this->db->query("SELECT MAX(kd_kota) as kodekota from Kota");
        $hasil = $query->row();
        return $hasil->kodekota;
    }

    public function DeleteKota($id)
    {
        $this->db->where('kd_kota', $id);
        $this->db->delete('Kota');
    }

    public function GetKotaById($id)
    {
        return $this->db->get_where('Kota', ['kd_kota' => $id])->row_array();
    }

    
    public function GetKotaByIdProvinsi($id)
    {
        return $this->db->get_where('kota', ['kd_prov' => $id])->result();
    }


    public function updateKota()
    {
        $data = [
            "kd_kota" => $this->input->post("kd_kota", true),
            "nama_kota" => $this->input->post("nama_kota", true),
            "kd_prov" => $this->input->post("provinsi", true)
        ];

        $this->db->where('kd_kota', $this->input->post('kd_kota_awal')); 
        $this->db->update('Kota', $data);
    }
}