<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $data['title'] = 'Login';
        
        LoginAdminSess();
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('auth/footer');
        }else{
            $this->validasi_login();
        }
    }

    private function validasi_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $query = $this->db->get_where('admin', ['email' => $email])->row_array();
        if ($query) {
            if(password_verify($password, $query['password']))
            {
                $dataUser = [
                    'username' => $query['username'],
                    'email' => $query['email'],
                    'role' => 'admin'
                ];

                $this->session->set_userdata($dataUser);
                
                redirect('Admin');
                
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Wrong Password! </div>');
                redirect('Login', 'refresh');
            }
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">Account is not registered, <b>Please Register</b>! </div>');
            
            redirect('Login');
            
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Your account has been logged out</div>');
        
        redirect('Login');
        
    }
}