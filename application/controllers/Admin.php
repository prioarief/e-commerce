<?php

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        // load model
        Auth_Admin();
    }
    public function index()
    {
        $this->load->model('Products_model');
        $this->load->model('Category_model');
        $data['countP'] = $this->Products_model->ProductsCount();
        $data['countC'] = $this->Category_model->CategoryCount();
        $data['categori'] = $this->Category_model->GetCategory();
        $data['countUser'] = $this->Admin_model->countUsers();
        $data['title'] = 'Halaman Admin';

        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header', $data);
        $this->load->view('v_admin', $data);
        $this->load->view('admin/footer');

    }
    public function products()
    {
        $data['title'] = 'Products';
        $this->load->model('Products_model');
        $data['products'] = $this->Products_model->GetAllProducts();
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/product/v_products', $data);
        $this->load->view('admin/footer');
    }
    public function DetailProduct($id)
    {
      $data['title'] = 'Detail Product';
      $this->load->model('Products_model');
      $data['product'] = $this->Products_model->getProductById($id);
      $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();


      $this->load->view('admin/header', $data);
      $this->load->view('admin/product/v_detailProduct', $data);
      $this->load->view('admin/footer');
    }

    public function Users()
    {
        $data['title'] = 'User';
        $data['users']  = $this->Admin_model->getUsers();
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/users/v_users', $data);
        $this->load->view('admin/footer');

    }

    public function Transaksi()
    {
        $this->load->model('Transaksi_model');
        $data['transaksi'] = $this->Transaksi_model->TransaksiAll();
        $data['title'] = 'Riwayat Transaksi';
        $data['users']  = $this->Admin_model->getUsers();
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/transaksi/v_transaksi', $data);
        $this->load->view('admin/footer');
    }
}
