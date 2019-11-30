<?php

class Category extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->library('form_validation');
        $this->load->model('Category_model');
    }

    public function index()
    {

        $data['title'] = 'Category';
        $data['categori'] = $this->Category_model->GetCategory();
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header', $data);
        $this->load->view('category/v_category', $data);
        $this->load->view('admin/footer');
    }

    public function addCategory()
    {

        $data['title'] = 'Add Category';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $dariDB = $this->Category_model->kodeOtomatis();
        $nourut = substr($dariDB, 4, 1);
        $kodeKategoriSekarang = $nourut + 1;
        $kode = array('kd_kategori' => $kodeKategoriSekarang);
        $convert = implode("", $kode);
        $kat = sprintf("%01s", $convert);
        $data['kode'] = 'Cat-'.$kat;

        $this->form_validation->set_rules('kd_category', 'kd_Category', 'required');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required');

        if($this->form_validation->run() == FALSE){

            $this->load->view('admin/header', $data);
            $this->load->view('category/v_addCategory');
            $this->load->view('admin/footer');
        } else{
            $this->Category_model->addCategory();
            redirect('category');
        }

    }

    public function DeleteCategory($id){
        $this->Category_model->DeleteCategory($id);
        redirect('category');
    }

    public function UpdateCategory($id)
    {
        $data['title'] = 'Update Category';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['categori'] = $this->Category_model->getCategoryById($id);
        $this->form_validation->set_rules('kd_category', 'kd_Category', 'required');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required');

        if($this->form_validation->run() == FALSE){

            $this->load->view('admin/header', $data);
            $this->load->view('category/v_updateCategory', $data);
            $this->load->view('admin/footer');
        } else{
            $this->Category_model->updateCategory();
            redirect('category');
        }
    }
}
