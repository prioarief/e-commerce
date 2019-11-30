<?php

class Kota extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Provinsi_model');
        $this->load->model('Kota_model');
    }

    public function index(){
        $data['title'] = 'Data Kota';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kota'] = $this->Kota_model->GetAllKota();


        $this->load->view('admin/header', $data);
        $this->load->view('admin/kota/index');
        $this->load->view('admin/footer');
    }

    public function addKota(){ 
        $data['title'] = 'Add Kota';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['prov'] = $this->Provinsi_model->GetProvinsi();

        $dariDB = $this->Kota_model->kodeOtomatis();
        $nourut = substr($dariDB, 5, 2);
        $kodeKotaSekarang = $nourut + 1;
        $kode = array('kd_kota' => $kodeKotaSekarang);
        $convert = implode("", $kode);
        $kat = sprintf("%02s", $convert);
        $data['kode'] = 'Kota-'.$kat;
        
        $this->form_validation->set_rules('kd_kota', 'City Code', 'required');
        $this->form_validation->set_rules('nama_kota', 'City Name', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');

        if($this->form_validation->run() == FALSE){

            $this->load->view('admin/header', $data);
            $this->load->view('admin/Kota/v_addKota');
            $this->load->view('admin/footer');
        } else{
            $this->Kota_model->addKota();
            redirect('Kota');
        }

        
    }

    public function DeleteKota($id){
        $this->Kota_model->DeleteKota($id);
        redirect('Kota');
    }

    public function UpdateKota($id)
    {
        $data['title'] = 'Update Kota';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['kota'] = $this->Kota_model->getKotaById($id);
        $data['prov'] = $this->Provinsi_model->GetProvinsi();
        $this->form_validation->set_rules('kd_kota', 'City Code', 'required');
        $this->form_validation->set_rules('nama_kota', 'City Name', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');

        if($this->form_validation->run() == FALSE){

            $this->load->view('admin/header', $data);
            $this->load->view('admin/Kota/v_updateKota', $data);
            $this->load->view('admin/footer');
        } else{
            $this->Kota_model->updateKota();
            redirect('Kota');
        }
    }
}