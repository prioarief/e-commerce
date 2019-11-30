<?php

class Ongkir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Ongkir_model');
        $this->load->model('Pengiriman_model');
        $this->load->model('Kota_model');
    }

    Public function index()
    {
        $data['title'] = 'Data Ongkir';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['ongkir'] = $this->Ongkir_model->getAllOngkir();


        $this->load->view('admin/header', $data);
        $this->load->view('admin/Ongkir/index', $data);
        $this->load->view('admin/footer');
    }


    public function AddOngkir()
    {
        $data['title']      = 'Add Ongkir';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['kota']       = $this->Kota_model->GetKota();
        $data['pengiriman'] = $this->Pengiriman_model->GetAllPengiriman();


        $dariDB = $this->Ongkir_model->getCode();
        $nourut = substr($dariDB, 3, 2);
        $kodeOngkiraSekarang = $nourut + 1;
        $kode = array('kd_bk' => $kodeOngkiraSekarang);
        $convert = implode("", $kode);
        $kat = sprintf("%02s", $convert);
        $data['kode'] = 'BK-'.$kat;

        $this->form_validation->set_rules('kd_bk' , 'Ongkir Code', 'required');
        $this->form_validation->set_rules('jasa' , 'Jenis Pengiriman Code', 'required');
        $this->form_validation->set_rules('kota' , 'City Code', 'required');
        $this->form_validation->set_rules('biaya_kirim' , 'Cost Shipping', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/ongkir/v_addOngkir', $data);
            $this->load->view('admin/footer');
        }
        else{
            $this->Ongkir_model->AddOngkir();
            redirect('Ongkir');
        }
    }

    public function HapusOngkir($id)
    {
        $this->Ongkir_model->DeleteOngkir($id);
        redirect('Ongkir');
    }

    public function EditOngkir($id)
    {
        $data['title']      = 'Edit Ongkir';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['ongkir']       = $this->Ongkir_model->getOngkirById($id);
        $data['kota']       = $this->Kota_model->GetKota();
        $data['pengiriman'] = $this->Pengiriman_model->GetAllPengiriman();


        

        $this->form_validation->set_rules('kd_bk' , 'Ongkir Code', 'required');
        $this->form_validation->set_rules('jasa' , 'Jenis Pengiriman Code', 'required');
        $this->form_validation->set_rules('kota' , 'City Code', 'required');
        $this->form_validation->set_rules('biaya_kirim' , 'Cost Shipping', 'required|numeric');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/ongkir/v_updateOngkir', $data);
            $this->load->view('admin/footer');
        }
        else{
            $this->Ongkir_model->EditOngkir();
            redirect('Ongkir');
        }
    }
}