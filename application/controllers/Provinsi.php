<?php

class Provinsi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Provinsi_model');
    }

    public function index(){
        $data['title'] = 'Data Provinsi';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['provinsi'] = $this->Provinsi_model->GetProvinsi();


        $this->load->view('admin/header', $data);
        $this->load->view('admin/provinsi/index');
        $this->load->view('admin/footer');
    }

    public function addProvinsi(){
        $data['title'] = 'Add Provinsi'; 
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $dariDB = $this->Provinsi_model->kodeOtomatis();
        $nourut = substr($dariDB, 5, 2);
        $kodeProvinsiSekarang = $nourut + 1;
        $kode = array('kd_prov' => $kodeProvinsiSekarang);
        $convert = implode("", $kode);
        $kat = sprintf("%02s", $convert);
        $data['kode'] = 'Prov-'.$kat;
        
        $this->form_validation->set_rules('kd_prov', 'Provinsi Code', 'required');
        $this->form_validation->set_rules('nama_provinsi', 'Provinsi Name', 'required');

        if($this->form_validation->run() == FALSE){

            $this->load->view('admin/header', $data);
            $this->load->view('admin/provinsi/v_addProvinsi');
            $this->load->view('admin/footer');
        } else{
            $this->Provinsi_model->addProvinsi();
            redirect('Kota');
        }

        
    }

    public function DeleteProvinsi($id){
        $this->Provinsi_model->DeleteProvinsi($id);
        redirect('Kota');
    }

    public function UpdateProvinsi($id)
    {
        $data['title'] = 'Update Provinsi';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['prov'] = $this->Provinsi_model->getProvinsiById($id);
        $this->form_validation->set_rules('kd_prov', 'Provinsi Code', 'required');
        $this->form_validation->set_rules('nama_provinsi', 'Provinsi Name', 'required');

        if($this->form_validation->run() == FALSE){

            $this->load->view('admin/header', $data);
            $this->load->view('admin/provinsi/v_updateProvinsi', $data);
            $this->load->view('admin/footer');
        } else{
            $this->Provinsi_model->updateProvinsi();
            redirect('Kota');
        }
    }
}