<?php

class Category_model extends CI_Model {
    public function GetCategory(){
        return $this->db->get('kategori')->result_array();
    }

    public function addCategory()
    {
        $data = [
            "kd_kategori" => $this->input->post("kd_category", true),
            "nama_kategori" => $this->input->post("category_name", true)
        ];

        $this->db->insert('kategori', $data);
    }

    public function CategoryCount()
    {
        // $query = "SELECT COUNT(nama_kategori) FROM `kategori`";
        // return $this->db->query($query)->result_array();

        return count($this->db->get('kategori')->result_array());
    }

    public function kodeOtomatis()
    {       
        $query = $this->db->query("SELECT MAX(kd_kategori) as kodekategori from kategori");
        $hasil = $query->row();
        return $hasil->kodekategori;
    }

    public function DeleteCategory($id)
    {
        $this->db->where('kd_kategori', $id);
        $this->db->delete('kategori');
    }

    public function GetCategoryById($id)
    {
        return $this->db->get_where('kategori', ['kd_kategori' => $id])->row_array();
    }

    public function updateCategory()
    {
        $data = [
            "kd_kategori" => $this->input->post("kd_category", true),
            "nama_kategori" => $this->input->post("category_name", true)
        ];

        $this->db->where('kd_kategori', $this->input->post('kd_category')); 
        $this->db->update('kategori', $data);
    }
}