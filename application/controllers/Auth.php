<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        
    }

    public function index()
    {
        $data['title'] = 'Login';
        
        LoginSess();
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('authUser/header', $data);
            $this->load->view('authUser/v_login');
            $this->load->view('authUser/footer');
        }else{
            $this->validasi_login();
        }
    }

    private function validasi_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $query = $this->db->get_where('konsumen', ['email' => $email])->row_array();
        if ($query) {
            if(password_verify($password, $query['password']))
            {
                $dataUser = [
                    'username' => $query['username'],
                    'email' => $query['email'],
                    'id' => $query['kd_konsumen'],
                    'role' => 'user'
                ];

                $this->session->set_userdata($dataUser);
                
                redirect('Products');
                
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-danger ml-3 mr-3" role="alert">Wrong Password! </div>');
                redirect('Auth', 'refresh');
            }
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger ml-3 mr-3" role="alert">Account is not registered, Please Register! </div>');
            
            redirect('Auth');
            
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');

        $this->session->set_flashdata('alert', '<div class="alert alert-success ml-3 mr-3" role="alert">Your account has been logged out</div>');
        
        redirect(base_url('Auth'));
        
    }

    public function Register()
    {
        $data['title'] = 'Register';

        
        $dariDB = $this->Auth_model->kodeOtomatis();
        
        $nourut = substr($dariDB, 4, 3);
        $kodekonsumenSekarang = $nourut + 1;
        $kode = array('kd_konsumen' => $kodekonsumenSekarang);
        $convert = implode("", $kode);
        $kodekonsumennn = sprintf("%03s", $convert);
        $data['kode'] = 'Kon-'.$kodekonsumennn;


        // var_dump($data['kode']);
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[konsumen.username]', [
            'is_unique' => 'username has been registered'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[konsumen.email]',[
            'is_unique' => 'Email has been registered'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]|min_length[5]', [
            'matches' => 'Password No Matches',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password Repeat', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('authUser/header', $data);
            $this->load->view('authUser/v_register', $data);
            $this->load->view('authUser/footer');
        }else{
            $data = [
                'kd_konsumen' => $this->input->post('kd_konsumen', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'username' => $this->input->post('name', true),
                'created_at' => time()

            ];

            $this->db->insert('konsumen', $data);
            
            $this->session->set_flashdata('alert', '<div class="alert alert-success ml-3 mr-3" role="alert">Register Success, Please Login ! </div>');
            
            redirect('Auth','refresh');
            
        }
    
    }
}