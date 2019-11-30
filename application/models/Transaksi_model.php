<?php

class Transaksi_model extends CI_Model
{
    public function GetCart()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT barang.*, keranjang.* FROM barang INNER JOIN keranjang
        ON keranjang.kd_brg = barang.kd_brg";

        return $this->db->query($query)->result_array();

        
    }

    public function GetCartShop()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where('tampilkeranjang', ['kd_konsumen' => $id])->result_array();
        
    }

    public function CountCart()
    {
        $id = $this->session->userdata('id');
        return count($this->db->get_where('tampilkeranjang', ['kd_konsumen' => $id])->result_array());
    }


    public function GetCartById($id)
    {
        return $this->db->get_where('tampilkeranjang', ['kd_keranjang' => $id])->result_array();
    }

    
    public function GetProduct($id)
    {
        return $this->db->get_where('barang', ['kd_brg' => $id])->result_array();
    }

    public function TransaksiAll()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function TransaksiById($id)
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where('transaksi', ['kd_konsumen' => $id, 'status' => 'Di kirim'])->result_array();
    }

    public function DetailTransaksi($id)
    {
        return $this->db->get_where('detail_transaksi', ['kd_trans' => $id])->result_array();
    }

    public function RiwayatTransaksi()
    {
        return $this->db->get_where('transaksi', ['kd_konsumen' => $this->session->userdata('id'), 'status' => 'Di Terima'])->result_array();
    }


}