<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Products_model');
        $this->load->model('Transaksi_model');
        $data['countCart'] = $this->Transaksi_model->CountCart();
        Auth_User();
    }
    
    public function Profile($id)
    {
        $data['title'] = 'Profile User'; 
        $this->load->model('Admin_model');
        $data['get'] = $this->Admin_model->GetUsersById($id);
        $this->load->model('Category_model');
        $this->load->model('Transaksi_model');
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->Category_model->GetCategory();
        $data['countCart'] = $this->Transaksi_model->CountCart();
        $this->load->model('Transaksi_model');
        $data['transaksi'] = $this->Transaksi_model->TransaksiById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('user/v_user', $data);
        $this->load->view('templates/footer', $data);
    }


    public function DetailTransaksi($id)
    {
        $data['title'] = 'Detail Transaksi'; 
        $this->load->model('Admin_model');
        $data['get'] = $this->Admin_model->GetUsersById($id);
        $this->load->model('Category_model');
        $this->load->model('Transaksi_model');
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->Category_model->GetCategory();
        $data['countCart'] = $this->Transaksi_model->CountCart();
        $this->load->model('Transaksi_model');
        $data['transaksi'] = $this->Transaksi_model->DetailTransaksi($id);

        $this->load->view('templates/header', $data);
        $this->load->view('user/v_detailTransaksi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function Konfirmasi($id)
    {
        $data = [
            "status" => 'Di Terima'
        ];

        $this->db->where('kd_trans', $id);
        $this->db->update('transaksi', $data);


        
        redirect('User/RiwayatTransaksi','refresh');
        
    }


    public function RiwayatTransaksi()
    {
        $data['title'] = 'Profile User'; 
        $this->load->model('Admin_model');
        $this->load->model('Transaksi_model');
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['countCart'] = $this->Transaksi_model->CountCart();
        $this->load->model('Transaksi_model');
        $data['transaksi'] = $this->Transaksi_model->RiwayatTransaksi();

        $this->load->view('templates/header', $data);
        $this->load->view('user/v_riwayatTransaksi', $data);
        $this->load->view('templates/footer', $data);
    }
}