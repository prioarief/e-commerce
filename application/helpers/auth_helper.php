<?php

function Auth_User()
{
    $get = get_instance();
    if(!$get->session->userdata('email'))
    { 
        redirect('Auth');
    }
    
    
    
}

function Auth_Admin()
{
    $admin = get_instance();
    if(!$admin->session->userdata('email'))
    {
        
        redirect('Login');
        
    }else{
        $role = $admin->session->userdata('role');
        
        if($role != 'admin'){
            redirect('Products');
        }
        
        
    }
    
}


function LoginSess()
{
    $get = get_instance();
    if($get->session->userdata('email'))
    { 
        redirect('Products');
    }
}

function LoginAdminSess()
{
    $get = get_instance();
    if($get->session->userdata('email'))
    { 
        redirect('Admin');
    }
}