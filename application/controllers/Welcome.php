<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Products';
		$this->load->model('Products_model');
        $data['products'] = $this->Products_model->GetProducts();
		$data['count'] = $this->Products_model->ProductsCount();
        $this->load->model('Category_model');
       
        $data['category'] = $this->Category_model->GetCategory();

		$this->load->view('templates/header', $data);
		$this->load->view('v_home');
        $this->load->view('templates/footer');
		
	}
}
