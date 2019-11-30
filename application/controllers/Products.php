<?php

class Products extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->library('form_validation');
        $this->load->model('Products_model');
        $this->load->model('Transaksi_model');

        // Auth_User();
    }

    public function index()
    {
        

        $data['title'] = 'Products';
		$this->load->model('Products_model');
        $data['products'] = $this->Products_model->GetProducts();
		$data['count'] = $this->Products_model->ProductsCount();
        $this->load->model('Category_model');
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->Category_model->GetCategory();
        $data['countCart'] = $this->Transaksi_model->CountCart();

		$this->load->view('templates/header', $data);
		$this->load->view('v_home');
        $this->load->view('templates/footer', $data);
    }

    public function addProducts()
    {

        $data['title'] = 'Add Product';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Category_model');
        $data['categori'] = $this->Category_model->GetCategory();
        

        $dariDB = $this->Products_model->kodeOtomatis();
        
        $nourut = substr($dariDB, 8, 2);
        $kodeBarangSekarang = $nourut + 1;
        $kode = array('kd_brg' => $kodeBarangSekarang);
        $convert = implode("", $kode);
        $kodeBarngg = sprintf("%02s", $convert);
        $data['kode'] = 'Product-'.$kodeBarngg;
        

        $this->form_validation->set_rules('kd_brg', 'kd_barang', 'required');
        $this->form_validation->set_rules('nama_product', 'Product Name', 'required');
        $this->form_validation->set_rules('bahan', 'bahan', 'required');
        $this->form_validation->set_rules('warna', 'warna', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        $this->form_validation->set_rules('keyword', 'keyword', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('diskon', 'diskon', 'required|numeric');
        $this->form_validation->set_rules('ukuran', 'ukuran', 'required|numeric');
        $this->form_validation->set_rules('berat', 'berat', 'required|numeric');
        $this->form_validation->set_rules('stok', 'stok', 'required|numeric');



        if($this->form_validation->run() == FALSE){

            $this->load->view('admin/header', $data);
            $this->load->view('admin/product/v_addProduct', $data);
            $this->load->view('admin/footer');
        } else{
            $this->Products_model->addProduct();
            redirect('admin/products');
        }

    }

    public function DeleteProduct($id, $foto){


        $this->Products_model->DeleteProduct($id);
        $path = './assets/Users/img/product/';
        @unlink($path.$foto);
        redirect('admin/products');
    }

    public function UpdateProduct($id)
    {
        $data['title'] = 'Update Product';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Category_model');
        $data['categori'] = $this->Category_model->GetCategory();
        $data['product'] = $this->Products_model->getProductById($id);

        $this->form_validation->set_rules('nama_product', 'Product Name', 'required');
        $this->form_validation->set_rules('bahan', 'bahan', 'required');
        $this->form_validation->set_rules('gambar', 'gambar');
        $this->form_validation->set_rules('warna', 'warna', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric');
        $this->form_validation->set_rules('keyword', 'keyword', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('diskon', 'diskon', 'required|numeric');
        $this->form_validation->set_rules('ukuran', 'ukuran', 'required|numeric');
        $this->form_validation->set_rules('berat', 'berat', 'required|numeric');
        $this->form_validation->set_rules('stok', 'stok', 'required|numeric');

        if($this->form_validation->run() == FALSE){

            $this->load->view('admin/header', $data);
            $this->load->view('products/v_updateProduct', $data);
            $this->load->view('admin/footer');
        } else{
            $this->Products_model->updateProduct();
            redirect('admin/products');
        }
    }

    public function DetailProduct($id)
    {
      $data['title'] = 'Detail Product';
      $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
      $data['product'] = $this->Products_model->getProductById($id);
      $data['countCart'] = $this->Transaksi_model->CountCart();
     
      $this->load->model('Category_model');
      $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
      $data['userr'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
      $data['category'] = $this->Category_model->GetCategory();
      $data['countCart'] = $this->Transaksi_model->CountCart();



      $this->load->view('templates/header', $data);
      $this->load->view('products/v_detailProduct', $data);
      $this->load->view('templates/footer');
    }

    public function GetProductById()
    {
        // echo $_POST['kd_brg'];
        echo json_encode($this->Products_model->GetProductById($this->input->post('kd_brg')));
    }


    public function Search()
    {
        $keyword = $this->input->post('keyword');

        // if (empty($keyword)) {
            
        //     redirect('Products','refresh');
        //     return false;
            
        // }
        $data['products'] = $this->Products_model->Search($keyword);
        $data['title'] = 'Products';
		$this->load->model('Products_model');
		$data['count'] = $this->Products_model->ProductsCount();
        $this->load->model('Category_model');
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['userr'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['category'] = $this->Category_model->GetCategory();
        $data['countCart'] = $this->Transaksi_model->CountCart();

        $this->form_validation->set_rules('keyword', 'Keyword', 'required');

        if ($this->form_validation->run()== TRUE ) {
            $this->load->view('templates/header', $data);
            $this->load->view('v_home', $data);
            $this->load->view('templates/footer');
        }else{
            $this->load->view('templates/header', $data);
            $this->load->view('v_home', $data);
            $this->load->view('templates/footer');
        }



    }

    
    public function TambahStok()
    {
        $data['title'] = 'Tambah Stok';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Products_model->GetAllProducts();



        $this->load->view('admin/header', $data);
        $this->load->view('products/v_addStok', $data);
        $this->load->view('admin/footer');
    }


    public function AksiTambahStok()
    {
        $data = [
          'kd_brg' => $this->input->post('product'),
          'jumlah' => $this->input->post('jumlah')  
        ];

        $this->db->insert('stok', $data);
        
        redirect('Admin/Products','refresh');
        
    }
}