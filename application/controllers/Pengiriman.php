<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pengiriman_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['pengiriman'] = $this->Pengiriman_model->GetAllPengiriman();
        $data['title'] = 'Pengiriman';


        $this->load->view('admin/header', $data);
        $this->load->view('admin/Pengiriman/index', $data);
        $this->load->view('admin/footer');
    }

    
    public function JenisPengiriman()
    {
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['pengiriman'] = $this->Pengiriman_model->GetJenisPengiriman();
        $data['title'] = 'Jenis Pengiriman';


        $this->load->view('admin/header', $data);
        $this->load->view('admin/JenisKirim/index', $data);
        $this->load->view('admin/footer');
    }

    public function AddJenisPengiriman()
    {
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['jasa'] =  $this->Pengiriman_model->GetJasaPengiriman();
        $data['title'] = 'Add Jenis Pengiriman';

        $dariDB = $this->Pengiriman_model->KodeJenisPengiriman();
        $nourut = substr($dariDB, 3, 2);
        $kodeJenisSekarang = $nourut + 1;
        $kode = array('kd_jp' => $kodeJenisSekarang);
        $convert = implode("", $kode);
        $kat = sprintf("%02s", $convert);
        $data['kode'] = 'JP-'.$kat;

        $this->form_validation->set_rules('kd_jp', 'jenis Code', 'required');
        $this->form_validation->set_rules('jenis', 'jenis Name', 'required');
        $this->form_validation->set_rules('jasa', 'jasa Name', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/JenisKirim/v_addJenisKirim', $data);
            $this->load->view('admin/footer');
        }else{
            $this->Pengiriman_model->AddJenisPengiriman();
            redirect('Pengiriman/JenisPengiriman');
        }
    }

    public function EditJenisPengiriman($id)
    {
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['jenis'] =  $this->Pengiriman_model->GetJenisPengirimanById($id);
        $data['jasa'] =  $this->Pengiriman_model->GetJasaPengiriman();
        $data['title'] = 'Edit Jenis Pengiriman';


        $this->form_validation->set_rules('kd_jp', 'jenis Code', 'required');
        $this->form_validation->set_rules('jenis', 'jenis Name', 'required');
        $this->form_validation->set_rules('jasa', 'jasa Name', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/JenisKirim/v_updateJenisKirim', $data);
            $this->load->view('admin/footer');
        }else{
            $this->Pengiriman_model->UpdateJenisPengiriman();
            redirect('Pengiriman/JenisPengiriman');
        }
    }
    
    public function HapusJenisPengiriman($id)
    {
        $this->Pengiriman_model->HapusJenisPengiriman($id);
        redirect('Pengiriman/JenisPengiriman');
    }

    public function JasaPengiriman()
    {
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['pengiriman'] = $this->Pengiriman_model->GetJasaPengiriman();
        $data['title'] = 'Jasa Pengiriman';


        $this->load->view('admin/header', $data);
        $this->load->view('admin/JasaKirim/index', $data);
        $this->load->view('admin/footer');
    }

    public function AddJasaPengiriman()
    {
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        
        
        $data['title'] = 'Add Jasa Pengiriman';

        $dariDB = $this->Pengiriman_model->KodeJasaPengiriman();
        $nourut = substr($dariDB, 5, 2);
        $kodeJasaSekarang = $nourut + 1;
        $kode = array('kd_jasa' => $kodeJasaSekarang);
        $convert = implode("", $kode);
        $kat = sprintf("%02s", $convert);
        $data['kode'] = 'Jasa-'.$kat;

        $this->form_validation->set_rules('kd_jasa', 'Jasa Code', 'required');
        $this->form_validation->set_rules('jasa', 'Jasa Name', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/JasaKirim/v_addJaskir', $data);
            $this->load->view('admin/footer');
        }else{
            $this->Pengiriman_model->AddJasaPengiriman();
            redirect('Pengiriman/JasaPengiriman');
        }
    }

    public function EditJasaPengiriman($id)
    {
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        
        
        $data['title'] = 'Edit Jasa Pengiriman';
        $data['jasa'] = $this->Pengiriman_model->GetJasaPengirimanById($id);

        

        $this->form_validation->set_rules('kd_jasa', 'Jasa Code', 'required');
        $this->form_validation->set_rules('jasa', 'Jasa Name', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/JasaKirim/v_updateJaskir', $data);
            $this->load->view('admin/footer');
        }else{
            $this->Pengiriman_model->UpdateJasaPengiriman();
            redirect('Pengiriman/JasaPengiriman');
        }
    }

    
    public function HapusJasaPengiriman($id)
    {
        
        $this->Pengiriman_model->HapusJasaPengiriman($id);
        redirect('Pengiriman/JasaPengiriman');
        
    }

    


}