<?php

class Products_model extends CI_Model {
    public function GetProducts(){
        return $this->db->get('barang')->result_array();
    }

    public function GetAllProducts(){
        // return $this->db->get('tampilproduct')->result_array();
        $query = "SELECT barang.*, kategori.* from barang INNER JOIN kategori ON kategori.kd_kategori = barang.kd_kategori";
        return $this->db->query($query)->result_array();
    }

    public function ProductsCount()
    {
        // $query = "SELECT COUNT(nama_brg) FROM `barang`";
        // return $this->db->query($query)->result_array();

        return count($this->db->get('barang')->result_array());
    }

    public function kodeOtomatis()
    {       
        $query = $this->db->query("SELECT MAX(kd_brg) as kodebarang from barang");
        $hasil = $query->row();
        return $hasil->kodebarang;

        
    }

    public function addProduct()
    {
        $config['upload_path'] = './assets/Users/img/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = '5120';  //5MB max
        $config['max_width']  = '3840';
        $config['max_height']  = '2160 ';
        $config['encrypt_name'] = TRUE; 

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors());
            echo "error";
        }
        else{
            $gambar= array('upload_data' => $this->upload->data());

            $data = [
                "kd_brg" => $this->input->post("kd_brg", true),
                "nama_brg" => $this->input->post("nama_product", true),
                "gambar" => $gambar['upload_data']['file_name'],
                "bahan" => $this->input->post("bahan", true),
                "warna" => $this->input->post("warna", true),
                "harga" => $this->input->post("harga", true),
                "keyword" => $this->input->post("keyword", true),
                "kd_kategori" => $this->input->post("kategori", true),
                "diskon" => $this->input->post("diskon", true),
                "ukuran" => $this->input->post("ukuran", true),
                "berat" => $this->input->post("berat", true),
                "stok" => $this->input->post("stok", true)

            ];

            $this->db->insert('barang', $data);
        }
    }

    public function DeleteProduct($id)
    {
        $this->db->where('kd_brg', $id);
        $this->db->delete('barang');
    }

    public function GetProductById($id)
    {
        return $this->db->get_where('detail_product', ['kd_brg' => $id])->row_array(); 
    }


    
    public function GetProductByIdProduct($id)
    {
        return $this->db->get_where('detail_product', ['kd_brg' => $id])->result_array(); 
    }




    public function updateProduct()
    {
        $data = [
            "nama_brg" => $this->input->post("nama_product", true),
            "bahan" => $this->input->post("bahan", true),
            "warna" => $this->input->post("warna", true),
            "harga" => $this->input->post("harga", true),
            "keyword" => $this->input->post("keyword", true),
            "kd_kategori" => $this->input->post("kategori", true),
            "diskon" => $this->input->post("diskon", true),
            "ukuran" => $this->input->post("ukuran", true),
            "berat" => $this->input->post("berat", true),
            "stok" => $this->input->post("stok", true)
        ];

        if (empty($_FILES['gambar']['name'])) {

            $data = [
                "nama_brg" => $this->input->post("nama_product", true),
                "bahan" => $this->input->post("bahan", true),
                "warna" => $this->input->post("warna", true),
                "harga" => $this->input->post("harga", true),
                "keyword" => $this->input->post("keyword", true),
                "kd_kategori" => $this->input->post("kategori", true),
                "diskon" => $this->input->post("diskon", true),
                "ukuran" => $this->input->post("ukuran", true),
                "berat" => $this->input->post("berat", true),
                "stok" => $this->input->post("stok", true)
            ];
            $this->db->where('kd_brg', $this->input->post('kd_brg'));
            $this->db->update('barang', $data);
        }else {
          $config['upload_path'] = './assets/Users/img/product/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size']  = '100';
          $config['max_width']  = '1024';
          $config['max_height']  = '768';
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload('gambar')){
              $error = array('error' => $this->upload->display_errors());
              echo "error";
          }
          else{
              $gambar= array('upload_data' => $this->upload->data());

              $data = [
                  "nama_brg" => $this->input->post("nama_product", true),
                  "gambar" => $gambar['upload_data']['file_name'],
                  "bahan" => $this->input->post("bahan", true),
                  "warna" => $this->input->post("warna", true),
                  "harga" => $this->input->post("harga", true),
                  "keyword" => $this->input->post("keyword", true),
                  "kd_kategori" => $this->input->post("kategori", true),
                  "diskon" => $this->input->post("diskon", true),
                  "ukuran" => $this->input->post("ukuran", true),
                  "berat" => $this->input->post("berat", true),
                  "stok" => $this->input->post("stok", true)
              ];

              // $this->db->where('kd_brg', $this->input->post('kd_brg'));
              // $this->db->update('barang', $data);



              // hapus foto pada direktori
              $path = './assets/Users/img/product/';
              $fotolama = $this->input->post('fotolama');
              @unlink($path.$fotolama);

              $this->db->where('kd_brg', $this->input->post('kd_brg'));
              $this->db->update('barang', $data);
          }
        }
        //


    }


    public function Search($keyword)
    {
        $this->db->select('*');    
        $this->db->from('detail_product')  ;
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('nama_kategori', $keyword);
        return $this->db->get()->result_array();
    }
}
