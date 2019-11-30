<?php

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Register';

        
        $dariDB = $this->Admin_model->kodeOtomatis();
        
        $nourut = substr($dariDB, 6, 1);
        $kodeAdminSekarang = $nourut + 1;
        $kode = array('kd_admin' => $kodeAdminSekarang);
        $convert = implode("", $kode);
        $kodeAdminnn = sprintf("%01s", $convert);
        $data['kode'] = 'Admin-'.$kodeAdminnn;
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.username]', [
            'is_unique' => 'Username has been registered'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]',[
            'is_unique' => 'Email has been registered'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]|min_length[5]', [
            'matches' => 'Password No Matches',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password Repeat', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/v_register', $data);
            $this->load->view('auth/footer');
        }else{
            $data = [
                'kd_admin' => $this->input->post('kd_admin', true),
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 1

            ];

            $this->db->insert('admin', $data);
            
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Register Success, <b>Please Login</b>! </div');
            
            redirect('Login','refresh');
            
        }
    }

    
}