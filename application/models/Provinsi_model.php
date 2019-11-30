<?php 

class Provinsi_model extends CI_Model{
    public function GetProvinsi(){
        return $this->db->get('provinsi')->result_array();
    }

    public function addProvinsi()
    {
        $data = [
            "kd_prov" => $this->input->post("kd_prov", true),
            "nama_prov" => $this->input->post("nama_provinsi", true)
        ];

        $this->db->insert('provinsi', $data);
    }

    public function kodeOtomatis()
    {       
        $query = $this->db->query("SELECT MAX(kd_prov) as kodeprovinsi from provinsi");
        $hasil = $query->row();
        return $hasil->kodeprovinsi;
    }

    public function DeleteProvinsi($id)
    {
        $this->db->where('kd_prov', $id);
        $this->db->delete('provinsi');
    }

    public function GetProvinsiById($id)
    {
        return $this->db->get_where('provinsi', ['kd_prov' => $id])->row_array();
    }

    public function updateProvinsi()
    {
        $data = [
            "kd_prov" => $this->input->post("kd_prov", true),
            "nama_prov" => $this->input->post("nama_provinsi", true)
        ];

        $this->db->where('kd_prov', $this->input->post('kd_prov_awal')); 
        $this->db->update('provinsi', $data);
    }
}