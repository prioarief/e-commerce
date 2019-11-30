<?php

class Ongkir_model extends CI_Model
{
    public function getAllOngkir()
    {
        $query = "SELECT bk.*, japeng.*, jepeng.*, kota.nama_kota FROM biaya_kirim bk, jasa_pengiriman japeng, jenis_pengiriman jepeng, kota
        WHERE bk.kd_jp = jepeng.kd_jp AND japeng.kd_jasa = jepeng.kd_jasa AND bk.kd_kota = kota.kd_kota";

        return $this->db->query($query)->result_array();
    }

    public function getCode()
    {
        $query = $this->db->query("SELECT MAX(kd_bk) as kodeongkir from biaya_kirim");
        $hasil = $query->row();
        return $hasil->kodeongkir;
    }

    public function getOngkirById($id)
    {
        return $this->db->get_where('biaya_kirim', ['kd_bk' => $id])->row_array();
    }

    
    public function getOngkirByIdKota($id)
    {
        return $this->db->get_where('ongkir', ['kd_kota' => $id])->result();
    }



    public function AddOngkir()
    {
        $data = [
            'kd_bk' => $this->input->post('kd_bk'),
            'kd_jp' => $this->input->post('jasa'),
            'kd_kota' => $this->input->post('kota'),
            'biaya_kirim' => $this->input->post('biaya_kirim')
        ];

        $this->db->insert('biaya_kirim', $data);
    }

    public function EditOngkir()
    {
        $data = [
            'kd_bk' => $this->input->post('kd_bk'),
            'kd_jp' => $this->input->post('jasa'),
            'kd_kota' => $this->input->post('kota'),
            'biaya_kirim' => $this->input->post('biaya_kirim')
        ];
        
        $this->db->where('kd_bk', $this->input->post('kd_bk_awal'));
        $this->db->update('biaya_kirim', $data);
    }

    public function DeleteOngkir($id)
    {
        $this->db->where('kd_bk', $id);
        $this->db->delete('biaya_kirim');
    }
}
